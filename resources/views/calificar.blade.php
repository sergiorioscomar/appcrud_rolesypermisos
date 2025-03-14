@extends('layouts.app')

@section('content')

<div class="hero-desc"></div>
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Calificar</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <p>Calificar!</p>
                        <form action="{{ url('calificaciones?action=datos') }}" method="POST">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $userid }}">
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="stars">
                                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label>
                                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>
                                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
                                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="review">Review:</label>
                                <textarea name="review" class="form-control" id="review" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .stars {
        direction: ltr;
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .stars input {
        display: none;
    }

    .stars label {
        font-size: 2em;
        color: #ccc;
        cursor: pointer;
        padding: 0 5px;
        direction: ltr;
    }

    .stars input:checked ~ label {
        color: #f39c12;
    }

    .stars label:hover,
    .stars label:hover ~ label {
        color: #f39c12;
    }
    /* Orden de las estrellas */
    .stars input:nth-of-type(1) + label { order: 5; }
    .stars input:nth-of-type(2) + label { order: 4; }
    .stars input:nth-of-type(3) + label { order: 3; }
    .stars input:nth-of-type(4) + label { order: 2; }
    .stars input:nth-of-type(5) + label { order: 1; }
    .hero-desc {
        width: 100%;
        height: 150px;
        background-image: url('img/calificaciones/home.png');
        background-size: cover;
        background-position: center;
    }
    .container {
        max-width: 600px;
        margin-top: 50px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection
