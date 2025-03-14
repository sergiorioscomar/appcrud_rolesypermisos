<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
      <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- Vendor CSS Files -->

    <title>Mi Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .hero-section {
            background: linear-gradient(153deg, rgb(5, 0, 128) 33%, rgb(3, 7, 20) 54%, rgb(2, 9, 47) 74%, rgb(0, 14, 215) 98%);
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link btn btn-primary text-white d-flex align-items-center">
                                <i class="fas fa-tachometer-alt me-2"></i> Panel
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link btn btn-outline-success d-flex align-items-center">
                                <i class="fas fa-sign-in-alt me-2"></i> Ingresar
                            </a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link btn btn-outline-warning d-flex align-items-center">
                                    <i class="fas fa-user-plus me-2"></i> Registrarse
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1>Bienvenido a mi web</h1>
            <p>Funcionalidades web principal, Panel, Administrar Usuarios, Notas,  Calificar, Realizar reservas de turnos, Dejar un mensaje.</p>
        </div>
    </section>
    <!-- =======  Blog Section ======= -->

    <!-- blog dinamico wp -->
    <div class="container">
        @include('components.publicaciones')
    </div>
    <!-- Blog Posts -->
    <section>
        <div class="container" style="text-align: center;">
            <h1>Notas</h1>
        </div>
        <div class="container mt-5">

            @if($posts->isEmpty())
                <p>No hay posts disponibles.</p>
            @else
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Leer más</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- ======= Fin Blog Section ======= -->

    <section class="hero-section">
        <div class="container">
            <p>Ver turnos disponibles</p>
            <p> <a href="/user/appointments" class="btn btn-primary">Ingresa para reservar</a> </p>
        </div>
    </section>

        <!-- ======= calificar Section ======= -->
        <div class="container mt-12">
            <div class="row" style="justify-content: center;">
                    <div class="col-md-8">
                        <br>
                        <h1>Dejanos una calificacion</h1>
                        <div class="card mb-8">
                            <div class="card-body">
                                @include('components.calificar')
                            </div>
                        </div>
                    </div>
                    </div>
        </div>
        <br>
        <!-- End Contact Section -->
    <!-- ======= Contact Section ======= -->
        <section class="hero-section">
            <div class="container">
                <h1> </h1>
                <p> Dejanos un Mensaje y nos ponemos en contacto</p>
            </div>
        </section>

        <div class="container mt-12">
            <div class="row" style="justify-content: center;">
                    <div class="col-md-8">
                        <br>
                        <div class="card mb-8">
                            <div class="card-body">
                                @include('components.contact')
                            </div>
                        </div>
                    </div>
                    </div>
        </div>
        <!-- End Contact Section -->
            <!-- Blog Posts -->
    <section>
        <div class="container" style="text-align: center;">
            <h1>Canchas</h1>
        </div>
        <div class="container mt-5">

            @if($posts2->isEmpty())
                <p>No hay posts disponibles.</p>
            @else
                <div class="row">
                    @foreach($posts2 as $post2)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                @if($post2->cover_image)
                                    <img src="{{ asset('storage/' . $post2->cover_image) }}" class="card-img-top" alt="{{ $post2->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $post2->title }}</strong></h5>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post2->content, 100) }}</p>
                                    <p><small>Publicado el {{ $post2->published_at }}</small></p>
                                    <p><strong>Creado por:</strong> {{ $post2->user->name }}</p>
                                    <a href="{{ route('posts2.show', $post2->id) }}" class="btn btn-primary">Leer más</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- ======= Fin Blog Section ======= -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Mi Blog. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.transition = "opacity 1s";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 1000);
                }
            }, 3000);
        });
    </script>
</body>

</html>
