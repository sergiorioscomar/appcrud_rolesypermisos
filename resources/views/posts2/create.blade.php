@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Post</h1>

    <form method="POST" action="{{ route('posts2.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $posts2->title ?? old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" name="content" required>{{ $posts2->content ?? old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="cover_image">Imagen de Portada</label>
            <input type="file" class="form-control" name="cover_image">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('posts2.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
