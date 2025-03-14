@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reservar Turnos</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Sección de reservas del usuario -->
        @if (Auth::user()->isadmin)
            <h2>Reservas</h2>
        @else
            <h2>Mis Reservas</h2>
        @endif
        @if ($userAppointments->isEmpty())
            <p>No has realizado ninguna reserva todavía.</p>
        @else
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Cancha</th>
                        <th>Fecha y Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userAppointments as $appointment)
                        <tr>
                            <td><p>{{ $appointment->post2s->title }}</p></td>
                            <td><p> {{ $appointment->date }} {{ $appointment->time }}</p></td>
                            <td>
                                <form action="{{ route('user.appointments.cancel', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancelar Reserva</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Sección de turnos disponibles -->
        <h2>Turnos Disponibles</h2>

        @if ($availableAppointments->isEmpty())
            <p>No hay turnos disponibles en este momento.</p>
        @else
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Cancha</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableAppointments as $appointment)
                        <tr>
                            <td><p>{{ $appointment->post2s->title }}</p></td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>
                                <form action="{{ route('user.appointments.reserve', $appointment->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Reservar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
