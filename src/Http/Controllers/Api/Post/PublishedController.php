<?php


namespace Nuntius\Http\Controllers\Api\Post;



use Nuntius\Http\Controllers\Controller;
use Nuntius\Models\Post;

class PublishedController extends Controller
{
    public function toggle(Post $post)
    {
        $post->togglePublished();
        $post->save();

        return response()->json(['status' => 'ok', 'post' => $post]);
    }
}