<?php
declare(strict_types=1);

namespace DiscordHooks;

class Channel
{
    private $id;
    private $token;

    public function __construct(string $id, string $token)
    {
        $this->id = $id;
        $this->token = $token;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
