<?php

class Bot
{
    private $token;
    private $update;
    private $commands = [];
    private $steps = [];
    private $dbFile = 'datalib.json';
    private $admins = [];
    private $superAdmins = [];
    private $forceChannels = [];
    
    private $spamList = [];          
    private $spamTime = 3;            
    private $blockTime = 60;           
    private $blockList = [];            
    private $maxAttempts = 5;           
    private $attemptList = [];           
    
    public $chat_id;
    public $text;
    public $user_id;
    public $name;
    public $username;
    public $message_id;
    public $callback_data;
    public $callback_id;
    
    public function __construct($token)
    {
        $this->token = $token;
        $this->update = json_decode(file_get_contents('php://input'), true);
        
        if (isset($this->update['message'])) {
            $msg = $this->update['message'];
            $this->chat_id = $msg['chat']['id'] ?? '';
            $this->text = $msg['text'] ?? '';
            $this->user_id = $msg['from']['id'] ?? '';
            $this->name = $msg['from']['first_name'] ?? 'کاربر';
            $this->username = $msg['from']['username'] ?? '';
            $this->message_id = $msg['message_id'] ?? '';
        }
        
        if (isset($this->update['callback_query'])) {
            $cb = $this->update['callback_query'];
            $this->chat_id = $cb['message']['chat']['id'] ?? '';
            $this->user_id = $cb['from']['id'] ?? '';
            $this->name = $cb['from']['first_name'] ?? 'کاربر';
            $this->callback_data = $cb['data'] ?? '';
            $this->callback_id = $cb['id'] ?? '';
            $this->message_id = $cb['message']['message_id'] ?? '';
        }
        
        if (!file_exists($this->dbFile)) {
            file_put_contents($this->dbFile, '{}');
        }
        
        $this->cleanBlockList();
    }
    
    public function cmd($command, $response)
    {
        $this->commands[$command] = $response;
        return $this;
    }
    
    public function step($name, $callback)
    {
        $this->steps[$name] = $callback;
        return $this;
    }
    
    public function run()
    {
        if (!$this->securityCheck()) {
            return;
        }
        
        if (isset($this->update['callback_query'])) {
            $this->handleCallback();
            return;
        }
        
        $stepFile = "step_{$this->user_id}.json";
        if (file_exists($stepFile)) {
            $step = json_decode(file_get_contents($stepFile), true);
            if (isset($this->steps[$step['name']])) {
                $this->steps[$step['name']]($this, $this->text, $step['data']);
                unlink($stepFile);
                return;
            }
        }
        
        foreach ($this->commands as $cmd => $response) {
            if ($cmd == '' || $this->text == $cmd || strpos($this->text, $cmd) === 0) {
                
                if (is_callable($response)) {
                    $args = explode(' ', trim(substr($this->text, strlen($cmd))));
                    $result = $response($this, ...$args);
                    $this->handleResponse($result);
                } else {
                    $this->send($this->chat_id, $response);
                }
                break;
            }
        }
    }
    
    private function securityCheck()
    {
        if ($this->isAdmin()) {
            return true;
        }
        
        if ($this->isBlocked()) {
            $remaining = $this->blockList[$this->user_id] - time();
            $this->reply("⛔ شما به مدت {$remaining} ثانیه بلاک شدید.");
            return false;
        }
        
        if (!$this->checkSpam()) {
            return false;
        }
        
        return true;
    }
    
    public function antiSpam($seconds = 3, $blockSeconds = 60, $maxAttempts = 5)
    {
        $this->spamTime = $seconds;
        $this->blockTime = $blockSeconds;
        $this->maxAttempts = $maxAttempts;
        return $this;
    }
    
    private function checkSpam()
    {
        $now = time();

        if (isset($this->spamList[$this->user_id])) {
            $lastTime = $this->spamList[$this->user_id];
            $timeDiff = $now - $lastTime;
            
            if ($timeDiff < $this->spamTime) {
                $this->attemptList[$this->user_id] = ($this->attemptList[$this->user_id] ?? 0) + 1;
                
                if ($this->attemptList[$this->user_id] >= $this->maxAttempts) {
                    $this->blockUser();
                    return false;
                }
                
                $waitTime = $this->spamTime - $timeDiff;
                $this->reply("⏳ لطفاً $waitTime ثانیه صبر کنید.");
                return false;
            }
        }
        
        $this->spamList[$this->user_id] = $now;
        $this->attemptList[$this->user_id] = 0;
        
        return true;
    }
    
    private function blockUser()
    {
        $this->blockList[$this->user_id] = time() + $this->blockTime;
        $this->reply("⛔ شما به مدت {$this->blockTime} ثانیه بلاک شدید!");
        
        $blocked = $this->get('blocked_users', []);
        $blocked[$this->user_id] = time() + $this->blockTime;
        $this->set('blocked_users', $blocked);
    }
    
    private function isBlocked()
    {
        if (isset($this->blockList[$this->user_id]) && $this->blockList[$this->user_id] > time()) {
            return true;
        }
        
        $blocked = $this->get('blocked_users', []);
        if (isset($blocked[$this->user_id]) && $blocked[$this->user_id] > time()) {
            $this->blockList[$this->user_id] = $blocked[$this->user_id];
            return true;
        }
        
        return false;
    }
    
    private function cleanBlockList()
    {
        $now = time();
        $blocked = $this->get('blocked_users', []);
        $changed = false;
        
        foreach ($blocked as $userId => $expire) {
            if ($expire <= $now) {
                unset($blocked[$userId]);
                $changed = true;
            }
        }
        
        if ($changed) {
            $this->set('blocked_users', $blocked);
        }
    }
    
    public function fakeUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die();
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $telegramIps = [
            '149.154.160.0/20',
            '91.108.4.0/22',
            '91.108.56.0/22',
            '91.108.8.0/22',
            '95.161.64.0/20'
        ];
        
        foreach ($telegramIps as $range) {
            if ($this->ipInRange($ip, $range)) {
                return true;
            }
        }
        
        if (in_array($ip, ['127.0.0.1', '::1'])) {
            return true;
        }
        
        $this->log("IP مشکوک: $ip");
        die();
    }
    
    private function ipInRange($ip, $range)
    {
        list($subnet, $bits) = explode('/', $range);
        $ip = ip2long($ip);
        $subnet = ip2long($subnet);
        $mask = -1 << (32 - $bits);
        $subnet &= $mask;
        return ($ip & $mask) == $subnet;
    }
    
    private function log($message)
    {
        $logFile = 'security.log';
        $log = "[" . date('Y-m-d H:i:s') . "] $message\n";
        file_put_contents($logFile, $log, FILE_APPEND);
    }
    
    private $rateLimit = [];
    
    public function rateLimit($limit = 10, $perSeconds = 60)
    {
        $now = time();
        $key = "{$this->user_id}_" . floor($now / $perSeconds);
        
        $this->rateLimit[$key] = ($this->rateLimit[$key] ?? 0) + 1;
        
        if ($this->rateLimit[$key] > $limit) {
            $this->reply("⛔ تعداد پیام ها و درخواست های شما بیش از حد مجاز است.");
            return false;
        }
        
        return true;
    }
    
    public function forceJoin($channels)
    {
        $this->forceChannels = $channels;
        return $this;
    }
    
    public function checkJoin($userId = null)
    {
        $userId = $userId ?? $this->user_id;
        $notJoined = [];
        
        foreach ($this->forceChannels as $channel) {
            $channel = ltrim($channel, '@');
            
            $url = "https://api.telegram.org/bot{$this->token}/getChatMember?chat_id=@$channel&user_id=$userId";
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($result, true);
            
            if (isset($data['ok']) && $data['ok']) {
                $status = $data['result']['status'] ?? '';
                if (!in_array($status, ['member', 'administrator', 'creator'])) {
                    $notJoined[] = "@$channel";
                }
            } else {
                $notJoined[] = "@$channel";
            }
        }
        
        return $notJoined;
    }
    
    private function handleCallback()
    {
        $data = $this->callback_data;
        
        foreach ($this->commands as $cmd => $response) {
            if (strpos($data, $cmd) === 0) {
                $args = explode('_', substr($data, strlen($cmd)));
                if (is_callable($response)) {
                    $result = $response($this, ...$args);
                    $this->handleResponse($result);
                }
                break;
            }
        }
    }
    
    private function handleResponse($result)
    {
        if (is_string($result)) {
            $this->send($this->chat_id, $result);
        } elseif (is_array($result)) {
            if (isset($result['text'])) {
                $this->send($this->chat_id, $result['text'], $result);
            }
            if (isset($result['photo'])) {
                $this->sendPhoto($this->chat_id, $result['photo'], $result['caption'] ?? '');
            }
            if (isset($result['video'])) {
                $this->sendVideo($this->chat_id, $result['video'], $result['caption'] ?? '');
            }
            if (isset($result['document'])) {
                $this->sendDocument($this->chat_id, $result['document'], $result['caption'] ?? '');
            }
            if (isset($result['step'])) {
                file_put_contents("step_{$this->user_id}.json", json_encode([
                    'name' => $result['step'],
                    'data' => $result['data'] ?? []
                ]));
                $this->send($this->chat_id, $result['message'] ?? 'اطلاعات را وارد کنید:');
            }
        }
    }
    
    public function send($chat_id, $text, $options = [])
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];
        
        if (isset($options['reply'])) {
            $data['reply_to_message_id'] = $this->message_id;
        }
        
        if (isset($options['keyboard'])) {
            if (is_array($options['keyboard'])) {
                $reply_markup = [
                    'keyboard' => $options['keyboard'],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ];
                $data['reply_markup'] = json_encode($reply_markup);
            } elseif (is_string($options['keyboard'])) {
                $data['reply_markup'] = $this->makeKeyboard($options['keyboard']);
            }
        }
        
        if (isset($options['inline'])) {
            $data['reply_markup'] = json_encode(['inline_keyboard' => $options['inline']]);
        }
        
        if (isset($options['remove_keyboard'])) {
            $data['reply_markup'] = json_encode(['remove_keyboard' => true]);
        }
        
        return $this->request('sendMessage', $data);
    }
    
    public function reply($text, $options = [])
    {
        return $this->send($this->chat_id, $text, array_merge($options, ['reply' => true]));
    }
    
    public function sendPhoto($chat_id, $photo, $caption = '')
    {
        return $this->request('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $photo,
            'caption' => $caption
        ]);
    }
    
    public function sendVideo($chat_id, $video, $caption = '')
    {
        return $this->request('sendVideo', [
            'chat_id' => $chat_id,
            'video' => $video,
            'caption' => $caption
        ]);
    }
    
    public function sendDocument($chat_id, $document, $caption = '')
    {
        return $this->request('sendDocument', [
            'chat_id' => $chat_id,
            'document' => $document,
            'caption' => $caption
        ]);
    }
    
    public function sendAction($chat_id, $action)
    {
        return $this->request('sendChatAction', [
            'chat_id' => $chat_id,
            'action' => $action
        ]);
    }
    
    public function typing($chat_id = null)
    {
        return $this->sendAction($chat_id ?? $this->chat_id, 'typing');
    }
    
    public function btn($text, $data = null)
    {
        return $data ? ['text' => $text, 'callback_data' => $data] : ['text' => $text];
    }
    
    public function url($text, $url)
    {
        return ['text' => $text, 'url' => $url];
    }
    
    public function makeKeyboard($pattern)
    {
        $rows = explode(' ', $pattern);
        $keyboard = [];
        
        foreach ($rows as $row) {
            preg_match_all('/\[([^\]]+)\]/', $row, $matches);
            $buttons = [];
            foreach ($matches[1] as $btn) {
                $buttons[] = ['text' => $btn];
            }
            if (!empty($buttons)) {
                $keyboard[] = $buttons;
            }
        }
        
        return json_encode(['keyboard' => $keyboard, 'resize_keyboard' => true]);
    }
    
    public function set($key, $value)
    {
        $data = json_decode(file_get_contents($this->dbFile), true);
        $data[$key] = $value;
        file_put_contents($this->dbFile, json_encode($data, JSON_PRETTY_PRINT));
        return $this;
    }
    
    public function get($key, $default = null)
    {
        $data = json_decode(file_get_contents($this->dbFile), true);
        return $data[$key] ?? $default;
    }
    
    public function delete($key)
    {
        $data = json_decode(file_get_contents($this->dbFile), true);
        unset($data[$key]);
        file_put_contents($this->dbFile, json_encode($data, JSON_PRETTY_PRINT));
        return $this;
    }
    
    public function user($userId = null, $data = [])
    {
        $userId = $userId ?? $this->user_id;
        $key = "user_$userId";
        
        if (!empty($data)) {
            $userData = $this->get($key, []);
            $userData = array_merge($userData, $data, [
                'last_seen' => time(),
                'name' => $this->name,
                'username' => $this->username
            ]);
            $this->set($key, $userData);
        }
        
        return $this->get($key, ['id' => $userId]);
    }
    
    public function allUsers()
    {
        $data = json_decode(file_get_contents($this->dbFile), true);
        $users = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'user_') === 0) {
                $users[] = $value;
            }
        }
        return $users;
    }
    
    public function countUsers()
    {
        return count($this->allUsers());
    }
    
    public function setAdmins($super = [], $admin = [])
    {
        $this->superAdmins = $super;
        $this->admins = $admin;
        $this->set('admins', ['super' => $super, 'admin' => $admin]);
        return $this;
    }
    
    public function isAdmin($userId = null)
    {
        $userId = $userId ?? $this->user_id;
        return in_array($userId, $this->admins) || in_array($userId, $this->superAdmins);
    }
    
    public function isSuperAdmin($userId = null)
    {
        $userId = $userId ?? $this->user_id;
        return in_array($userId, $this->superAdmins);
    }
    
    public function api($url, $method = 'GET', $data = [], $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Bot/8.0');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($data) ? http_build_query($data) : $data);
        }
        
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result, true);
    }
    
    public function apiGet($url)
    {
        return $this->api($url);
    }
    
    public function apiPost($url, $data = [])
    {
        return $this->api($url, 'POST', $data);
    }
    
    public function stats()
    {
        $users = $this->allUsers();
        $now = time();
        $today = 0;
        $week = 0;
        
        foreach ($users as $user) {
            $last = $user['last_seen'] ?? 0;
            if ($now - $last < 86400) $today++;
            if ($now - $last < 604800) $week++;
        }
        
        return [
            'total' => count($users),
            'today' => $today,
            'week' => $week,
            'admins' => count($this->admins),
            'super' => count($this->superAdmins),
            'blocked' => count($this->get('blocked_users', []))
        ];
    }
    
    public function broadcast($text, $options = [])
    {
        $users = $this->allUsers();
        $result = ['success' => 0, 'failed' => 0];
        
        foreach ($users as $user) {
            $res = $this->send($user['id'], $text, $options);
            if ($res && isset($res['ok']) && $res['ok']) {
                $result['success']++;
            } else {
                $result['failed']++;
            }
            usleep(200000);
        }
        
        return $result;
    }
    
    public function answerCallback($text, $alert = false)
    {
        if (!$this->callback_id) return false;
        
        return $this->request('answerCallbackQuery', [
            'callback_query_id' => $this->callback_id,
            'text' => $text,
            'show_alert' => $alert
        ]);
    }
    
    private function request($method, $data)
    {
        $url = "https://api.telegram.org/bot{$this->token}/$method";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result, true);
    }
}
?>
