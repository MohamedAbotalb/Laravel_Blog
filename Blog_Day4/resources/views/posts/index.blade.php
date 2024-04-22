@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
  <div class="container my-5">
    <h2>Posts</h2>
    <a class="btn btn-primary mb-4" href="/posts/create">Add New post</a>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($posts as $post)
      <div class="col">
        <div class="card h-100 text-center">
          <img src="{{ asset($post->image) }}" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">Publisher: {{ $post->Publisher->name }}</p>
            <p class="card-text">Slug: {{ $post->slug }}</p>
            <div class="mt-3">
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Update</a>
              <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
  </div>

@endsection