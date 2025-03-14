<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function index()
    {
        if (Auth::user()->isadmin) {
            // Obtener reservas futuras del usuario autenticado que han sido reservadas
            $userAppointments = Appointment::where('date', '>', Carbon::now()) // Filtrar citas futuras
            ->where('is_available', false) // Filtrar solo las citas que han sido reservadas
            ->with('post2s') // Cargar la relación con 'post2s'
            ->get();
        } else {
            // Obtener reservas futuras del usuario autenticado que han sido reservadas
            $userAppointments = Appointment::where('user_id', Auth::id())
                ->where('date', '>', Carbon::now()) // Filtrar citas futuras
                ->where('is_available', false) // Filtrar solo las citas que han sido reservadas
                ->with('post2s')
                ->get();
        }

        // Obtener turnos disponibles (no reservados)
        $availableAppointments = Appointment::where('is_available', true)
        ->where('date', '>', Carbon::now())
        ->get();

        return view('user.appointments.index', compact('userAppointments', 'availableAppointments'));
    }

    public function reserve($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->is_available) {
            $appointment->update([
                'is_available' => false,
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('user.appointments.index')->with('success', 'Turno reservado con éxito.');
        }

        return redirect()->route('user.appointments.index')->with('error', 'El turno ya no está disponible.');
    }

    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)
                                ->where('user_id', Auth::id())  // Asegurarse de que el usuario sea el propietario
                                ->firstOrFail();

        // Cancelar la reserva (marcarla como disponible nuevamente)
        $appointment->update([
            'is_available' => true,
            'user_id' => null,
        ]);

        return redirect()->route('user.appointments.index')->with('success', 'Reserva cancelada con éxito.');
    }
}
