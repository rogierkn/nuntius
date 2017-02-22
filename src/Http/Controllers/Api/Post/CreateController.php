<?php

namespace Nuntius\Http\Controllers\Api\Post;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Nuntius\Factories\PostFactory;

class CreateController extends Controller
{
    /**
     * @param PostFactory $postFactory
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PostFactory $postFactory)
    {
        $postData = ['user_id' => Auth::user()->id, 'title' => 'Dear diary', 'body' => 'Today was rad'];

        $post = $postFactory->createPost($postData);

        return response()->json(['status' => 'ok', 'post' => $post]);
    }
}