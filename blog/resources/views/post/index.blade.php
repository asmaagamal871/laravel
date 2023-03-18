<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
    <a class="navbar-brand" href="#">ITI Blog</a>
    <a class="navbar-brand" href="#">All posts</a>
  </nav>
</div>

<div class="container">
    <div class="mb-3"><button type="button" class="btn btn-success">Create Post</button> </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($posts as $post)
      <tr>
      <th scope="row">{{$post["id"]}}</th>
      <td>{{$post["title"]}}</td>
      <td>{{$post["postedBy"]}}</td>
      <td>{{$post["createdAt"]}}</td>
      <td>
        <a href="{{route('posts.show',$post['id']) }}" type="button" class="btn btn-info">View</a>
      <a type="button" class="btn btn-primary">Edit</a>
      <a type="button" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    
    @endforeach
    
    
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>