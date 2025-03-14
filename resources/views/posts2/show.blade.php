@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post2->title }}</h1>

    @if($post2->cover_image)
        <img src="{{ asset('storage/' . $post2->cover_image) }}" class="img-fluid mb-3" alt="{{ $post2->title }}">
    @endif

    <div class="post-content">
        <p>{{ $post2->content }}</p>
    </div>
    <p><strong>Creado por:</strong> {{ $post2->user->name }}</p>
    <p>
        <small>
            @if($post2->published_at)
                Publicado el {{ date('d/m/Y H:i', strtotime($post2->published_at)) }}
            @else
                Sin fecha de publicación
            @endif
        </small>
    </p>

    @if (Auth::check())
        @if (Auth::id() == $post2->user_id || Auth::user()->isadmin)
            <a href="{{ route('posts2.edit', $post2->id) }}" class="btn btn-warning">Editar</a>

            <form action="{{ route('posts2.destroy', $post2->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        @endif
    @endif
    <br>
    <a href="{{ route('posts2.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
</div>
@endsection
