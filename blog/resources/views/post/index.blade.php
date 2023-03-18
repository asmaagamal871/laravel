@extends('layouts.app')

@section('title') index @endsection



@section('content')
   <div class="mb-3"><a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a> </div>
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
@endsection
