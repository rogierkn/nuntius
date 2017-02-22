<?php


namespace Nuntius\Http\Controllers\Api\Post;


use Nuntius\Http\Controllers\Controller;
use Nuntius\Models\Post;

class DeleteController extends Controller
{
    public function delete(Post $post)
    {
        $post->delete();
        return response()->json(['status' => 'ok']);
    }
}