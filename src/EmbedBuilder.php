<?php

namespace DiscordHooks;

use DiscordHooks\Structure\Author;
use DiscordHooks\Structure\Embed;
use DiscordHooks\Structure\Field;
use DiscordHooks\Structure\Footer;
use DiscordHooks\Structure\Image;
use DiscordHooks\Structure\Thumbnail;

class EmbedBuilder
{
    private $properties;
    
    private function __construct()
    {
    }

    public static function createEmbed(): self
    {
        return new self();
    }

    public function withColor(int $color): self
    {
        $this->properties['color'] = $color;
        return $this;
    }

    public function withAuthor(Author $author): self
    {
        $this->properties['author'] = $author;
        return $this;
    }

    public function withTitle(string $title): self
    {
        $this->properties['title'] = $title;
        return $this;
    }

    public function withUrl(string $url): self
    {
        $this->properties['url'] = $url;
        return $this;
    }

    public function withDescription(string $description): self
    {
        $this->properties['description'] = $description;
        return $this;
    }

    public function withField(Field $field): self
    {
        $this->properties['fields'][] = $field;
        return $this;
    }

    public function withThumbnail(Thumbnail $thumbnail): self
    {
        $this->properties['thumbnail'] = $thumbnail;
        return $this;
    }

    public function withImage(Image $image): self
    {
        $this->properties['image'] = $image;
        return $this;
    }

    public function withFooter(Footer $footer): self
    {
        $this->properties['footer'] = $footer;
        return $this;
    }

    public function withTimestamp(): self
    {
        $this->properties['timestamp'] = true;
        return $this;
    }

    public function build(): Embed
    {
        if (!$this->propertiesAreValid()) {
            throw new \InvalidArgumentException("");
        }
        $withTimestamp = false;
        if ($this->properties['timestamp']) {
            $withTimestamp = true;
        }
        $embed = new Embed($withTimestamp);

        return $this->customize($embed);
    }

    private function customize(Embed $embed): Embed
    {
        if (array_key_exists('color', $this->properties)) {
            $embed->setColor($this->properties['color']);
        }
        if (array_key_exists('author', $this->properties)) {
            $embed->setAuthor($this->properties['author']);
        }
        if (array_key_exists('title', $this->properties)) {
            $embed->setTitle($this->properties['title']);
        }
        if (array_key_exists('description', $this->properties)) {
            $embed->setDescription($this->properties['description']);
        }
        return $embed;
    }

    private function propertiesAreValid(): bool
    {
        return true;
    }
}
