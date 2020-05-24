# DiscordHooks

PHP Library to send discord hooks.

## Installation

```bash
composer req adrianmalec/discord-hooks
```

### Simple Example
```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DiscordHooks\Channel;
use DiscordHooks\HookBuilder;
use DiscordHooks\HttpTransport;

$hook = HookBuilder::createHook()
    ->withUsername("Adrian's BOT")
    ->withContent("Hello Discord!")
    ->withAvatarUrl("https://storage.googleapis.com/gopherizeme.appspot.com/gophers/bf82a68cf5dd6b8d70d511d809313fbdb2eb29e8.png")
    ->build();

$id = 'YOUR_DISCORD_CHANNEL_ID';
$token = 'YOUR_DISCORD_TOKEN';

$channel = new Channel($id, $token);

$transport = new HttpTransport($channel);

$transport->send($hook);
```

## Extended Example

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DiscordHooks\Channel;
use DiscordHooks\Customize\ColorPalette;
use DiscordHooks\EmbedBuilder;
use DiscordHooks\HookBuilder;
use DiscordHooks\HttpTransport;

$hook = HookBuilder::createHook()
    ->withUsername("Adrian's BOT")
    ->withAvatarUrl("https://storage.googleapis.com/gopherizeme.appspot.com/gophers/bf82a68cf5dd6b8d70d511d809313fbdb2eb29e8.png")
    ->withEmbed(EmbedBuilder::createEmbed()
        ->withTimestamp()
        ->withColor(ColorPalette::GREEN)
        ->withTitle('First Embed')
        ->withDescription('Description')
        ->build())
    ->withEmbed(EmbedBuilder::createEmbed()
        ->withTimestamp()
        ->withColor(ColorPalette::YELLOW)
        ->withTitle('Second Embed')
        ->withDescription('Description')
        ->build())
    ->withEmbed(EmbedBuilder::createEmbed()
        ->withTimestamp()
        ->withColor(ColorPalette::RED)
        ->withTitle('Third Embed')
        ->withDescription('Description')
        ->build())
    ->build();

$id = 'YOUR_DISCORD_CHANNEL_ID';
$token = 'YOUR_DISCORD_TOKEN';

$channel = new Channel($id, $token);

$transport = new HttpTransport($channel);

$transport->send($hook);
```
