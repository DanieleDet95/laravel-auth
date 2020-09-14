@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Ciao {{ $user->name }}, questa é la lista dei post</h1>

        <ul>
          @foreach ($posts as $post)
            <li>{{ $post->user->name }} - {{ $post->title }}</li>
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
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
