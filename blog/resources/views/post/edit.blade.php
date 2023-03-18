@extends('layouts.app')

@section('title') edit @endsection

@section('content')


<div class="container">
    <div class="mb-3">
        <form   method="post" action="{{route('posts.update',$post['id'])}}" >
            @csrf
        @method('PUT')
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}" >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post['createdAt']}} </textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['postedBy']}}" >
</div>
<div class="col-auto">
    <button  type="submit" class="btn btn-primary mb-3">Create</button>
  </div>
  </form>
    </div>


@endsection

