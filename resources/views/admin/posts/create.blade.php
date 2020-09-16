@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <h1>Crea nuovo post</h1>

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <div>
            <label>Titolo</label>
            <input type="text" name="title" value="{{ old('title') }}">
          </div>
          <div>
            <label>Contenuto</label>
            <textarea rows="8" cols="80" name="content">{{ old('content') }}</textarea>
          </div>
          <div>
            <label>Immagine</label>
            <input type="file" name="image" accept="image/*">
          </div>
          <div>
            <input type="submit" value="Salva">
          </div>

        </form>

        <div>
          <a href="{{ route('admin.posts.index')}}">Indietro</a>
        </div>

      </div>
    </div>
  </div>

@endsection
