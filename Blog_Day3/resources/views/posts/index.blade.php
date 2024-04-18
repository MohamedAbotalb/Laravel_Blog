<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Posts</title>

  <!-- Bootstrap CSS -->
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" />
</head>

<body>
  <div class="container my-5">
    <h2>Posts</h2>
    <a class="btn btn-primary mb-4" href="/posts/create">Add New post</a>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($posts as $post)
      <div class="col">
        <div class="card h-100 text-center">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">Publisher: {{ $post->Publisher->name }}</p>
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
</body>

</html>
