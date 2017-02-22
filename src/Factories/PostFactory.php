<?php


namespace Nuntius\Factories;


use Illuminate\Events\Dispatcher;
use Nuntius\Events\PostCreated;
use Nuntius\Models\Post;

class PostFactory
{

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param array $postData
     * @return Post
     */
    public function createPost(array $postData) : Post
    {
        $post = new Post();
        $post->fill($postData);
        $post->user_id = $postData['user_id'];

        $post->save();

        // Dispatch event that a new post is created
        $this->dispatcher->dispatch(new PostCreated($post));

        return $post;
    }
}