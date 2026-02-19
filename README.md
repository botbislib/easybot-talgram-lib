# 🤖 Botbis easy bot lib demo
**The Ultimate PHP Library for Telegram Bots**
<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-blue?style=for-the-badge&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Telegram%20Bot%20API-6.0%2B-blue?style=for-the-badge&logo=telegram" alt="Telegram Bot API">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
  <img src="https://img.shields.io/github/stars/botbislib/easybot-talgram-lib?style=for-the-badge" alt="GitHub Stars">
  <img src="https://img.shields.io/github/forks/botbislib/easybot-talgram-lib?style=for-the-badge" alt="GitHub Forks">
</p>

<p align="center">
  <b>ساده‌ترین و کامل‌ترین کتابخانه ساخت ربات تلگرام با PHP</b><br>
  <b>The Easiest & Most Complete PHP Library for Telegram Bots</b>
</p>

---

## 📋 **Table of Contents | فهرست مطالب**

<div dir="rtl" align="right">

- [معرفی | Introduction](#معرفی--introduction)
- [ویژگی‌ها | Features](#ویژگیها--features)
- [نصب | Installation](#نصب--installation)
- [شروع سریع | Quick Start](#شروع-سریع--quick-start)
- [مستندات کامل | Complete Documentation](#مستندات-کامل--complete-documentation)
  - [متدهای اصلی | Core Methods](#۱-متدهای-اصلی--core-methods)
  - [متدهای ارسال پیام | Send Methods](#۲-متدهای-ارسال-پیام--send-methods)
  - [متدهای دکمه و کیبورد | Button & Keyboard Methods](#۳-متدهای-دکمه-و-کیبورد--button--keyboard-methods)
  - [متدهای دیتابیس | Database Methods](#۴-متدهای-دیتابیس--database-methods)
  - [متدهای ادمین | Admin Methods](#۵-متدهای-ادمین--admin-methods)
  - [متدهای امنیتی | Security Methods](#۶-متدهای-امنیتی--security-methods)
  - [متدهای API خارجی | External API Methods](#۷-متدهای-api-خارجی--external-api-methods)
  - [متدهای بازگشتی | Callback Methods](#۸-متدهای-بازگشتی--callback-methods)
  - [متدهای کمکی | Utility Methods](#۹-متدهای-کمکی--utility-methods)
- [مثال‌های کاربردی | Practical Examples](#مثالهای-کاربردی--practical-examples)
  - [ربات ساده | Simple Bot](#۱-ربات-ساده--simple-bot)
  - [ربات با کیبورد | Bot with Keyboard](#۲-ربات-با-کیبورد--bot-with-keyboard)
  - [ربات با دکمه اینلاین | Bot with Inline Buttons](#۳-ربات-با-دکمه-اینلاین--bot-with-inline-buttons)
  - [ربات پیام رسان ناشناس | Anonymous Message Bot](#۴-ربات-پیام-رسان-ناشناس--anonymous-message-bot)
  - [ربات آب و هوا | Weather Bot](#۵-ربات-آب-و-هوا--weather-bot)
  - [ربات پنل ادمین | Admin Panel Bot](#۶-ربات-پنل-ادمین--admin-panel-bot)
  - [ربات نظرسنجی | Poll Bot](#۷-ربات-نظرسنجی--poll-bot)
  - [ربات لیست کارها | Todo List Bot](#۸-ربات-لیست-کارها--todo-list-bot)
  - [ربات با امنیت کامل | Bot with Full Security](#۹-ربات-با-امنیت-کامل--bot-with-full-security)
- [عیب‌یابی | Troubleshooting](#عیبیابی--troubleshooting)
- [آپدیت و گیت‌هاب | Update & GitHub](#آپدیت-و-گیتهاب--update--github)
- [پشتیبانی | Support](#پشتیبانی--support)
- [لایسنس | License](#لایسنس--license)

</div>

---

## 🎯 **معرفی | Introduction**

<div dir="rtl" align="right">

**Bot** یک کتابخانه حرفه‌ای، سبک و فوق‌العاده ساده برای ساخت ربات‌های تلگرام با PHP است.  
با این کتابخانه می‌توانید در کمتر از ۵ دقیقه و با ۵ خط کد، یک ربات تلگرامی کامل و پیشرفته راه‌اندازی کنید.

**Bot** is a professional, lightweight, and incredibly simple PHP library for creating Telegram bots.  
With this library, you can set up a complete and advanced Telegram bot in less than 5 minutes with just 5 lines of code.

</div>

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_BOT_TOKEN');
$bot->cmd('/start', 'Welcome to the bot!');
$bot->run();
?>
```

---

## ✨ **ویژگی‌ها | Features**

<div dir="rtl" align="right">

| ویژگی | توضیحات |
|-------|---------|
| 🚀 **راه‌اندازی سریع** | فقط با ۵ خط کد |
| 📦 **حجم کم** | کمتر از ۵۰ کیلوبایت |
| ⚡ **سرعت بالا** | بهینه برای بهترین کارایی |
| 🔒 **امنیت کامل** | ضد اسپم، آپدیت فیک، جوین اجباری |
| 🎮 **دکمه‌های پیشرفته** | کیبورد شیشه‌ای، اینلاین، دکمه بازگشتی |
| 💾 **دیتابیس داخلی** | ذخیره‌سازی JSON بدون نیاز به دیتابیس |
| 👑 **سیستم ادمین** | سوپر ادمین و ادمین معمولی |
| 🌐 **API خارجی** | اتصال آسان به هر API |
| 📱 **پشتیبانی از رسانه** | عکس، ویدیو، فایل، صدا |
| 📝 **سیستم مرحله‌ای** | فرم‌های چندمرحله‌ای |
| 📊 **آمار** | آمار کاربران و ربات |
| 📢 **پیام همگانی** | ارسال پیام به همه کاربران |

</div>

---

## 📥 **نصب | Installation**

<div dir="rtl" align="right">

### روش ۱: دانلود مستقیم
</div>

```bash
wget https://raw.githubusercontent.com/botbislib/easybot-talgram-lib/main/Bot.php
```

<div dir="rtl" align="right">

### روش ۲: کلون با گیت
</div>

```bash
git clone https://github.com/botbislib/easybot-talgram-lib.git
```

<div dir="rtl" align="right">

### روش ۳: دانلود دستی
1. به [ریپازیتوری گیت‌هاب](https://github.com/botbislib/easybot-talgram-lib) بروید
2. روی دکمه **Code** کلیک کنید
3. گزینه **Download ZIP** را انتخاب کنید

### ساختار فایل‌ها
</div>

```
your-project/
├── Bot.php
├── index.php
└── bot_data.json (ایجاد خودکار)
```

<div dir="rtl" align="right">

### تنظیم Webhook
</div>

```php
// این آدرس را در مرورگر باز کنید
https://api.telegram.org/bot<YOUR_TOKEN>/setWebhook?url=https://your-domain.com/index.php
```

---

## 🚀 **شروع سریع | Quick Start**

### **ربات پایه (۵ خط) | Basic Bot (5 lines)**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_BOT_TOKEN');

$bot->cmd('/start', 'Welcome to the bot!');
$bot->cmd('/help', 'This is the help menu.');

$bot->run();
?>
```

### **ربات با کیبورد (۱۰ خط) | Bot with Keyboard (10 lines)**

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

## 📚 **مستندات کامل | Complete Documentation**

### **۱. متدهای اصلی | Core Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 1 | `__construct()` | `string $token` | `object` | سازنده کلاس - توکن ربات را دریافت می‌کند | `$bot = new Bot('TOKEN');` |
| 2 | `cmd()` | `string $command, mixed $response` | `object` | ثبت دستور - پاسخ می‌تواند string یا callable باشد | `$bot->cmd('/start', 'Hello');`<br>`$bot->cmd('/echo', function($bot,$t){return $t;});` |
| 3 | `step()` | `string $name, callable $callback` | `object` | ثبت مرحله برای دریافت اطلاعات چندمرحله‌ای | `$bot->step('get_name', function($bot,$text){});` |
| 4 | `run()` | `void` | `void` | اجرای ربات - باید در انتهای همه دستورات بیاید | `$bot->run();` |

---

### **۲. متدهای ارسال پیام | Send Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 5 | `send()` | `int $chat_id, string $text, array $options = []` | `array` | ارسال پیام متنی با گزینه‌های اضافی | `$bot->send(123456, "Hello");`<br>`$bot->send(123456, "Hello", ['reply'=>true]);` |
| 6 | `reply()` | `string $text, array $options = []` | `array` | پاسخ به پیام فعلی | `$bot->reply("This is a reply");` |
| 7 | `sendPhoto()` | `int $chat_id, string $photo, string $caption = ''` | `array` | ارسال عکس | `$bot->sendPhoto(123456, 'photo.jpg', 'Caption');` |
| 8 | `sendVideo()` | `int $chat_id, string $video, string $caption = ''` | `array` | ارسال ویدیو | `$bot->sendVideo(123456, 'video.mp4', 'Caption');` |
| 9 | `sendDocument()` | `int $chat_id, string $document, string $caption = ''` | `array` | ارسال فایل | `$bot->sendDocument(123456, 'file.pdf', 'Caption');` |
| 10 | `sendAudio()` | `int $chat_id, string $audio, string $caption = ''` | `array` | ارسال فایل صوتی | `$bot->sendAudio(123456, 'audio.mp3', 'Caption');` |
| 11 | `sendVoice()` | `int $chat_id, string $voice, string $caption = ''` | `array` | ارسال پیام صوتی | `$bot->sendVoice(123456, 'voice.ogg', 'Caption');` |
| 12 | `sendAction()` | `int $chat_id, string $action` | `array` | ارسال اکشن (typing, upload_photo, etc.) | `$bot->sendAction(123456, 'typing');` |
| 13 | `typing()` | `int $chat_id = null` | `array` | نمایش وضعیت در حال تایپ (از چت فعلی استفاده می‌کند) | `$bot->typing();`<br>`$bot->typing(123456);` |

---

### **۳. متدهای دکمه و کیبورد | Button & Keyboard Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 14 | `btn()` | `string $text, string $data = null` | `array` | ساخت دکمه بازگشتی (callback button) | `$btn = $bot->btn("Click", "data");`<br>`// Returns: ['text'=>'Click', 'callback_data'=>'data']` |
| 15 | `url()` | `string $text, string $url` | `array` | ساخت دکمه لینک | `$btn = $bot->url("Website", "https://example.com");`<br>`// Returns: ['text'=>'Website', 'url'=>'https://example.com']` |

---

### **۴. متدهای دیتابیس | Database Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 16 | `set()` | `string $key, mixed $value` | `object` | ذخیره داده در دیتابیس | `$bot->set('counter', 100);`<br>`$bot->set('settings', ['theme'=>'dark']);` |
| 17 | `get()` | `string $key, mixed $default = null` | `mixed` | دریافت داده از دیتابیس | `$count = $bot->get('counter', 0);`<br>`$settings = $bot->get('settings', []);` |
| 18 | `delete()` | `string $key` | `object` | حذف داده از دیتابیس | `$bot->delete('old_data');` |
| 19 | `user()` | `int $user_id = null, array $data = []` | `array` | دریافت یا ذخیره اطلاعات کاربر | `$user = $bot->user();`<br>`$bot->user(null, ['phone'=>'123']);`<br>`$user = $bot->user(123456);` |
| 20 | `allUsers()` | `void` | `array` | دریافت همه کاربران | `$users = $bot->allUsers();`<br>`foreach($users as $user) echo $user['id'];` |
| 21 | `countUsers()` | `void` | `int` | تعداد کل کاربران | `$count = $bot->countUsers();`<br>`echo "Total users: $count";` |

---

### **۵. متدهای ادمین | Admin Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 22 | `setAdmins()` | `array $super, array $admin = []` | `object` | تنظیم سوپر ادمین‌ها و ادمین‌های معمولی | `$bot->setAdmins([123456789], [987654321]);` |
| 23 | `isAdmin()` | `int $user_id = null` | `bool` | بررسی ادمین بودن کاربر | `if ($bot->isAdmin()) { ... }`<br>`if ($bot->isAdmin(123456)) { ... }` |
| 24 | `isSuperAdmin()` | `int $user_id = null` | `bool` | بررسی سوپر ادمین بودن کاربر | `if ($bot->isSuperAdmin()) { ... }` |

---

### **۶. متدهای امنیتی | Security Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 25 | `antiSpam()` | `int $seconds = 3, int $blockSeconds = 60, int $maxAttempts = 5` | `object` | تنظیمات ضد اسپم | `$bot->antiSpam(3, 60, 5);`<br>`// 3 seconds between messages, block 60 seconds after 5 attempts` |
| 26 | `forceJoin()` | `array $channels` | `object` | تنظیم چنل‌های اجباری | `$bot->forceJoin(['@channel1', '@channel2']);` |
| 27 | `checkJoin()` | `int $user_id = null` | `array` | بررسی عضویت در چنل‌ها | `$notJoined = $bot->checkJoin();`<br>`if (!empty($notJoined)) { ... }` |
| 28 | `fakeUpdate()` | `void` | `void` | فعال‌سازی محافظت آپدیت فیک (فقط درخواست‌های تلگرام قبول می‌شود) | `$bot->fakeUpdate();` |

---

### **۷. متدهای API خارجی | External API Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 29 | `api()` | `string $url` | `array` | درخواست GET به API خارجی | `$data = $bot->api("https://api.example.com/data");` |
| 30 | `apiGet()` | `string $url` | `array` | نام دیگر برای api() - درخواست GET | `$data = $bot->apiGet("https://api.example.com/data");` |
| 31 | `apiPost()` | `string $url, array $data = []` | `array` | درخواست POST به API خارجی | `$data = $bot->apiPost("https://api.example.com/submit", ['name'=>'John']);` |

---

### **۸. متدهای بازگشتی | Callback Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 32 | `answerCallback()` | `string $text, bool $alert = false` | `array` | پاسخ به کالبک (دکمه‌های اینلاین) | `$bot->answerCallback("Done!");`<br>`$bot->answerCallback("Error!", true); // با هشدار` |

---

### **۹. متدهای کمکی | Utility Methods**

| # | Method | Parameters | Return | Description | Example |
|---|--------|-----------|--------|-------------|---------|
| 33 | `stats()` | `void` | `array` | دریافت آمار ربات | `$stats = $bot->stats();`<br>`echo $stats['total']; // کل کاربران`<br>`echo $stats['today']; // کاربران امروز` |
| 34 | `broadcast()` | `string $text, array $options = []` | `array` | ارسال پیام به همه کاربران | `$result = $bot->broadcast("Hello everyone!");`<br>`echo $result['success']; // تعداد موفق`<br>`echo $result['failed']; // تعداد ناموفق` |

---

## 💡 **مثال‌های کاربردی | Practical Examples**

### **۱. ربات ساده | Simple Bot**

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

### **۲. ربات با کیبورد | Bot with Keyboard**

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

### **۳. ربات با دکمه اینلاین | Bot with Inline Buttons**

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

### **۴. ربات پیام رسان ناشناس | Anonymous Message Bot**

<div dir="rtl" align="right">

این ربات به کاربران اجازه می‌دهد پیام‌های ناشناس برای دیگران ارسال کنند و پاسخ دریافت کنند.

</div>

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// دیتابیس برای ذخیره کاربران
$users = [];

// شروع
$bot->cmd('/start', function($bot) {
    $text = "🤖 **Anonymous Message Bot**\n\n";
    $text .= "With this bot, you can send anonymous messages to other users.\n\n";
    $text .= "Commands:\n";
    $text .= "/id - Get your ID\n";
    $text .= "/send [USER_ID] - Send message to user\n";
    $text .= "/inbox - Check your messages\n";
    
    return $text;
});

// دریافت آیدی کاربر
$bot->cmd('/id', function($bot) {
    $text = "🆔 **Your User ID:**\n\n";
    $text .= "`" . $bot->user_id . "`\n\n";
    $text .= "Send this ID to others so they can message you.";
    
    return $text;
});

// ارسال پیام به کاربر دیگر
$bot->cmd('/send', function($bot, $target_id = '', $message = '') {
    if (empty($target_id) || empty($message)) {
        return "❌ **Usage:** `/send [USER_ID] [MESSAGE]`\n\nExample: `/send 123456789 Hello there!`";
    }
    
    // ذخیره پیام در دیتابیس
    $inbox = $bot->get("inbox_$target_id", []);
    $inbox[] = [
        'from' => $bot->user_id,
        'message' => $message,
        'time' => time(),
        'read' => false
    ];
    $bot->set("inbox_$target_id", $inbox);
    
    // ذخیره در تاریخچه فرستنده
    $sent = $bot->get("sent_{$bot->user_id}", []);
    $sent[] = [
        'to' => $target_id,
        'message' => $message,
        'time' => time()
    ];
    $bot->set("sent_{$bot->user_id}", $sent);
    
    // اعلان به گیرنده
    $bot->send($target_id, "📩 **You have a new anonymous message!**\nUse /inbox to read it.");
    
    return "✅ Your message has been sent anonymously!";
}, 3); // حداقل 3 پارامتر

// دریافت پیام‌ها
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

// خواندن پیام خاص
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

// حذف پیام
$bot->cmd('delete_', function($bot, $index) {
    $index = (int)$index;
    $inbox = $bot->get("inbox_{$bot->user_id}", []);
    
    if (isset($inbox[$index])) {
        unset($inbox[$index]);
        $bot->set("inbox_{$bot->user_id}", array_values($inbox));
        $bot->answerCallback("🗑 Message deleted!");
    }
    
    // برگشت به inbox
    return $bot->commands['/inbox']($bot);
});

// برگشت به inbox
$bot->cmd('back_inbox', function($bot) {
    $bot->answerCallback("🔙 Going back to inbox");
    return $bot->commands['/inbox']($bot);
});

// تاریخچه ارسال
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

// آمار
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

// راهنما
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

### **۵. ربات آب و هوا | Weather Bot**

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

### **۶. ربات پنل ادمین | Admin Panel Bot**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// تنظیم ادمین‌ها
$bot->setAdmins([123456789], [987654321]); // [super admins], [regular admins]

// فعال‌سازی امنیت
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

// پنل ادمین
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

// پیام همگانی
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

// لیست کاربران
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

### **۷. ربات نظرسنجی | Poll Bot**

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

// ایجاد نظرسنجی
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

// رأی دادن
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

// نمایش نتایج
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

### **۸. ربات لیست کارها | Todo List Bot**

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

// نمایش لیست
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

// افزودن کار
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

// تغییر وضعیت
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

// انجام شده‌ها
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

// پاک کردن همه
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

### **۹. ربات با امنیت کامل | Bot with Full Security**

```php
<?php
require 'Bot.php';

$bot = new Bot('YOUR_TOKEN');

// ============= تنظیمات امنیتی =============
$bot->fakeUpdate();                    // فقط درخواست‌های تلگرام قبول می‌شود
$bot->antiSpam(3, 60, 5);               // ۳ ثانیه بین پیام‌ها، ۶۰ ثانیه بلاک بعد از ۵ تلاش
$bot->forceJoin(['@channel1', '@channel2']); // جوین اجباری
$bot->setAdmins([123456789], [987654321]);    // تنظیم ادمین‌ها

$bot->cmd('/start', function($bot) {
    // بررسی جوین اجباری
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
    
    // ذخیره کاربر
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

// تست ضد اسپم
$bot->cmd('/spamtest', function($bot) {
    return "⚠️ Try to send messages quickly to test anti-spam.\nAfter 5 attempts in 3 seconds, you'll be blocked for 60 seconds.";
});

// پنل ادمین
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

## 🔧 **عیب‌یابی | Troubleshooting**

<div dir="rtl" align="right">

### مشکل: ربات پاسخ نمی‌دهد
</div>

```php
// 1. چک کردن Webhook
$result = file_get_contents("https://api.telegram.org/bot<TOKEN>/getWebhookInfo");
print_r(json_decode($result, true));

// 2. اطمینان از آدرس صحیح Webhook
https://api.telegram.org/bot<TOKEN>/setWebhook?url=https://your-domain.com/index.php

// 3. فعال‌سازی نمایش خطاها
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

<div dir="rtl" align="right">

### مشکل: دکمه‌ها کار نمی‌کنند
</div>

```php
// اطمینان از ثبت صحیح دستور برای کالبک
$bot->cmd('button_data', function($bot) {
    // این تابع باید برای داده کالبک ثبت شود
});

// پاسخ به کالبک فراموش نشود
$bot->answerCallback("Message");
```

---

## 🔄 **آپدیت و گیت‌هاب | Update & GitHub**

<div dir="rtl" align="right">

### دریافت آخرین نسخه
</div>

```bash
git clone https://github.com/botbislib/easybot-talgram-lib.git
cd easybot-talgram-lib
git pull origin main
```

<div dir="rtl" align="right">

### شماره نسخه
</div>

```php
// داخل فایل Bot.php
const VERSION = '2.0.0';
```

<div dir="rtl" align="right">

### تاریخچه تغییرات
</div>

```
v2.0.0 (2026-02-19)
- اضافه شدن سیستم ضد اسپم پیشرفته
- اضافه شدن جوین اجباری
- اضافه شدن متد broadcast
- بهبود مستندات

v1.0.0 (2026-02-01)
- انتشار اولیه
```

---

## 📊 **آمار پروژه | Project Stats**

| آمار | مقدار |
|------|-------|
| ⭐ ستاره‌ها | 0 |
| 🍴 فورک‌ها | 0 |
| 📦 نسخه | 2.0.0 |
| 📅 آخرین بروزرسانی | 2026-02-19 |
| 📄 لایسنس | MIT |
| 📁 سایز | < 50KB |
| 🔧 وابستگی‌ها | None |

---

## 🤝 **پشتیبانی | Support**

<div dir="rtl" align="right">

### راه‌های ارتباطی
</div>

| روش | اطلاعات |
|------|---------|
| 📱 **تلگرام** | [@botbis2](https://t.me/botbis2) |
| 📧 **ایمیل** | botbis2@gmail.com |
| 📢 **کانال** | [@botbis_channel](https://t.me/botbis_channel) |
| 🐛 **گیت‌هاب** | [Report Bug](https://github.com/botbislib/easybot-talgram-lib/issues) |
| 💡 **پیشنهاد** | [Suggest Feature](https://github.com/botbislib/easybot-talgram-lib/issues) |

<div dir="rtl" align="right">

### گزارش خطا
</div>

```php
// اگر باگی پیدا کردید، لطفاً در گیت‌هاب گزارش دهید:
// https://github.com/botbislib/easybot-talgram-lib/issues/new
```

---

## 📜 **لایسنس | License**

<div dir="rtl" align="right">

**لایسنس MIT** - استفاده آزاد برای پروژه‌های شخصی و تجاری

</div>

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

## ⭐ **حمایت از ما | Support Us**

<div dir="rtl" align="right">

اگر این کتابخانه به کارتان آمد:
- ⭐ به پروژه **ستاره** بدهید
- 🔄 با دیگران **به اشتراک** بگذارید
- 🐛 **باگ‌ها** را گزارش دهید
- 💡 **ایده‌های جدید** پیشنهاد دهید

**حمایت شما به ما انرژی می‌دهد!** ❤️

</div>

---

## 🎉 **کلام آخر | Final Word**

<div dir="rtl" align="right">

**با Bot، ساخت ربات تلگرام مثل آب خوردن ساده است!**  
**با کمترین کد، بیشترین کارایی رو تجربه کن!**

**همین حالا شروع کن و ربات رویاهات رو بساز!** 🚀

</div>

---

<p align="center">
  <b>🌟 از انتخاب Bot سپاسگزاریم! 🌟</b><br>
  <b>📅 آخرین بروزرسانی: 2026-02-19</b>
</p>

<p align="center">
  <a href="https://github.com/botbislib"><img src="https://img.shields.io/badge/GitHub-botbislib-blue?style=flat-square&logo=github" alt="GitHub"></a>
  <a href="https://t.me/botbis2"><img src="https://img.shields.io/badge/Telegram-@botbis2-blue?style=flat-square&logo=telegram" alt="Telegram"></a>
  <a href="https://t.me/botbis_channel"><img src="https://img.shields.io/badge/Channel-@botbis__channel-blue?style=flat-square&logo=telegram" alt="Channel"></a>
</p>
