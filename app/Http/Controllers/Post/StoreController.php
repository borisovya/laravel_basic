<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate($request->rules());

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}
