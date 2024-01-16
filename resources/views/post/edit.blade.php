@extends('layouts.mainLayout')
@section('content')
    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control" id="title"
                   placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" name="content" rows="6" class="form-control" id="content"
                      placeholder="Content">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" value="{{$post->image}}" name="img" accept=".jpg" class="form-control" id="img"
                   placeholder="Select image">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" multiple name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option @foreach($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update post</button>
    </form>
@endsection
