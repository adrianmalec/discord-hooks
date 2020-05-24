<?php
declare(strict_types=1);

namespace DiscordHooks\Tests\Structure;

use DiscordHooks\Structure\Hook;
use PHPUnit\Framework\TestCase;

class HookTest extends TestCase
{
    public function test_serialize_username(): void
    {
        $testHook = new Hook();
        $testHook->setUsername('username');

        $this->assertEquals(
            [
                'username' => 'username',
            ],
            $testHook->serialize()
        );
    }

    public function test_serialize_content(): void
    {
        $testHook = new Hook();
        $testHook->setContent('content');

        $this->assertEquals(
            [
                'content' => 'content',
            ],
            $testHook->serialize()
        );
    }

    public function test_serialize_avatar_url(): void
    {
        $testHook = new Hook();
        $testHook->setAvatarUrl('http://avatar.url');

        $this->assertEquals(
            [
                'avatarUrl' => 'http://avatar.url',
            ],
            $testHook->serialize()
        );
    }

    public function test_serialize_username_and_avatar_url(): void
    {
        $testHook = new Hook();
        $testHook
            ->setUsername('username')
            ->setAvatarUrl('http://avatar.url');

        $this->assertEquals(
            [
                'avatarUrl' => 'http://avatar.url',
                'username' => 'username'
            ],
            $testHook->serialize()
        );
    }

    public function test_serialize_username_and_content(): void
    {
        $testHook = new Hook();
        $testHook
            ->setUsername('username')
            ->setContent('content');

        $this->assertEquals(
            [
                'username' => 'username',
                'content' => 'content'
            ],
            $testHook->serialize()
        );
    }
}
