@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Ciao {{ $user->name }}, questa é la lista dei post</h1>

        <a class="btn btn-success m-1" href="{{ route('admin.posts.create') }}">
          <div>Inserisci nuovo post</div>
        </a>

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
                  <h3>Author: {{ $post->user->name }}</h3></>
                  <a class="btn btn-primary left m-1" href="{{ route('admin.posts.show', $post) }}">
                    <div>Visualizza</div>
                  </a>
                  <a class="btn btn-secondary left m-1" href="{{ route('admin.posts.edit', $post) }}">
                    <div>Modifica</div>
                  </a>
                  <form class="" action="{{ route('admin.posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger left m-1" type="submit" value="Elimina">
                  </form>
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
