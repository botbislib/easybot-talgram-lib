# 🤖 Bot  
**The Ultimate PHP Library for Telegram Bots**

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-blue?style=for-the-badge&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Telegram%20Bot%20API-6.0%2B-blue?style=for-the-badge&logo=telegram" alt="Telegram Bot API">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
  <img src="https://img.shields.io/github/stars/botbislib/easybot-talgram-lib?style=for-the-badge" alt="GitHub Stars">
  <img src="https://img.shields.io/github/forks/botbislib/easybot-talgram-lib?style=for-the-badge" alt="GitHub Forks">
</p>

<p align="center">
  <b>The Easiest & Most Complete PHP Library for Telegram Bots</b>
</p>

---

## 📋 **Table of Contents**

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Quick Start](#quick-start)
- [Complete Documentation](#complete-documentation)
  - [Core Methods](#1-core-methods)
  - [Send Methods](#2-send-methods)
  - [Button & Keyboard Methods](#3-button--keyboard-methods)
  - [Database Methods](#4-database-methods)
  - [Admin Methods](#5-admin-methods)
  - [Security Methods](#6-security-methods)
  - [External API Methods](#7-external-api-methods)
  - [Callback Methods](#8-callback-methods)
  - [Utility Methods](#9-utility-methods)
- [Practical Examples](#practical-examples)
  - [Simple Bot](#1-simple-bot)
  - [Bot with Keyboard](#2-bot-with-keyboard)
  - [Bot with Inline Buttons](#3-bot-with-inline-buttons)
  - [Anonymous Message Bot](#4-anonymous-message-bot)
  - [Weather Bot](#5-weather-bot)
  - [Admin Panel Bot](#6-admin-panel-bot)
  - [Poll Bot](#7-poll-bot)
  - [Todo List Bot](#8-todo-list-bot)
  - [Bot with Full Security](#9-bot-with-full-security)
- [Troubleshooting](#troubleshooting)
- [Update & GitHub](#update--github)
- [Support](#support)
- [License](#license)

---

## 🎯 **Introduction**

**Bot** is a professional, lightweight, and incredibly simple PHP library for creating Telegram bots.  
With this library, you can set up a complete and advanced Telegram bot in less than 5 minutes with just 5 lines of code.

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_BOT_TOKEN');
$bot->cmd('/start', 'Welcome to the bot!');
$bot->run();
?>
```

---

## ✨ **Features**

| Feature | Description |
|---------|-------------|
| 🚀 **Quick Setup** | Just 5 lines of code |
| 📦 **Lightweight** | Less than 50KB |
| ⚡ **High Performance** | Optimized for speed |
| 🔒 **Full Security** | Anti-spam, fake update, force join |
| 🎮 **Advanced Buttons** | Reply keyboard, inline keyboard, callback buttons |
| 💾 **Built-in Database** | JSON storage, no external DB required |
| 👑 **Admin System** | Super admin and regular admin |
| 🌐 **External API** | Easy connection to any API |
| 📱 **Media Support** | Photos, videos, documents, audio |
| 📝 **Multi-step Forms** | Step-by-step data collection |
| 📊 **Statistics** | User and bot statistics |
| 📢 **Broadcast** | Send messages to all users |

---

## 📥 **Installation**

### **Option 1: Direct Download**
```bash
wget https://raw.githubusercontent.com/botbislib/easybot-talgram-lib/main/Bot.php
```

### **Option 2: Git Clone**
```bash
git clone https://github.com/botbislib/easybot-talgram-lib.git
```

### **Option 3: Manual Download**
1. Go to [GitHub Repository](https://github.com/botbislib/easybot-talgram-lib)
2. Click **Code** button
3. Select **Download ZIP**

### **File Structure**
```
your-project/
├── Bot.php
├── index.php
└── bot_data.json (auto-created)
```

### **Webhook Setup**
```php
// Open this URL in your browser
https://api.telegram.org/bot<YOUR_TOKEN>/setWebhook?url=https://your-domain.com/index.php
```

---

## 🚀 **Quick Start**

### **Basic Bot (5 lines)**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_BOT_TOKEN');

$bot->cmd('/start', 'Welcome to the bot!');
$bot->cmd('/help', 'This is the help menu.');

$bot->run();
?>
```

### **Bot with Keyboard (10 lines)**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

$bot->cmd('/start', function($bot) {
    $keyboard = [
        ['📸 Photo', '🎵 Music'],
        ['ℹ️ About', '📞 Contact']
    ];
    
    return [
        'text' => "Welcome! Choose an option:",
        'keyboard' => $keyboard
    ];
});

$bot->cmd('📸 Photo', function($bot) {
    $bot->sendPhoto($bot->chat_id, 'https://picsum.photos/400/300');
    return "Photo sent ✅";
});

$bot->run();
?>
```

---

## 📚 **Complete Documentation**

### **1. Core Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 1 | `__construct()` | `string $token` | `object` | Constructor - initializes bot with token | `$bot = new Bot('TOKEN');` |
| 2 | `cmd()` | `string $command, mixed $response` | `object` | Register command - response can be string or callable | `$bot->cmd('/start', 'Hello');`<br>`$bot->cmd('/echo', function($bot,$t){return $t;});` |
| 3 | `step()` | `string $name, callable $callback` | `object` | Register step for multi-step forms | `$bot->step('get_name', function($bot,$text){});` |
| 4 | `run()` | `void` | `void` | Run the bot - must be called at the end | `$bot->run();` |

---

### **2. Send Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 5 | `send()` | `int $chat_id, string $text, array $options = []` | `array` | Send text message with options | `$bot->send(123456, "Hello");`<br>`$bot->send(123456, "Hello", ['reply'=>true]);` |
| 6 | `reply()` | `string $text, array $options = []` | `array` | Reply to current message | `$bot->reply("This is a reply");` |
| 7 | `sendPhoto()` | `int $chat_id, string $photo, string $caption = ''` | `array` | Send photo | `$bot->sendPhoto(123456, 'photo.jpg', 'Caption');` |
| 8 | `sendVideo()` | `int $chat_id, string $video, string $caption = ''` | `array` | Send video | `$bot->sendVideo(123456, 'video.mp4', 'Caption');` |
| 9 | `sendDocument()` | `int $chat_id, string $document, string $caption = ''` | `array` | Send document/file | `$bot->sendDocument(123456, 'file.pdf', 'Caption');` |
| 10 | `sendAudio()` | `int $chat_id, string $audio, string $caption = ''` | `array` | Send audio file | `$bot->sendAudio(123456, 'audio.mp3', 'Caption');` |
| 11 | `sendVoice()` | `int $chat_id, string $voice, string $caption = ''` | `array` | Send voice message | `$bot->sendVoice(123456, 'voice.ogg', 'Caption');` |
| 12 | `sendAction()` | `int $chat_id, string $action` | `array` | Send chat action (typing, upload_photo, etc.) | `$bot->sendAction(123456, 'typing');` |
| 13 | `typing()` | `int $chat_id = null` | `array` | Show typing action (uses current chat if null) | `$bot->typing();`<br>`$bot->typing(123456);` |

---

### **3. Button & Keyboard Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 14 | `btn()` | `string $text, string $data = null` | `array` | Create callback button | `$btn = $bot->btn("Click", "data");`<br>`// Returns: ['text'=>'Click', 'callback_data'=>'data']` |
| 15 | `url()` | `string $text, string $url` | `array` | Create URL button | `$btn = $bot->url("Website", "https://example.com");`<br>`// Returns: ['text'=>'Website', 'url'=>'https://example.com']` |

---

### **4. Database Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 16 | `set()` | `string $key, mixed $value` | `object` | Store data in database | `$bot->set('counter', 100);`<br>`$bot->set('settings', ['theme'=>'dark']);` |
| 17 | `get()` | `string $key, mixed $default = null` | `mixed` | Retrieve data from database | `$count = $bot->get('counter', 0);`<br>`$settings = $bot->get('settings', []);` |
| 18 | `delete()` | `string $key` | `object` | Delete data from database | `$bot->delete('old_data');` |
| 19 | `user()` | `int $user_id = null, array $data = []` | `array` | Get or save user data | `$user = $bot->user();`<br>`$bot->user(null, ['phone'=>'123']);`<br>`$user = $bot->user(123456);` |
| 20 | `allUsers()` | `void` | `array` | Get all users | `$users = $bot->allUsers();`<br>`foreach($users as $user) echo $user['id'];` |
| 21 | `countUsers()` | `void` | `int` | Count total users | `$count = $bot->countUsers();`<br>`echo "Total users: $count";` |

---

### **5. Admin Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 22 | `setAdmins()` | `array $super, array $admin = []` | `object` | Set super admins and regular admins | `$bot->setAdmins([123456789], [987654321]);` |
| 23 | `isAdmin()` | `int $user_id = null` | `bool` | Check if user is admin | `if ($bot->isAdmin()) { ... }`<br>`if ($bot->isAdmin(123456)) { ... }` |
| 24 | `isSuperAdmin()` | `int $user_id = null` | `bool` | Check if user is super admin | `if ($bot->isSuperAdmin()) { ... }` |

---

### **6. Security Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 25 | `antiSpam()` | `int $seconds = 3, int $blockSeconds = 60, int $maxAttempts = 5` | `object` | Configure anti-spam settings | `$bot->antiSpam(3, 60, 5);`<br>`// 3 seconds between messages, block 60 seconds after 5 attempts` |
| 26 | `forceJoin()` | `array $channels` | `object` | Set channels for force join | `$bot->forceJoin(['@channel1', '@channel2']);` |
| 27 | `checkJoin()` | `int $user_id = null` | `array` | Check channel membership | `$notJoined = $bot->checkJoin();`<br>`if (!empty($notJoined)) { ... }` |
| 28 | `fakeUpdate()` | `void` | `void` | Enable fake update protection (only accepts Telegram requests) | `$bot->fakeUpdate();` |

---

### **7. External API Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 29 | `api()` | `string $url` | `array` | Make GET request to external API | `$data = $bot->api("https://api.example.com/data");` |
| 30 | `apiGet()` | `string $url` | `array` | Alias for api() - GET request | `$data = $bot->apiGet("https://api.example.com/data");` |
| 31 | `apiPost()` | `string $url, array $data = []` | `array` | Make POST request to external API | `$data = $bot->apiPost("https://api.example.com/submit", ['name'=>'John']);` |

---

### **8. Callback Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 32 | `answerCallback()` | `string $text, bool $alert = false` | `array` | Answer to callback query (inline buttons) | `$bot->answerCallback("Done!");`<br>`$bot->answerCallback("Error!", true); // with alert` |

---

### **9. Utility Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 33 | `stats()` | `void` | `array` | Get bot statistics | `$stats = $bot->stats();`<br>`echo $stats['total']; // total users`<br>`echo $stats['today']; // today's users` |
| 34 | `broadcast()` | `string $text, array $options = []` | `array` | Send message to all users | `$result = $bot->broadcast("Hello everyone!");`<br>`echo $result['success']; // successful count`<br>`echo $result['failed']; // failed count` |

---

## 💡 **Practical Examples**

### **1. Simple Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_BOT_TOKEN');

$bot->cmd('/start', 'Welcome to the bot! 🤖');
$bot->cmd('/help', 'Available commands:\n/start - Start\n/help - Help\n/time - Current time');
$bot->cmd('/time', function($bot) {
    return "🕒 Current time: " . date('H:i:s');
});
$bot->cmd('', function($bot, $text) {
    return "You said: $text";
});

$bot->run();
?>
```

---

### **2. Bot with Keyboard**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

$bot->cmd('/start', function($bot) {
    $keyboard = [
        ['📸 Photo', '🎵 Music'],
        ['ℹ️ About', '📞 Contact'],
        ['🔍 Search', '❌ Close']
    ];
    
    return [
        'text' => "Welcome! Choose an option:",
        'keyboard' => $keyboard
    ];
});

$bot->cmd('📸 Photo', function($bot) {
    $bot->sendPhoto($bot->chat_id, 'https://picsum.photos/400/300', 'Random photo');
    return "Photo sent! 📸";
});

$bot->cmd('🎵 Music', function($bot) {
    return "🎵 Music feature coming soon...";
});

$bot->cmd('ℹ️ About', function($bot) {
    return "🤖 This bot is created with Bot library.\n📅 Version 2.0.0";
});

$bot->cmd('📞 Contact', function($bot) {
    return "📞 Contact us: @username\n📧 email@example.com";
});

$bot->cmd('🔍 Search', function($bot) {
    return [
        'text' => "Enter search term:",
        'step' => 'search'
    ];
});

$bot->step('search', function($bot, $query) {
    return "You searched for: $query";
});

$bot->cmd('❌ Close', function($bot) {
    return [
        'text' => "Keyboard closed!",
        'remove_keyboard' => true
    ];
});

$bot->run();
?>
```

---

### **3. Bot with Inline Buttons**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

$bot->cmd('/start', function($bot) {
    $inline = [
        [
            $bot->btn("👍 Like", "like"),
            $bot->btn("👎 Dislike", "dislike")
        ],
        [
            $bot->btn("❤️ Love", "love"),
            $bot->btn("💔 Hate", "hate")
        ],
        [
            $bot->url("🌐 Website", "https://example.com"),
            $bot->url("📱 Telegram", "https://t.me/username")
        ],
        [
            $bot->btn("❌ Close", "close")
        ]
    ];
    
    return [
        'text' => "How do you feel about this bot?",
        'inline' => $inline
    ];
});

$bot->cmd('like', function($bot) {
    $bot->answerCallback("👍 Thanks for liking!");
    return "You liked the bot!";
});

$bot->cmd('dislike', function($bot) {
    $bot->answerCallback("👎 Sorry to hear that!");
    return "You disliked the bot!";
});

$bot->cmd('love', function($bot) {
    $bot->answerCallback("❤️ We love you too!");
    return "❤️ Love you too!";
});

$bot->cmd('hate', function($bot) {
    $bot->answerCallback("💔 That's sad!");
    return "💔 Why do you hate us?";
});

$bot->cmd('close', function($bot) {
    $bot->answerCallback("✅ Closed!");
    return [
        'text' => "Keyboard closed!",
        'remove_keyboard' => true
    ];
});

$bot->run();
?>
```

---

### **4. Anonymous Message Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// Start
$bot->cmd('/start', function($bot) {
    $text = "🤖 **Anonymous Message Bot**\n\n";
    $text .= "With this bot, you can send anonymous messages to other users.\n\n";
    $text .= "Commands:\n";
    $text .= "/id - Get your ID\n";
    $text .= "/send [USER_ID] [MESSAGE] - Send message to user\n";
    $text .= "/inbox - Check your messages\n";
    $text .= "/sent - Messages you've sent\n";
    $text .= "/stats - Your statistics";
    
    return $text;
});

// Get user ID
$bot->cmd('/id', function($bot) {
    return "🆔 **Your User ID:**\n\n`" . $bot->user_id . "`\n\nSend this ID to others so they can message you.";
});

// Send message to another user
$bot->cmd('/send', function($bot, $target_id = '', $message = '') {
    if (empty($target_id) || empty($message)) {
        return "❌ **Usage:** `/send [USER_ID] [MESSAGE]`\n\nExample: `/send 123456789 Hello there!`";
    }
    
    // Save message in database
    $inbox = $bot->get("inbox_$target_id", []);
    $inbox[] = [
        'from' => $bot->user_id,
        'message' => $message,
        'time' => time(),
        'read' => false
    ];
    $bot->set("inbox_$target_id", $inbox);
    
    // Save to sender history
    $sent = $bot->get("sent_{$bot->user_id}", []);
    $sent[] = [
        'to' => $target_id,
        'message' => $message,
        'time' => time()
    ];
    $bot->set("sent_{$bot->user_id}", $sent);
    
    // Notify recipient
    $bot->send($target_id, "📩 **You have a new anonymous message!**\nUse /inbox to read it.");
    
    return "✅ Your message has been sent anonymously!";
}, 3); // Minimum 3 parameters

// Check inbox
$bot->cmd('/inbox', function($bot) {
    $inbox = $bot->get("inbox_{$bot->user_id}", []);
    
    if (empty($inbox)) {
        return "📭 **Your inbox is empty.**";
    }
    
    $unread = 0;
    foreach ($inbox as $msg) {
        if (!$msg['read']) $unread++;
    }
    
    $text = "📬 **Your Inbox**\n";
    $text .= "Total messages: " . count($inbox) . "\n";
    $text .= "Unread: $unread\n\n";
    
    $buttons = [];
    for ($i = 0; $i < min(5, count($inbox)); $i++) {
        $msg = $inbox[$i];
        $status = $msg['read'] ? "✅" : "🆕";
        $date = date('Y-m-d H:i', $msg['time']);
        $preview = substr($msg['message'], 0, 20) . (strlen($msg['message']) > 20 ? '...' : '');
        
        $text .= "{$status} [{$date}]\n";
        $text .= "💬 {$preview}\n\n";
        
        $buttons[] = [$bot->btn("📖 Read #" . ($i+1), "read_" . $i)];
    }
    
    if (count($inbox) > 5) {
        $text .= "... and " . (count($inbox) - 5) . " more messages.\n";
    }
    
    if (!empty($buttons)) {
        return [
            'text' => $text,
            'inline' => $buttons
        ];
    }
    
    return $text;
});

// Read specific message
$bot->cmd('read_', function($bot, $index) {
    $index = (int)$index;
    $inbox = $bot->get("inbox_{$bot->user_id}", []);
    
    if (!isset($inbox[$index])) {
        $bot->answerCallback("❌ Message not found!");
        return;
    }
    
    $msg = $inbox[$index];
    $inbox[$index]['read'] = true;
    $bot->set("inbox_{$bot->user_id}", $inbox);
    
    $date = date('Y-m-d H:i:s', $msg['time']);
    
    $text = "📩 **Anonymous Message**\n\n";
    $text .= "📅 Date: $date\n";
    $text .= "💬 Message:\n";
    $text .= "------------------------\n";
    $text .= $msg['message'] . "\n";
    $text .= "------------------------\n\n";
    $text .= "🔹 To reply, use:\n";
    $text .= "`/send " . $msg['from'] . " [YOUR_REPLY]`";
    
    $buttons = [
        [
            $bot->btn("🗑 Delete", "delete_" . $index),
            $bot->btn("🔙 Back", "back_inbox")
        ]
    ];
    
    $bot->answerCallback("✅ Message marked as read");
    
    return [
        'text' => $text,
        'inline' => $buttons
    ];
});

// Delete message
$bot->cmd('delete_', function($bot, $index) {
    $index = (int)$index;
    $inbox = $bot->get("inbox_{$bot->user_id}", []);
    
    if (isset($inbox[$index])) {
        unset($inbox[$index]);
        $bot->set("inbox_{$bot->user_id}", array_values($inbox));
        $bot->answerCallback("🗑 Message deleted!");
    }
    
    // Back to inbox
    return $bot->commands['/inbox']($bot);
});

// Back to inbox
$bot->cmd('back_inbox', function($bot) {
    $bot->answerCallback("🔙 Going back to inbox");
    return $bot->commands['/inbox']($bot);
});

// Sent messages history
$bot->cmd('/sent', function($bot) {
    $sent = $bot->get("sent_{$bot->user_id}", []);
    
    if (empty($sent)) {
        return "📭 **You haven't sent any messages yet.**";
    }
    
    $text = "📤 **Messages You've Sent**\n\n";
    
    foreach (array_slice($sent, -10) as $msg) {
        $date = date('Y-m-d H:i', $msg['time']);
        $preview = substr($msg['message'], 0, 30) . (strlen($msg['message']) > 30 ? '...' : '');
        
        $text .= "📅 $date\n";
        $text .= "➡️ To: `{$msg['to']}`\n";
        $text .= "💬 $preview\n";
        $text .= "------------------------\n";
    }
    
    if (count($sent) > 10) {
        $text .= "... and " . (count($sent) - 10) . " more messages.";
    }
    
    return $text;
});

// Statistics
$bot->cmd('/stats', function($bot) {
    $inbox = $bot->get("inbox_{$bot->user_id}", []);
    $sent = $bot->get("sent_{$bot->user_id}", []);
    
    $unread = 0;
    foreach ($inbox as $msg) {
        if (!$msg['read']) $unread++;
    }
    
    $text = "📊 **Your Statistics**\n\n";
    $text .= "📥 Received: " . count($inbox) . "\n";
    $text .= "🆕 Unread: $unread\n";
    $text .= "📤 Sent: " . count($sent) . "\n";
    
    return $text;
});

// Help
$bot->cmd('/help', function($bot) {
    $text = "📚 **Help & Commands**\n\n";
    $text .= "/id - Get your user ID\n";
    $text .= "/send [ID] [MSG] - Send anonymous message\n";
    $text .= "/inbox - Check your messages\n";
    $text .= "/sent - Messages you've sent\n";
    $text .= "/stats - Your statistics\n";
    $text .= "/help - This help menu\n\n";
    $text .= "**Note:** All messages are anonymous. The recipient won't know who sent the message unless you tell them.";
    
    return $text;
});

$bot->run();
?>
```

---

### **5. Weather Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');
$API_KEY = 'your_openweather_api_key';

$bot->cmd('/start', function($bot) {
    return [
        'text' => "🌆 Enter city name to get weather information:",
        'step' => 'get_weather'
    ];
});

$bot->step('get_weather', function($bot, $city) use ($API_KEY) {
    $data = $bot->api("https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=$API_KEY&units=metric");
    
    if (isset($data['main'])) {
        $cityName = $data['name'];
        $country = $data['sys']['country'] ?? '';
        $temp = $data['main']['temp'];
        $feels = $data['main']['feels_like'];
        $humidity = $data['main']['humidity'];
        $pressure = $data['main']['pressure'];
        $desc = $data['weather'][0]['description'];
        $wind = $data['wind']['speed'] ?? 0;
        $clouds = $data['clouds']['all'] ?? 0;
        
        // Emoji based on weather
        $emoji = '🌤';
        if (strpos($desc, 'rain') !== false) $emoji = '🌧';
        if (strpos($desc, 'cloud') !== false) $emoji = '☁️';
        if (strpos($desc, 'clear') !== false) $emoji = '☀️';
        if (strpos($desc, 'snow') !== false) $emoji = '❄️';
        if (strpos($desc, 'thunder') !== false) $emoji = '⛈';
        
        $text = "{$emoji} **Weather in {$cityName}, {$country}**\n\n";
        $text .= "🌡 Temperature: {$temp}°C\n";
        $text .= "🤔 Feels like: {$feels}°C\n";
        $text .= "☁️ Condition: {$desc}\n";
        $text .= "💧 Humidity: {$humidity}%\n";
        $text .= "📊 Pressure: {$pressure} hPa\n";
        $text .= "💨 Wind: {$wind} m/s\n";
        $text .= "☁️ Clouds: {$clouds}%\n";
        
        $buttons = [
            [
                $bot->btn("🔄 Refresh", "refresh_" . $city),
                $bot->btn("🔍 Another city", "another")
            ]
        ];
        
        return [
            'text' => $text,
            'inline' => $buttons
        ];
    } else {
        return "❌ City '{$city}' not found. Please try again.";
    }
}, ['step' => 'get_weather']);

$bot->cmd('refresh_', function($bot, $city) use ($API_KEY) {
    $bot->answerCallback("🔄 Refreshing...");
    return $bot->steps['get_weather']($bot, $city, []);
});

$bot->cmd('another', function($bot) {
    $bot->answerCallback("🔍 Enter another city");
    return [
        'text' => "🌆 Enter city name:",
        'step' => 'get_weather'
    ];
});

$bot->run();
?>
```

---

### **6. Admin Panel Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// Set admins
$bot->setAdmins([123456789], [987654321]); // [super admins], [regular admins]

// Enable security
$bot->fakeUpdate();
$bot->antiSpam(2, 30, 3);

$bot->cmd('/start', function($bot) {
    $keyboard = [
        ['ℹ️ Info', '📊 Stats'],
        ['👤 Profile', '📞 Contact']
    ];
    
    if ($bot->isAdmin()) {
        $keyboard[] = ['👑 Admin Panel'];
    }
    
    return [
        'text' => "Welcome to the bot!",
        'keyboard' => $keyboard
    ];
});

// Admin Panel
$bot->cmd('👑 Admin Panel', function($bot) {
    if (!$bot->isAdmin()) return "⛔ Access denied!";
    
    $stats = $bot->stats();
    $users = $bot->allUsers();
    
    $text = "👑 **Admin Panel**\n\n";
    $text .= "📊 **Statistics:**\n";
    $text .= "👥 Total users: {$stats['total']}\n";
    $text .= "🟢 Online today: {$stats['today']}\n";
    $text .= "🟡 Online this week: {$stats['week']}\n\n";
    
    $text .= "🔰 **Admins:**\n";
    $text .= "👑 Super: " . count($bot->superAdmins) . "\n";
    $text .= "🔰 Regular: " . count($bot->admins) . "\n\n";
    
    $text .= "📈 **Recent users:**\n";
    $recent = array_slice($users, -5);
    foreach ($recent as $user) {
        $text .= "🆔 {$user['id']} - {$user['name']}\n";
    }
    
    $inline = [
        [
            $bot->btn("📢 Broadcast", "admin_broadcast"),
            $bot->btn("👥 List users", "admin_users")
        ],
        [
            $bot->btn("🔍 Search", "admin_search"),
            $bot->btn("⚙️ Settings", "admin_settings")
        ]
    ];
    
    return [
        'text' => $text,
        'inline' => $inline
    ];
});

// Broadcast
$bot->cmd('admin_broadcast', function($bot) {
    if (!$bot->isAdmin()) return;
    
    return [
        'text' => "📝 Enter the message to broadcast to all users:",
        'step' => 'broadcast_message'
    ];
});

$bot->step('broadcast_message', function($bot, $text) {
    $result = $bot->broadcast($text, ['parse_mode' => 'HTML']);
    
    return "✅ **Broadcast completed!**\n\n✓ Success: {$result['success']}\n✗ Failed: {$result['failed']}";
});

// List users
$bot->cmd('admin_users', function($bot) {
    if (!$bot->isAdmin()) return;
    
    $users = $bot->allUsers();
    $page = 1;
    $perPage = 10;
    $totalPages = ceil(count($users) / $perPage);
    
    $start = ($page - 1) * $perPage;
    $displayUsers = array_slice($users, $start, $perPage);
    
    $text = "👥 **Users List (Page $page/$totalPages)**\n\n";
    
    foreach ($displayUsers as $user) {
        $lastSeen = isset($user['last_seen']) ? date('Y-m-d', $user['last_seen']) : 'Unknown';
        $text .= "🆔 `{$user['id']}`\n";
        $text .= "👤 {$user['name']}\n";
        $text .= "📅 $lastSeen\n";
        $text .= "------------------------\n";
    }
    
    $buttons = [];
    if ($page > 1) {
        $buttons[] = $bot->btn("◀️ Previous", "users_page_" . ($page-1));
    }
    if ($page < $totalPages) {
        $buttons[] = $bot->btn("Next ▶️", "users_page_" . ($page+1));
    }
    
    return [
        'text' => $text,
        'inline' => [$buttons]
    ];
});

$bot->cmd('admin_search', function($bot) {
    if (!$bot->isAdmin()) return;
    
    return [
        'text' => "🔍 Enter user ID or username to search:",
        'step' => 'search_user'
    ];
});

$bot->step('search_user', function($bot, $query) {
    $users = $bot->allUsers();
    $found = [];
    
    foreach ($users as $user) {
        if ($user['id'] == $query || strpos($user['username'] ?? '', $query) !== false || strpos($user['name'], $query) !== false) {
            $found[] = $user;
        }
    }
    
    if (empty($found)) {
        return "❌ No users found matching '{$query}'.";
    }
    
    $text = "🔍 **Search Results for '{$query}'**\n\n";
    $text .= "Found " . count($found) . " user(s):\n\n";
    
    foreach ($found as $user) {
        $text .= "🆔 `{$user['id']}`\n";
        $text .= "👤 {$user['name']}\n";
        $text .= "📛 @" . ($user['username'] ?? 'N/A') . "\n";
        $text .= "📅 Last seen: " . (isset($user['last_seen']) ? date('Y-m-d H:i', $user['last_seen']) : 'Unknown') . "\n";
        $text .= "------------------------\n";
    }
    
    return $text;
});

$bot->run();
?>
```

---

### **7. Poll Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

$bot->cmd('/start', function($bot) {
    $keyboard = [
        ['📊 Create Poll', '📋 My Polls'],
        ['📈 Results', '❌ Close']
    ];
    
    return [
        'text' => "📊 **Poll Bot**\n\nCreate and manage polls easily!",
        'keyboard' => $keyboard
    ];
});

// Create poll
$bot->cmd('📊 Create Poll', function($bot) {
    return [
        'text' => "📝 **Create a new poll**\n\nEnter your poll question:",
        'step' => 'poll_question'
    ];
});

$bot->step('poll_question', function($bot, $question) {
    $bot->set("poll_{$bot->user_id}_question", $question);
    $bot->set("poll_{$bot->user_id}_options", []);
    
    return [
        'text' => "✅ Question saved!\n\nNow enter option 1 (or /done when finished):",
        'step' => 'poll_options'
    ];
});

$bot->step('poll_options', function($bot, $option) {
    if ($option == '/done') {
        $options = $bot->get("poll_{$bot->user_id}_options", []);
        
        if (count($options) < 2) {
            return "❌ You need at least 2 options. Enter option " . (count($options) + 1) . ":";
        }
        
        $question = $bot->get("poll_{$bot->user_id}_question");
        
        $inline = [];
        foreach ($options as $i => $opt) {
            $inline[] = [$bot->btn($opt, "vote_{$bot->user_id}_{$i}")];
        }
        $inline[] = [$bot->btn("📊 Results", "results_{$bot->user_id}")];
        
        $pollId = uniqid();
        $bot->set("poll_data_$pollId", [
            'creator' => $bot->user_id,
            'question' => $question,
            'options' => $options,
            'votes' => array_fill(0, count($options), 0),
            'voters' => []
        ]);
        
        $bot->set("user_polls_{$bot->user_id}", array_merge(
            $bot->get("user_polls_{$bot->user_id}", []),
            [$pollId]
        ));
        
        $text = "📊 **Poll Created!**\n\n";
        $text .= "❓ {$question}\n\n";
        foreach ($options as $i => $opt) {
            $text .= ($i+1) . ". {$opt}\n";
        }
        
        return [
            'text' => $text,
            'inline' => $inline
        ];
    }
    
    $options = $bot->get("poll_{$bot->user_id}_options", []);
    $options[] = $option;
    $bot->set("poll_{$bot->user_id}_options", $options);
    
    return [
        'text' => "✅ Option added!\n\nEnter option " . (count($options) + 1) . " (or /done when finished):",
        'step' => 'poll_options'
    ];
});

// Vote
$bot->cmd('vote_', function($bot, $creator, $option) {
    $polls = $bot->get("user_polls_$creator", []);
    $currentPoll = end($polls);
    
    $poll = $bot->get("poll_data_$currentPoll", []);
    
    if (in_array($bot->user_id, $poll['voters'] ?? [])) {
        $bot->answerCallback("❌ You have already voted!");
        return;
    }
    
    $poll['votes'][$option]++;
    $poll['voters'][] = $bot->user_id;
    $bot->set("poll_data_$currentPoll", $poll);
    
    $bot->answerCallback("✅ Vote recorded!");
});

// Show results
$bot->cmd('results_', function($bot, $creator) {
    $polls = $bot->get("user_polls_$creator", []);
    $currentPoll = end($polls);
    
    $poll = $bot->get("poll_data_$currentPoll", []);
    
    $text = "📊 **Poll Results**\n\n";
    $text .= "❓ {$poll['question']}\n\n";
    
    $total = array_sum($poll['votes']);
    foreach ($poll['options'] as $i => $opt) {
        $count = $poll['votes'][$i];
        $percent = $total > 0 ? round(($count / $total) * 100) : 0;
        $bar = str_repeat('█', $percent) . str_repeat('░', 100 - $percent);
        $text .= "{$opt}:\n";
        $text .= "{$bar} {$percent}% ({$count} votes)\n\n";
    }
    
    $text .= "👥 Total voters: {$total}";
    
    $bot->answerCallback("📊 Showing results");
    return $text;
});

$bot->run();
?>
```

---

### **8. Todo List Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

$bot->cmd('/start', function($bot) {
    $keyboard = [
        ['📋 My List', '➕ Add'],
        ['✅ Done', '❌ Clear All']
    ];
    
    return [
        'text' => "📝 **Todo List Bot**\n\nManage your tasks easily!",
        'keyboard' => $keyboard
    ];
});

// Show list
$bot->cmd('📋 My List', function($bot) {
    $todos = $bot->get("todos_{$bot->user_id}", []);
    
    if (empty($todos)) {
        return "📭 Your todo list is empty.\nUse '➕ Add' to add tasks.";
    }
    
    $text = "📋 **Your Todo List**\n\n";
    foreach ($todos as $i => $todo) {
        $status = $todo['done'] ?? false;
        $checkbox = $status ? "✅" : "⬜";
        $text .= "{$checkbox} " . ($i+1) . ". {$todo['text']}\n";
    }
    
    $buttons = [];
    $row = [];
    for ($i = 0; $i < min(5, count($todos)); $i++) {
        $row[] = $bot->btn(($i+1) . "", "toggle_" . $i);
        if (count($row) == 5) {
            $buttons[] = $row;
            $row = [];
        }
    }
    if (!empty($row)) {
        $buttons[] = $row;
    }
    $buttons[] = [$bot->btn("✅ Done Selected", "done_selected")];
    
    return [
        'text' => $text,
        'inline' => $buttons
    ];
});

// Add task
$bot->cmd('➕ Add', function($bot) {
    return [
        'text' => "✏️ Enter your task:",
        'step' => 'add_todo'
    ];
});

$bot->step('add_todo', function($bot, $todo) {
    $todos = $bot->get("todos_{$bot->user_id}", []);
    $todos[] = ['text' => $todo, 'done' => false, 'created' => time()];
    $bot->set("todos_{$bot->user_id}", $todos);
    
    return "✅ Added: \"{$todo}\"";
});

// Toggle task
$bot->cmd('toggle_', function($bot, $index) {
    $index = (int)$index;
    $todos = $bot->get("todos_{$bot->user_id}", []);
    
    if (isset($todos[$index])) {
        $todos[$index]['done'] = !($todos[$index]['done'] ?? false);
        $bot->set("todos_{$bot->user_id}", $todos);
        
        $status = $todos[$index]['done'] ? "✅" : "⬜";
        $bot->answerCallback("{$status} Task " . ($index+1) . " toggled");
    }
    
    return $bot->commands['📋 My List']($bot);
});

// Mark as done
$bot->cmd('✅ Done', function($bot) {
    $todos = $bot->get("todos_{$bot->user_id}", []);
    $pending = array_filter($todos, fn($t) => !($t['done'] ?? false));
    
    if (empty($pending)) {
        return "✅ All tasks are done! Great job! 🎉";
    }
    
    $buttons = [];
    $row = [];
    $i = 0;
    foreach ($pending as $index => $todo) {
        $row[] = $bot->btn(($i+1) . "", "mark_done_" . $index);
        $i++;
        if (count($row) == 5) {
            $buttons[] = $row;
            $row = [];
        }
    }
    if (!empty($row)) {
        $buttons[] = $row;
    }
    
    $text = "✅ **Select tasks to mark as done:**\n\n";
    $i = 1;
    foreach ($pending as $todo) {
        $text .= $i . ". {$todo['text']}\n";
        $i++;
    }
    
    return [
        'text' => $text,
        'inline' => $buttons
    ];
});

$bot->cmd('mark_done_', function($bot, $index) {
    $index = (int)$index;
    $todos = $bot->get("todos_{$bot->user_id}", []);
    
    if (isset($todos[$index])) {
        $todos[$index]['done'] = true;
        $bot->set("todos_{$bot->user_id}", $todos);
        $bot->answerCallback("✅ Task marked as done!");
    }
    
    return $bot->commands['✅ Done']($bot);
});

// Clear all
$bot->cmd('❌ Clear All', function($bot) {
    $inline = [
        [
            $bot->btn("✅ Yes, clear all", "clear_confirm"),
            $bot->btn("❌ No, cancel", "clear_cancel")
        ]
    ];
    
    return [
        'text' => "⚠️ **Are you sure you want to clear all tasks?**",
        'inline' => $inline
    ];
});

$bot->cmd('clear_confirm', function($bot) {
    $bot->set("todos_{$bot->user_id}", []);
    $bot->answerCallback("✅ All tasks cleared!");
    return "✅ Your todo list has been cleared.";
});

$bot->cmd('clear_cancel', function($bot) {
    $bot->answerCallback("❌ Operation cancelled");
    return "Operation cancelled.";
});

$bot->run();
?>
```

---

### **9. Bot with Full Security**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// ============= Security Settings =============
$bot->fakeUpdate();                    // Only accepts Telegram requests
$bot->antiSpam(3, 60, 5);               // 3 seconds between messages, 60 seconds block after 5 attempts
$bot->forceJoin(['@channel1', '@channel2']); // Force join channels
$bot->setAdmins([123456789], [987654321]);    // Set admins

$bot->cmd('/start', function($bot) {
    // Check force join
    $notJoined = $bot->checkJoin();
    
    if (!empty($notJoined)) {
        $text = "🚫 **Access Restricted**\n\n";
        $text .= "To use this bot, you must join these channels:\n\n";
        
        $buttons = [];
        foreach ($notJoined as $ch) {
            $text .= "🔹 {$ch}\n";
            $buttons[] = [$bot->url("📢 Join {$ch}", "https://t.me/" . ltrim($ch, '@'))];
        }
        
        $text .= "\n✅ After joining, press /start again.";
        
        return [
            'text' => $text,
            'inline' => $buttons
        ];
    }
    
    // Save user
    $bot->user(null, ['last_visit' => time()]);
    
    $keyboard = [
        ['ℹ️ Info', '📊 Stats'],
        ['👤 Profile', '📞 Contact']
    ];
    
    if ($bot->isAdmin()) {
        $keyboard[] = ['👑 Admin'];
    }
    
    return [
        'text' => "✅ **Welcome to the Secure Bot!**\n\nYou have passed all security checks.",
        'keyboard' => $keyboard
    ];
});

// Anti-spam test
$bot->cmd('/spamtest', function($bot) {
    return "⚠️ Try to send messages quickly to test anti-spam.\nAfter 5 attempts in 3 seconds, you'll be blocked for 60 seconds.";
});

// Admin panel
$bot->cmd('👑 Admin', function($bot) {
    if (!$bot->isAdmin()) return "⛔ Access denied!";
    
    $stats = $bot->stats();
    
    $text = "👑 **Admin Panel**\n\n";
    $text .= "📊 **Statistics:**\n";
    $text .= "👥 Total users: {$stats['total']}\n";
    $text .= "🟢 Today: {$stats['today']}\n";
    $text .= "🟡 Week: {$stats['week']}\n\n";
    $text .= "🛡️ **Security:**\n";
    $text .= "⛔ Blocked users: " . count($bot->get('blocked_users', [])) . "\n";
    $text .= "📢 Force join channels: " . count($bot->forceChannels) . "\n";
    
    $inline = [
        [
            $bot->btn("📢 Broadcast", "admin_broadcast"),
            $bot->btn("👥 Users", "admin_users")
        ],
        [
            $bot->btn("🔍 Search", "admin_search"),
            $bot->btn("⚙️ Settings", "admin_settings")
        ]
    ];
    
    return [
        'text' => $text,
        'inline' => $inline
    ];
});

$bot->run();
?>
```

---

## 🔧 **Troubleshooting**

### **Issue: Bot not responding**

```php
// 1. Check Webhook
$result = file_get_contents("https://api.telegram.org/bot<TOKEN>/getWebhookInfo");
print_r(json_decode($result, true));

// 2. Verify Webhook URL
https://api.telegram.org/bot<TOKEN>/setWebhook?url=https://your-domain.com/index.php

// 3. Enable error display
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

### **Issue: Buttons not working**

```php
// Ensure callback command is registered
$bot->cmd('button_data', function($bot) {
    // This function should handle the callback data
});

// Don't forget to answer callback
$bot->answerCallback("Message");
```

---

## 🔄 **Update & GitHub**

### **Get Latest Version**

```bash
git clone https://github.com/botbislib/easybot-talgram-lib.git
cd easybot-talgram-lib
git pull origin main
```

### **Version Number**

```php
// Inside Bot.php file
const VERSION = '2.0.0';
```

### **Changelog**

```
v2.0.0 (2026-02-19)
- Added advanced anti-spam system
- Added force join feature
- Added broadcast method
- Improved documentation

v1.0.0 (2026-02-01)
- Initial release
```

---

## 📊 **Project Stats**

| Stat | Value |
|------|-------|
| ⭐ Stars | 0 |
| 🍴 Forks | 0 |
| 📦 Version | 2.0.0 |
| 📅 Last Update | 2026-02-19 |
| 📄 License | MIT |
| 📁 Size | < 50KB |
| 🔧 Dependencies | None |

---

## 🤝 **Support**

### **Contact Methods**

| Method | Info |
|------|------|
| 📱 **Telegram** | [@botbis2](https://t.me/botbis2) |
| 📧 **Email** | botbis2@gmail.com |
| 📢 **Channel** | [@botbis_channel](https://t.me/botbis_channel) |
| 🐛 **GitHub** | [Report Bug](https://github.com/botbislib/easybot-talgram-lib/issues) |
| 💡 **Suggestions** | [Suggest Feature](https://github.com/botbislib/easybot-talgram-lib/issues) |

### **Report Issues**

```php
// If you find a bug, please report on GitHub:
// https://github.com/botbislib/easybot-talgram-lib/issues/new
```

---

## 📜 **License**

**MIT License** - Free for personal and commercial use

```
MIT License

Copyright (c) 2026 @botbis2

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## ⭐ **Support Us**

If this library helped you:
- ⭐ **Star** the repository
- 🔄 **Share** with others
- 🐛 **Report** bugs
- 💡 **Suggest** features

**Your support keeps us going!** ❤️

---

## 🎉 **Final Word**

**With Bot, creating Telegram bots is as easy as drinking water!**  
**Experience maximum performance with minimum code!**

**Start now and build your dream bot!** 🚀

---

<p align="center">
  <b>🌟 Thank you for choosing Bot! 🌟</b><br>
  <b>📅 Last Updated: 2026-02-19</b>
</p>

<p align="center">
  <a href="https://github.com/botbislib"><img src="https://img.shields.io/badge/GitHub-botbislib-blue?style=flat-square&logo=github" alt="GitHub"></a>
  <a href="https://t.me/botbis2"><img src="https://img.shields.io/badge/Telegram-@botbis2-blue?style=flat-square&logo=telegram" alt="Telegram"></a>
  <a href="https://t.me/botbis_channel"><img src="https://img.shields.io/badge/Channel-@botbis__channel-blue?style=flat-square&logo=telegram" alt="Channel"></a>
</p>
