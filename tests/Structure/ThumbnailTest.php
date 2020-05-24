<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Thumbnail;
use PHPUnit\Framework\TestCase;

class ThumbnailTest extends TestCase
{

    public function test_serialize(): void
    {
        $testUrl = 'http://thumbnail.url';
        $testThumbnail = new Thumbnail($testUrl);

        $this->assertEquals([
            'url' => $testUrl
        ],
            $testThumbnail->serialize()
        );
    }
}
