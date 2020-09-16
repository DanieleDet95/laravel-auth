@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>{{ $post->title }}</h1>

        @if (isset($post->image))
          @if (strpos($post->image, 'lorempixel') == false)
           <img src="{{ asset('storage').'/'.$post->image }}" alt="{{ $post->title }}">
           @else
           <img src="{{ $post->image }}" alt="{{ $post->title }}">
          @endif
        @endif

        <p>{{ $post->content }}</p>

        <div>
          <a href="{{ route('posts.index')}}">Indietro</a>
        </div>
      </div>
    </div>
  </div>

@endsection
