@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">BIENVENIDO!</h1>
        @if(Auth::user()->isadmin)
            <!-- Contenido para administradores -->
            <p>Este contenido es solo visible para administradores.</p>
            <p>Tu Administrador puede crear editar actualizar y eliminar los post</p>
            <p>Tu Administrador puede editar los permisos de los usuarios</p>
        @else
            <!-- Contenido para usuarios -->
            <p>Este contenido es visible para usuarios normales.</p>
            <p>Tu usuario solo puede visualizar los post en la seccion POSTS</p>
        @endif
    </div>
@endsection
