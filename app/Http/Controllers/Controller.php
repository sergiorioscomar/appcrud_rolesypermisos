<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\Post2;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function welcome()
    {
        // Obtener todos los posts de la base de datos
        $posts = Post::all();

        // Retornar la vista 'welcome' con los posts
        return view('welcome', compact('posts'));
    }
    public function welcomeDev()
    {
        // Obtener todos los posts de la base de datos
        $posts = Post::all();
        $posts2 = Post2::all();

        // Retornar la vista 'welcome' con los posts
        return view('welcomeDev', compact('posts','posts2'));
    }

}
