@extends('layouts.admin')

@section('content')
    <div >
        <button class="btn-success" onclick="document.location.href='{{ route('post.create') }}'">Create post</button>
        @foreach($posts as $post)
            <div>
                {{$post->id}}. {{$post->title}}
                <span>
                    <button class="btn-info" onclick="document.location.href='{{ route('post.show', $post->id) }}'">Show details</button>
                </span>
                <span>
                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="btn-danger" type="submit" value="Delete">
                    </form>
                </span>
            </div>
        @endforeach

        <div class="card-body mt-3">
            <div class="card-body">{{ $posts->withQueryString()->links() }}</div>
        </div>
    </div>
@endsection
