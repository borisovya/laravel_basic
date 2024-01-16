<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\TestRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validate($request->rules());

        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->id);
    }
}
