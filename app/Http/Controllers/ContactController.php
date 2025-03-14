<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        // Obtener todos los mensajes de contacto
        $contacts = Contact::all();

        // Retornar la vista con los mensajes
        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Guardar los datos en la base de datos
        $contact = Contact::create($validated);

        // Enviar el correo electrónico
        Mail::send('emails.contact', compact('contact'), function($message) use ($contact) {
            $message->to('info@sergiorios.com.ar')
                    ->subject('Nuevo mensaje de contacto');
        });

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Tu mensaje ha sido enviado con éxito.');
    }
}
