<?php


namespace Nuntius\Events;


use Illuminate\Queue\SerializesModels;
use Nuntius\Models\Post;

class PostCreated
{
    use SerializesModels;

    /**
     * @var \Nuntius\Models\Post
     */
    public $post;

    /**
     * PostCreated constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}