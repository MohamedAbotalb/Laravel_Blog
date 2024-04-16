<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$post['title']}}</title>

  <!-- Bootstrap CSS -->
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" />
</head>

<body>
  <div class="container my-5 ">
    <div class="card">
      <div class="card-header">
        <h2>{{ $post['title'] }}</h2>
      </div>
      <div class="card-body">
        <p>{{ $post['description'] }}</p>
        <p><strong>Publisher: </strong> {{ $post['publisher'] }}</p>
      </div>
      <div class="card-footer">
        <a href="/posts" class="btn btn-primary">Back to Home</a>
      </div>
    </div>
  </div>
</body>

</html>