@extends('layouts.app')

@section('title') create new post @endsection



@section('content')
    <div class="container">
    <div class="mb-3">
        <form action="{{route('posts.store')}}"  method="post">
        
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="col-auto">
    <button  type="submit" class="btn btn-primary mb-3">Create</button>
  </div>
  </form>
    </div>
  @endsection