<?php

namespace App\Http\Controllers;

use App\Models\Post2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOrSuperuser')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    public function index()
    {
        // Obtener todos los posts
        $posts2 = Post2::latest()->get();

        $appointments = Post2::with('appointments')->get();  // Cargar la relación con las canchas


        return view('posts2.index', compact('posts2','appointments'));
    }

    public function create()
    {
        return view('posts2.create');
    }

    public function store(Request $request)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        // Manejar la imagen de portada
        if ($request->hasFile('cover_image')) {
            $fileName = $request->file('cover_image')->store('cover_images', 'public');
            $validated['cover_image'] = $fileName;
        }

        // Crear el post
        Post2::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'cover_image' => $validated['cover_image'] ?? null,
            'published_at' => now(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts2.index')->with('success', 'Publicacion creada con éxito.');
    }

    public function show(Post2 $post2)
    {
        $post2->load('user');
        return view('posts2.show', compact('post2'));
    }

    public function edit(Request $request, Post2 $post2)
    {
        // Verificar si el usuario es el autor o administrador
        if (Auth::id() !== $post2->user_id && !Auth::user()->isadmin) {
            return redirect()->route('posts2.index')->with('error', 'No tienes permiso para editar esta post2.');
        }

        return view('posts2.edit', compact('post2'));
    }

    public function update(Request $request, Post2 $post2)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        // Manejar la imagen de portada si se sube una nueva
        if ($request->hasFile('cover_image')) {
            $fileName = $request->file('cover_image')->store('cover_images', 'public');
            $validated['cover_image'] = $fileName;
        }

        // Verificar si el usuario es el autor o administrador
        if (Auth::id() !== $post2->user_id && !Auth::user()->isadmin) {
            return redirect()->route('posts2.index')->with('error', 'No tienes permiso para editar esta post2.');
        }

        // Actualizar el post
        $post2->update($validated);

        return redirect()->route('posts2.index')->with('success', 'Publicacion actualizada con éxito.');
    }

    public function destroy(Post2 $post2)
    {
        // Verificar si el usuario es el autor o administrador
        if (Auth::id() !== $post2->user_id && !Auth::user()->isadmin) {
            return redirect()->route('posts2.index')->with('error', 'No tienes permiso para eliminar esta post2.');
        }

        // Eliminar post2
        $post2->delete();

        return redirect()->route('posts2.index')->with('success', 'Publicacion eliminada con éxito.');
    }
}
