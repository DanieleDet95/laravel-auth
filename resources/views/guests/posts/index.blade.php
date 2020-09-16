@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Ciao, questa é la lista dei post</h1>

        @foreach ($posts as $post)
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
                  <h2>Title: {{ $post->title }}</h2>
                  <p>Created at: {{ $post->created_at }}</p>
                  <a class="btn btn-primary left m-1" href="{{ route('posts.show', $post) }}">
                    <div>Visualizza</div>
                  </a>
                  <div class="clearfix"></div>
                </div>

              </div>
            </div>
          </div>

        @endforeach
      </div>
    </div>
  </div>

@endsection
