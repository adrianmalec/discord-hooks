<?php

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function test_serialize_name(): void
    {
        $name = 'name';
        $testAuthor = new Author();
        $testAuthor->setName($name);

        $this->assertEquals([
            'name' => $name
        ],
            $testAuthor->serialize()
        );
    }

    public function test_serialize_url(): void
    {
        $url = 'http://author.url';
        $testAuthor = new Author();
        $testAuthor->setUrl($url);

        $this->assertEquals([
            'url' => $url
        ],
            $testAuthor->serialize()
        );
    }

    public function test_serialize_icon(): void
    {
        $iconUrl = 'http://author.icon.url';
        $testAuthor = new Author();
        $testAuthor->setIconUrl($iconUrl);

        $this->assertEquals([
            'iconUrl' => $iconUrl
        ],
            $testAuthor->serialize()
        );
    }
}
