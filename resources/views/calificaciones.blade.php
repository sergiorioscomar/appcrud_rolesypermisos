@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todas las Calificaciones</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calificaciones as $calificacion)
                <tr>
                    <td>{{ $calificacion->id }}</td>
                    <td>{{ $calificacion->userid }}</td>
                    <td>{{ $calificacion->email }}</td>
                    <td>{{ $calificacion->rating }}</td>
                    <td>{{ $calificacion->review }}</td>
                    <td>{{ $calificacion->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
