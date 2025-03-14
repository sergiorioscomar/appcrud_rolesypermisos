<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use Illuminate\Support\Facades\Auth;

class CalificarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**
     * Muestra el formulario para calificar.
     */
    public function index(Request $request)
    {
        // Validar si existe el id en la URL
        if ($request->has('userid') && !empty($request->input('userid'))) {
            $userid = $request->input('userid');
            $user = Auth::user();

            // Mostrar la vista de calificación con el id y la información del usuario
            return view('calificar', [
                'userid' => $user->id,
                'email' => $user->email,
            ]);
        } else {
            // Si no hay id, mostrar un error
            return response()->json(['error' => 'Error: Sin número de id.'], 400);
        }
    }

    public function calificaciones(Request $request)
    {
        // Traigo el usuario actual usando Auth
        $user = Auth::user();
        $userid = $user->id;
        $email = $user->email;

        // Acción ver datos
        if ($request->has('action') && $request->input('action') == 'datos') {
            if ($request->isMethod('post')) {
                $userid = $request->input('userid');
                $rating = $request->input('rating');
                $review = $request->input('review');

                if ($userid && $rating && $review) {
                    // Crear una nueva calificación usando el modelo Eloquent
                    Calificacion::create([
                        'userid' => $userid,
                        'email' => $email,
                        'rating' => $rating,
                        'review' => $review,
                    ]);

                }
            }

            return view('datos', [
                'email' => $email,
                'rating' => $rating ?? null,
                'review' => $review ?? null,
                'userid' => $userid ?? null,
            ]);
        }

    }

    public function mostrarCalificaciones()
    {
        // Obtener todas las calificaciones
        $calificaciones = Calificacion::all();

        // Pasar las calificaciones a la vista
        return view('calificaciones', ['calificaciones' => $calificaciones]);
    }
}
