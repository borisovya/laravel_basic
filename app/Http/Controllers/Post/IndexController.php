<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request ->validate($request->rules());

        $page = $data['page'] ?? 1;
        $per_page = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts1 = Post::filter($filter)->paginate($per_page, ['*'], 'page', $page);

        return PostResource::collection($posts1);
        //return view('post.index', compact('posts1'));
    }
}
