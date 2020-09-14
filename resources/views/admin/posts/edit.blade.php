@extends('layouts.app')

@section('content')

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif

  <div class="container">
    <div class="row">
      <div class="col-12">

        <h1 class="red">Modifica post: {{ $post->title }}</h1>

        <form action="{{ route('admin.posts.update', $post->id ) }}" method="post">
          @csrf
          @method('PUT')

          <label>Title</label><br>
          <input type="text" name="title" value="{{ $post->title }}"><br>

          <label>Contenuto</label><br>
          <textarea rows="4" cols="50" name="content">{{ $post->content }}</textarea><br>

          <input type="submit" value="Modifica">
        </form>

      </div>
    </div>
  </div>

@endsection