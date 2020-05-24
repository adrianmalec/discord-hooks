<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Embed;
use PHPUnit\Framework\TestCase;

class EmbedTest extends TestCase
{
    public function test_serialize_color(): void
    {
        $embed = new Embed();
        $embed->setColor(1);

        $this->assertEquals(
            [
                'color' => 1
            ],
            $embed->serialize()
        );
    }

    public function test_serialize_title(): void
    {
        $testTitle = 'title';
        $embed = new Embed();
        $embed->setTitle($testTitle);

        $this->assertEquals(
            [
                'title' => $testTitle
            ],
            $embed->serialize()
        );
    }
    public function test_serialize_url(): void
    {
        $testUrl = 'http://test.url';
        $embed = new Embed();
        $embed->setUrl($testUrl);

        $this->assertEquals(
            [
                'url' => $testUrl
            ],
            $embed->serialize()
        );
    }
    public function test_serialize_description(): void
    {
        $testDescription = 'description';
        $embed = new Embed();
        $embed->setDescription($testDescription);

        $this->assertEquals(
            [
                'description' => $testDescription
            ],
            $embed->serialize()
        );
    }

    public function test_serialize_timestamp(): void
    {
        $testTimestamp = date(DATE_RFC3339);
        $testEmbed = new Embed(true);
        $this->assertEquals(
            [
                'timestamp' => $testTimestamp
            ],
            $testEmbed->serialize()
        );
    }
}
