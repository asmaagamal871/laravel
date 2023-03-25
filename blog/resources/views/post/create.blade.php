@extends('layouts.app')

@section('title') create new post @endsection



@section('content')
    <div class="container">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="mb-3">
        <form action="{{route('posts.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{old('title')}}" >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{old('description')}}</textarea>
</div>
<div class="form-group">
  <label for="user" class="form-label">Image</label>
  <input class="form-control" name="image" type="file" id="formFile">
</div>
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">

    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>

    @endforeach
    </select>
  </div>

</div>
<div class="col-auto">
    <button  type="submit" class="btn btn-primary mb-3">Create</button>
  </div>
  </form>
    </div>
  @endsection