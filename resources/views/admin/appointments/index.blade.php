@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Administrar Turnos</h1>
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary">Agregar Turno</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Cancha</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Disponibilidad</th>
                <th>id Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->post2s->title }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->is_available ? 'Disponible' : 'Reservado' }}</td>
                    <td>{{ $appointment->user_id }}</td>
                    <td>
                        @if ($appointment->is_available == false)
                            <!-- Mostrar el botón de cancelar solo si el turno está reservado -->
                            <form action="{{ route('admin.appointments.cancel', $appointment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Cancelar Reserva</button>
                            </form>
                        @endif
                         <!-- Botón de Editar -->
                        @if(Auth::id() === $appointment->user_id || Auth::user()->isadmin)
                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-sm btn-primary">
                                Editar
                            </a>

                            <!-- Botón de Eliminar -->
                            <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')">
                                    Eliminar
                                </button>
                            </form>
                        @else
                            <span>No tienes permiso para editar o eliminar</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->post2s->title }}</td> <!-- Mostrar el nombre de la cancha -->
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->is_available ? 'Disponible' : 'Reservado' }}</td>
        </tr>
    @endforeach
    <table class="table mt-3">
        <h1>Turnos Pasados</h1>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Disponibilidad</th>
                <th>id Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastAppointments as $pastAppointment)
                <tr>
                    <td>{{ $pastAppointment->date }}</td>
                    <td>{{ $pastAppointment->time }}</td>
                    <td>{{ $pastAppointment->is_available ? 'Disponible' : 'Reservado' }}</td>
                    <td>{{ $pastAppointment->user_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
