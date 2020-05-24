<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

class Image
{
    /**
     * @var string
     */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function serialize(): array
    {
        return [
            'url' => $this->url
        ];
    }
}
