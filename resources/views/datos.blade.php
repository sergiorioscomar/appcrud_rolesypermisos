
@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Calificacion</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p>Gracias por tu calificación!</p>
                        <p></p>
                        <p>Email: {{ $email }}</p>
                        <p>Rating: {{ $rating }}</p>
                        <p>Review: {{ $review }}</p>
                        <p>UserId: {{ $userid }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
