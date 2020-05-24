<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function test_serialize(): void
    {
        $testUrl = 'http://image.url';
        $testImage = new Image($testUrl);

        $this->assertEquals([
            'url' => $testUrl
        ],
            $testImage->serialize()
        );
    }
}
