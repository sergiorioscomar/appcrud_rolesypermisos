@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permiso Denegado') }}</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        No tienes permisos para acceder a esta página.
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
