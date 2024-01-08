@extends('layouts.mainLayout')
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" name="content" rows="6" class="form-control" id="content" placeholder="Content"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" accept=".jpg" class="form-control" id="image" placeholder="Select image">
        </div>
        <button type="submit" class="btn btn-primary">Add post</button>
    </form>
@endsection