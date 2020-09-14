@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>{{ $post->content }}</p> 
      </div>
    </div>
  </div>

@endsection
