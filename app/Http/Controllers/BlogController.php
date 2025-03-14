<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function getPublicacion()
    {
        // URL de la API
        $apiUrl = 'https://blog.sergiorios.com.ar/wp-json/wp/v2/posts?per_page=3&_embed';
        //$apiUrl = 'https://latincloud.com/blog/wp-json/wp/v2/posts?per_page=3&_embed';

        // Hacer la solicitud a la API
        //$response = Http::get($apiUrl);
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->get($apiUrl);

        // Verificar el código de estado
        if ($response->ok()) {
            // Obtener los datos de la respuesta
            $publicaciones = $response->json();

            // Depuración
            //dd($publicaciones); // Verifica si $posts1 tiene datos

            // Pasar los datos a la vista
            //return response()->json($publicaciones);
            // Mostrar la vista de calificación con el id y la información del usuario
            return view('publicaciones', [
                'publicaciones' => $publicaciones,
            ]);
        } else {
            // Si no hay id, mostrar un error
            return response()->json(['error' => 'Error'], 400);
        }
    }
}
