@extends('layouts.app')

@section('content')
<div class="container">
<h1>Publicaciones</h1>
<h3>Canchas de Futbol</h3>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (Auth::user()->role=="admin")
    <a href="{{ route('posts2.create') }}" class="btn btn-primary mb-3">Crear nueva publicación</a>
    @endif

<div class="row">
    @foreach($posts2 as $post2)
        <div class="col-md-4">
            <div class="card mb-3">
                @if($post2->cover_image)
                    <img src="{{ asset('storage/' . $post2->cover_image) }}" class="card-img-top" alt="{{ $post2->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $post2->title }}</strong></h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post2->content, 100) }}</p>
                    <p><small>Publicado el {{ $post2->published_at }}</small></p>
                    <p><strong>Creado por:</strong> {{ $post2->user->name }}</p>
                    <a href="{{ route('posts2.show', $post2->id) }}" class="btn btn-info">Ver más</a>
                    @if(Auth::check() && (Auth::id() == $post2->user_id || Auth::user()->isadmin))
                        <a href="{{ route('posts2.edit', $post2->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('posts2.destroy', $post2->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
