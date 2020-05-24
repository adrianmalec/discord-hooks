<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

use DiscordHooks\CaseStyleConverter;

class Author
{
    use CaseStyleConverter;
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $iconUrl;

    public function __construct()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setIconUrl(string $iconUrl): void
    {
        $this->iconUrl = $iconUrl;
    }

    public function serialize(): array
    {
        $array = [];
        $rc = new \ReflectionClass(__CLASS__);
        foreach ($rc->getProperties() as $property) {
            if (!empty($this->{$property->getName()})) {
                $array[$this->toSnakeCase($property->getName())] = $this->{$property->getName()};
            }
        }
        return $array;
    }
}
