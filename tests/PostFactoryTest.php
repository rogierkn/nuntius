<?php


namespace Nuntius\Tests;

use Illuminate\Database\Eloquent\Model;
use Nuntius\Factories\PostFactory;
use Nuntius\Tests\Models\User;


class PostFactoryTest extends TestCase
{
    private $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::create(['name' => 'Nuntius', 'email' => 'test@nuntius.dev', 'password' => 'testPassword']);
    }

    public function testPostCreation()
    {
        $dispatcherMock = $this->createMock(\Illuminate\Events\Dispatcher::class);
        $dispatcherMock->expects($this->once())->method('dispatch')->withAnyParameters();

        $postFactory = new PostFactory($dispatcherMock);
        $postFactory->createPost(['user_id' => $this->user->id, 'title' => 'Test Blog title', 'body' => 'Blog body']);

        $this->assertDatabaseHas('nuntius_posts', ['title' => 'Test Blog title']);
    }
}
