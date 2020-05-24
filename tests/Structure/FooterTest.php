<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Footer;
use PHPUnit\Framework\TestCase;

class FooterTest extends TestCase
{
    public function test_serialize_url(): void
    {
        $text = 'text';
        $testFooter = new Footer();
        $testFooter->setText($text);

        $this->assertEquals(
            [
                'text' => $text
            ],
            $testFooter->serialize()
        );
    }

    public function test_serialize_url_with_url_icon(): void
    {
        $text = 'text';
        $iconUrl = 'http://icon.url';

        $testFooter = new Footer();
        $testFooter->setText($text);
        $testFooter->setIconUrl($iconUrl);

        $this->assertEquals(
            [
                'text' => $text,
                'iconUrl' => $iconUrl
            ],
            $testFooter->serialize()
        );
    }
}
