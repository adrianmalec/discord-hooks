<?php
declare(strict_types=1);

namespace DiscordHooks;

use DiscordHooks\Structure\Hook;

class HttpTransport
{
    private $baseUrl = 'https://discordapp.com/api/webhooks';
    private $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function send(Hook $hook): void
    {
        $ch = curl_init(
            sprintf(
                '%s/%s/%s',
                $this->baseUrl,
                $this->channel->getId(),
                $this->channel->getToken()
            )
        );
        curl_setopt_array($ch, [
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HEADER => true,
            CURLOPT_POSTFIELDS => json_encode($hook->serialize()),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($hook->serialize()))
            ],
        ]);
        curl_exec($ch);
        curl_close($ch);
    }
}
