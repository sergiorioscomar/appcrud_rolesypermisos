@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administrar Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>SuperAdmin</th>
                <th>Rol</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isadmin ? 'Yes' : 'No' }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
