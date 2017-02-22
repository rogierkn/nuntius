<?php


namespace Nuntius\Http\Controllers\Api\Post;


use App\Http\Controllers\Controller;
use Nuntius\Models\Post;

class GetController extends Controller
{
    public function all()
    {
        return response()->json(['status' => 'ok', 'posts' => Post::orderBy('created_at', 'DESC')->get()]);
    }

    public function one(Post $post)
    {
        return response()->json(['status' => 'ok', 'post' => $post]);
    }
}