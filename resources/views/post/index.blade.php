@extends('layouts.mainLayout')
@section('content')
    <div>
        <button onclick="document.location.href='{{ route('post.create') }}'">Create post</button>
        @foreach($posts1 as $post)
            <div>
                {{$post->id}}. {{$post->title}}
                <span>
                    <button onclick="document.location.href='{{ route('post.show', $post->id) }}'">Show details</button>
                </span>
                <span>
                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </span>
            </div>
        @endforeach
    </div>
@endsection
