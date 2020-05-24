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
