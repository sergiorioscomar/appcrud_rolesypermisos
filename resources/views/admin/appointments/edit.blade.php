@extends('layouts.app')

@section('content')
<div class="container">
<h1>Editar Turno</h1>

<form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="post2_id">Selecciona la Cancha</label>
        <select name="post2_id" id="post2_id" class="form-control">
            @foreach ($appointments as $appointment)
                <option value="{{ $appointment->post2->id }}">{{ $appointment->post2->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="date">Fecha:</label>
        <input type="date" class="form-control" name="date" value="{{ $appointment->date }}" required>
    </div>

    <div class="form-group">
        <label for="time">Hora:</label>
        <input type="time" class="form-control" name="time" value="{{ $appointment->time }}" required>
    </div>

    <div class="form-group">
        <label for="is_available">Disponibilidad:</label>
        <select name="is_available" class="form-control">
            <option value="1" {{ $appointment->is_available ? 'selected' : '' }}>Disponible</option>
            <option value="0" {{ !$appointment->is_available ? 'selected' : '' }}>No disponible</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Turno</button>
</form>
</div>
@endsection

