
@extends('layouts.app')

@section('title') index @endsection



@section('content')
   <div class="mb-3"><a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a> </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">slug</th>
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
      <td>{{$post["slug"]}}</td>
      @if($post->user)
      <td>{{$post->user->name}}</td>
      @else
      <td>not found</td>
      @endif
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
        <a href="{{route('posts.show',$post['id']) }}" type="button" class="btn btn-info">View</a>
        <a href="{{route('posts.edit',$post['id']) }}" type="button" class="btn btn-primary">Edit</a>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}" >
 Delete
</button>

<!-- Modal -->

    </td>
    </tr>
    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      <form action="{{route('posts.destroy',$post['id'])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" name="" class="btn btn-danger" >delete</button>
          </form>
        
      </div>
    </div>
  </div>
</div>
    
    @endforeach
    
  </tbody>
</table>
{{ $posts->links() }}
 


@endsection

