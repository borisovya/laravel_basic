@extends('layouts.mainLayout')
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter title">

            @error('title')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" name="content" rows="6" class="form-control" id="content"
                      placeholder="Content">{{ old('content') }}</textarea>

            @error('content')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" value="{{ old('image') }}" name="img" accept=".jpg" class="form-control" id="img" placeholder="Select image">

            @error('image')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)

                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>

            @error('category_id')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" multiple name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>

            @error('tags')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add post</button>
    </form>
@endsection
