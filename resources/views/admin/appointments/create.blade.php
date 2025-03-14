@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Agregar Turno</h1>

    <form action="{{ route('admin.appointments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Hora</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="mb-3">
            <label for="post2_id">Selecciona la cancha</label>
            <select name="post2_id" id="post2_id" class="form-control">
                @foreach ($post2s as $post2)
                    @if ($post2) <!-- Verifica si hay un post2 relacionado -->
                        <option value="{{ $post2->id }}">{{ $post2->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Crear Turno</button>
    </form>
</div>
@endsection
