<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

use DiscordHooks\CaseStyleConverter;

class Footer
{
    use CaseStyleConverter;
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $iconUrl;

    public function __construct()
    {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $iconUrl): void
    {
        $this->iconUrl = $iconUrl;
    }

    public function serialize()
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
