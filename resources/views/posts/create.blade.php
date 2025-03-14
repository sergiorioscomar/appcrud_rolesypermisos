@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear una Nota') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


