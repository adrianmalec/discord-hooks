<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Field;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{
    public function test_serialize(): void
    {
        $testName = 'name';
        $testValue = 'value';
        $testInline = true;

        $testField = new Field($testName, $testValue, $testInline);

        $this->assertEquals(
            [
                'name' => $testName,
                'value' => $testValue,
                'inline' => $testInline
            ],
            $testField->serialize()
        );
    }
}
