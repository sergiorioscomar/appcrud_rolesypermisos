@extends('layouts.app')

@section('content')
<div class="container">
<h1>Editar post</h1>

<form method="POST" action="{{ route('posts2.update', $post2->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" name="title" value="{{ $post2->title ?? old('title') }}" required>
    </div>

    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control" name="content" required>{{ $post2->content ?? old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label for="cover_image">Imagen de Portada</label>
        <input type="file" class="form-control" name="cover_image">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
</div>
@endsection
