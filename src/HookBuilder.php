<?php
declare(strict_types=1);

namespace DiscordHooks;

use DiscordHooks\Structure\Embed;
use DiscordHooks\Structure\Hook;

class HookBuilder
{
    private function __construct() {}

    private $properties;

    public static function createHook(): self
    {
        return new self();
    }

    public function withContent(string $content): self
    {
        $this->properties['content'] = $content;
        return $this;
    }

    public function withUsername(string $username): self
    {
        $this->properties['username'] = $username;
        return $this;
    }

    public function withAvatarUrl(string $avatarUrl): self
    {
        $this->properties['avatarUrl'] = $avatarUrl;
        return $this;
    }

    public function withEmbed(Embed $embed): self
    {
        $this->properties['embeds'][] = $embed;
        return $this;
    }

    public function build(): Hook
    {
        $hook = new Hook();
        return $this->customize($hook);
    }

    private function customize(Hook $hook): Hook
    {
        if (array_key_exists('content', $this->properties)) {
            $hook->setContent($this->properties['content']);
        }
        if (array_key_exists('username', $this->properties)) {
            $hook->setUsername($this->properties['username']);
        }
        if (array_key_exists('avatarUrl', $this->properties)) {
            $hook->setAvatarUrl($this->properties['avatarUrl']);
        }
        if (array_key_exists('embeds', $this->properties)) {
            foreach ($this->properties['embeds'] as $embed) {
                $hook->addEmbed($embed);
            }
        }
        return $hook;
    }
}
