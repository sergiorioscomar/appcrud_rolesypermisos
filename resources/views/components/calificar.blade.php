                    <div class="card-body">
                        <form action="{{ url('calificaciones?action=datos') }}" method="POST">
                            @csrf
                            @if (Auth::check())
                                <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                            @else
                                <div class="form-group">
                                    <p>Tiene que ingresar a su cuenta para poder calificar nuestra web</p>
                                </div>
                            @endif

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
