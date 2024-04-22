@extends('layouts.app')

@section('title', 'Show post')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $post->title }}</h2>
                </div>
                <div class="card-body">
                    <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="Post Image">
                    <p>{{ $post->description }}</p>

                    @if ($post->comments->isNotEmpty())
                    <div class="container mt-5">
                        <h3>Comments</h3>
                        @foreach($post->comments as $comment)
                        <div class="card my-3">
                            <div class="card-body">
                                <p>{{ $comment->content }}</p>
                                <p><strong>Author: </strong>{{ $comment->user->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Comment Form -->
                    <div class="container mt-5">
                        <h3>Add Comment</h3>
                        <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mb-3">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3"></textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Publisher Details</h3>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $post->Publisher->name }}</p>
                    <!-- Add more publisher details here if needed -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
