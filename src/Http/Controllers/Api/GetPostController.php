<?php


namespace Nuntius\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Nuntius\Post;

class GetPostController extends Controller
{
    public function all()
    {
        return response()->json(['status' => 'ok', 'posts' => Post::all()]);
    }

    public function one()
    {

    }
}