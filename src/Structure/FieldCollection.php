<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

class FieldCollection extends \ArrayObject
{
    public function serialize(): array
    {
        $fields = [];
        foreach ($this->getIterator() as $item) {
            $fields[] = $item->serialize();
        }
        return $fields;
    }
}
