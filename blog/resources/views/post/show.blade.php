@extends('layouts.app')

@section('title') display post @endsection



@section('content')
    <div class="container">
<div class="card m-3">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title:</h5>
    <p>Special title treatment</p>
    <h5 class="card-title">Description:</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>
<div class="card m-3">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post['id']}}</h5>
    <p>Ahmed</p>
    <h5 class="card-title">email:</h5>

    <p class="card-text">{{$post['title']}}</p>
    <h5 class="card-title">Posted By:</h5>

    <p class="card-text">{{$post['postedBy']}}</p>
    <h5 class="card-title">created at:</h5>

    <p class="card-text">{{$post['createdAt']}}</p>
    
    
  </div>
</div>
@endsection
