@extends('layouts.app')

@section('title', 'Create new post')

@section('content')
  <div class="container my-5">
    <h2>Create New Post</h2>
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      @csrf
      <div class="form-group my-3">
        <label for="title">Title</label>
        <input type="text" class="form-control my-3" id="title" name="title">
        @error('title')
          <div class="text-danger my-2">
            <ul>
              <li>{{ $message }}</li>
            </ul>
          </div>
        @enderror
      </div>
      <div class="form-group my-3">
        <label for="description">Description</label>
        <textarea class="form-control my-3" id="description" name="description" rows="5"></textarea>
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection