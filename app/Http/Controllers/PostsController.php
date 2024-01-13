<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
//        $category = Category::find(2);
//        $posts1 = $category->posts;
//        $post = Post::find(2);
//        $tag = Tag::find(2);
//        dd($tag->posts);
        $posts1 = Post::all();

        return view('post.index', compact('posts1'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function update(Post $post, TestRequest $request)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'some post!!!',
        ], [
            'title' => 'some post!!!',
            'content' => 'some post content!!!!',
            'image' => 'img url',
            'likes_count' => 4233,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished firstOrCreate');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'some post1',
        ], [
            'title' => 'some post1',
            'content' => 'updaateOrCreate some post content1',
            'image' => 'img url1',
            'likes_count' => 40,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd('finished updateOrCreate');
    }
}
