<?php

namespace Nuntius\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Nuntius\Http\Requests\CreateBlogPost;
use Nuntius\Post;

class CreatePostController extends Controller
{
    /**
     * @param CreateBlogPost $createBlogPostRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateBlogPost $createBlogPostRequest)
    {
        $post = new Post();
        $post->user()->associate(Auth::user());
        $post->fill($createBlogPostRequest->all());

        $post->save();

        return response()->json(['status' => 'ok']);
    }
}