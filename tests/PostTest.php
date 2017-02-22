<?php


namespace Nuntius\Tests;


use Nuntius\Factories\PostFactory;
use Nuntius\Models\Post;
use Nuntius\Tests\Models\User;


class PostTest extends TestCase
{
    public function testToggle()
    {
        $dispatcherMock = $this->createMock(\Illuminate\Events\Dispatcher::class);
        $dispatcherMock->method('dispatch')->withAnyParameters();

        $user = User::create(['name' => 'Nuntius', 'email' => 'test@nuntius.dev', 'password' => 'somePassword']);

        $postData = ['user_id' => $user->id, 'title' => 'title', 'body' => 'body'];

        $factory = new PostFactory($dispatcherMock);

        $post = $factory->createPost($postData);

        // Necessary because not all attributes are set at creation
        $post = Post::find($post->id);


        $this->assertFalse($post->published);
        $post->togglePublished();
        $this->assertTrue($post->published);
    }
}
