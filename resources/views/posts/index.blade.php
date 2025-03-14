@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Notas</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (Auth::user()->isadmin)
                        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear una Nota nueva</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Ver</a>

                                        @if (Auth::user()->isadmin)
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
