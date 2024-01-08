@extends('layouts.mainLayout')
@section('content')
    <div>
        <button onclick="document.location.href='{{ route('post.index') }}'">Back</button>
            <div>Id {{$post->id}}</div>
            <div>Title: {{$post->title}}</div>
            <div>Content: {{$post->content}}</div>
        <button onclick="document.location.href='{{ route('post.edit', $post->id) }}'">Edit post</button>
    </div>
@endsection
