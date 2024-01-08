<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        $posts1 = Post::all();

        return view('post.index', compact('posts1'));
    }

    public function create() {

        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {

        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {

        return view('post.edit', compact('post'));
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function update(Post $post) {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }

    public function firstOrCreate() {

        $post = Post::firstOrCreate([
            'title' => 'some post!!!',
        ],[
            'title' => 'some post!!!',
            'content' => 'some post content!!!!',
            'image' => 'img url',
            'likes_count' => 4233,
            'is_published' => 1,
        ]);
        dump($post -> content);
        dd('finished firstOrCreate');
    }

    public function updateOrCreate() {

        $post = Post::updateOrCreate([
            'title' => 'some post1',
        ],[
            'title' => 'some post1',
            'content' => 'updaateOrCreate some post content1',
            'image' => 'img url1',
            'likes_count' => 40,
            'is_published' => 0,
        ]);
        dump($post -> content);
        dd('finished updateOrCreate');
    }
}
