@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Ciao, questa é la lista dei post</h1>

        <ul>
          @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
            <a class="btn btn-primary left m-1" href="{{ route('posts.show', $post) }}">
              <div>Visualizza</div>
            </a>
            <div class="clearfix"></div>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
