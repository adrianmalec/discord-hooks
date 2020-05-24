<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

class Field
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $value;
    /**
     * @var bool
     */
    private $inline;

    public function __construct(string $name, string $value, bool $inline = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->inline = $inline;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isInline(): bool
    {
        return $this->inline;
    }

    public function serialize(): array
    {
        $array = [];
        $rc = new \ReflectionClass(__CLASS__);
        foreach ($rc->getProperties() as $property) {
            if (!empty($this->{$property->getName()})) {
                $array[$property->getName()] = $this->{$property->getName()};
            }
        }
        return $array;
    }
}
