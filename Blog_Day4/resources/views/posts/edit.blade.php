@extends('layouts.app')

@section('title', 'Edit post')

@section('content')
  <div class="container my-5">
    <h2>Edit Post</h2>
    <form action="{{route('posts.update', $post['id'])}}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group my-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
        @error('title')
          <div class="text-danger my-2">
            <ul>
              <li>{{ $message }}</li>
            </ul>
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ $post['description'] }}</textarea>
        @error('description')
          <div class="text-danger my-2">
            <ul>
              <li>{{ $message }}</li>
            </ul>
          </div>
        @enderror
      </div>
      <div class="form-group my-3">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
          <div class="text-danger my-2">
            <ul>
              <li>{{ $message }}</li>
            </ul>
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

@endsection