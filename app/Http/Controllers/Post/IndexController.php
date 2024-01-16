<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts1 = Post::paginate(10);

        return view('post.index', compact('posts1'));
    }
}
