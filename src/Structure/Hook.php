<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

use DiscordHooks\CaseStyleConverter;

class Hook
{
    use CaseStyleConverter;

    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $avatarUrl;
    /**
     * @var string
     */
    private $content;
    /**
     * @var EmbedCollection | null
     */
    private $embeds;

    public function __construct()
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    public function addEmbed(Embed $embed): self
    {
        if (!$this->embeds instanceof EmbedCollection) {
            $this->embeds = new EmbedCollection();
        }
        $this->embeds->append($embed);
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function getEmbeds(): ?\ArrayObject
    {
        return $this->embeds;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function serialize(): array
    {
        $array = [];
        $rc = new \ReflectionClass(__CLASS__);
        $properties = $rc->getProperties();
        foreach ($properties as $property) {
            $propertyName = $property->getName();

            if (($this->{$propertyName} instanceof \ArrayObject) && count($this->{$propertyName}) > 0) {
                foreach ($this->{$propertyName} as $item) {
                    print_r($item);
                    $array[$this->toSnakeCase($propertyName)][] = $item->serialize();
                }
                continue;
            }
            if (is_object($this->{$property->getName()})) {
                $array[$this->toSnakeCase($propertyName)] = $this->{$propertyName}->serialize();
            }
            if (!empty($this->{$property->getName()})) {
                $array[$this->toSnakeCase($propertyName)] = $this->{$propertyName};
            }
        }
        return $array;
    }
}
