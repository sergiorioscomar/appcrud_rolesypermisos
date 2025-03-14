@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="isadmin">SuperAdmin</label>
            <select name="isadmin" class="form-control">
                <option value="0" {{ $user->isadmin == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $user->isadmin == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select type="text" name="role" id="role" class="form-control">
                <option value="{{ $user->email }}">{{ $user->role }}</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"> Actualizar </button>
    </form>
</div>
@endsection
