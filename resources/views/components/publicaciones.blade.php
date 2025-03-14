<!-- resources/views/components/publicaciones.blade.php -->

    <!-- blog dinamico wp -->
    <div class="container py-5">
        <h1 class="text-center mb-4">Últimas Publicaciones del Blog</h1>

        @if(isset($publicaciones) && count($publicaciones) > 0)
            <div class="row">
                @foreach($publicaciones as $post)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <a href="#" target="blank">
                            <img src="{{$publicacion['_embedded']['wp:featuredmedia'][0]['source_url']}}"
                                 class="card-img-top img-fluid"
                                 alt="Imagen destacada del post"
                                 style="max-height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="#" target="_blank" class="text-dark text-decoration-none">{{ $publicacion['title']['rendered'] }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit(strip_tags($publicacion['excerpt']['rendered']), 150) }}</p>
                        </div>
                        <div class="card-footer bg-transparent text-end">
                            <a href="#" class="btn btn-primary btn-sm" target="_blank">Leer más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center">No se encontraron publicaciones.</p>
        @endif
    </div>
