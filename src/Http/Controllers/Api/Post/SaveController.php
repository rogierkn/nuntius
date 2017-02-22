<?php


namespace Nuntius\Http\Controllers\Api\Post;


use App\Http\Controllers\Controller;
use Nuntius\Http\Requests\SaveBlogRequest;
use Nuntius\Models\Post;

class SaveController extends Controller
{

    public function save(SaveBlogRequest $saveBlogRequest, Post $post)
    {
        $post->update($saveBlogRequest->all());
        $post->touch();

        return response()->json(['status' => 'ok', 'post' => $post]);
    }
}