@extends('layouts.app')

@section('content')

  {{-- <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>{{ $user->name }} ecco il post: {{ $post->title }}</h1>
        <h2>Email: {{ $user->email }}</h2>

        @if (isset($post->image))
          @if (strpos($post->image, 'lorempixel') == false)
           <img src="{{ asset('storage').'/'.$post->image }}" alt="{{ $post->title }}">
           @else
           <img src="{{ $post->image }}" alt="{{ $post->title }}">
          @endif
        @endif

        <p>{{ $post->content }}</p>
        <div>
          <a href="{{ route('admin.posts.index')}}">Indietro</a>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="blocco">
    <div class="container">
      <div class="row">

        <div class="col-6">
          @if (isset($post->image))
            @if (strpos($post->image, 'lorempixel') == false)
             <img src="{{ asset('storage').'/'.$post->image }}" alt="{{ $post->title }}">
             @else
             <img src="{{ $post->image }}" alt="{{ $post->title }}">
            @endif
          @endif
        </div>

        <div class="col-6 info">
          <h1>{{ $user->name }} ecco il post: {{ $post->title }}</h1>
          <h2>Email: {{ $user->email }}</h2><br>
          <p>{{ $post->content }}</p>
          <div class="clearfix"></div>
        </div>

      </div>
    </div>
  </div>
  <div>
    <a href="{{ route('admin.posts.index')}}">Indietro</a>
  </div>

@endsection
