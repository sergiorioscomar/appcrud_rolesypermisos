<?php
namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Post2;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{

    public function index()
    {
        if (Auth::user()->isadmin) {
            // Superadmin puede ver todos los turnos
            $appointments = Appointment::with('post2s')->get();
            $pastAppointments = Appointment::where('date', '<', Carbon::now())->get();
        } else {
            $post2Ids = Post2::where('user_id', Auth::id())->pluck('id');

            $appointments = Appointment::with('post2s')
            ->whereIn('post2_id', $post2Ids) // Solo turnos de sus canchas
            ->where('date', '>', Carbon::now()) // Filtrar turnos futuros
            ->get();

            $pastAppointments = Appointment::where('user_id', Auth::id())
            ->where('date', '<', Carbon::now()) // Filtrar citas pasadas
            ->get();
        }
        return view('admin.appointments.index', compact('pastAppointments','appointments'));
    }

    public function create()
    {
        if (Auth::user()->isadmin) {
            // Superadmin puede ver todos los turnos
            $post2s = Post2::all();
        }else{
            $post2s = Post2::where('user_id', Auth::id())->get();
        }

        return view('admin.appointments.create', compact('post2s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
            'post2_id' => 'required|exists:post2s,id', // Asegúrate de que el post2_id sea válido
        ]);

        Appointment::create([
            'date' => $request->date,
            'time' => $request->time,
            'is_available' => true,
            'user_id' => Auth::id(),
            'post2_id' => $request->post2_id,
        ]);

        return redirect()->route('admin.appointments.index')->with('success', 'Turno creado con éxito.');
    }

    public function edit(Appointment $appointment)
    {
        // Verifica si el usuario tiene permiso para editar (opcional)
        if (Auth::id() !== $appointment->user_id && !Auth::user()->isadmin && Auth::id() !== $appointment->post2->user_id) {
            return redirect()->route('admin.appointments.index')->with('error', 'No tienes permiso para editar este turno.');
        }

        // Retorna la vista con la cita para editar
        return view('admin.appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Validar los datos enviados
        $validated = $request->validate([
            'post2_id' => 'required|exists:posts2,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required', // Asegúrate de validar el campo de hora también
            'is_available' => 'required|boolean',
            'user_id' => 'required',
        ]);

        // Actualizar los datos de la cita
        $appointment->update($validated);

        return redirect()->route('admin.appointments.index')->with('success', 'Turno actualizado con éxito.');
    }

    public function destroy(Appointment $appointment)
    {
        // Verificar si el usuario tiene permiso para eliminar (propietario o administrador)
        if (Auth::id() !== $appointment->user_id && !Auth::user()->isadmin && Auth::id() !== $appointment->post2->user_id) {
            return redirect()->route('admin.appointments.index')->with('error', 'No tienes permiso para eliminar este turno.');
        }

        // Eliminar el turno
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Turno eliminado con éxito.');
    }

    public function cancel($id)
    {
        // Encontrar el turno reservado
        $appointment = Appointment::findOrFail($id);

        // Cancelar la reserva (marcarla como disponible nuevamente)
        $appointment->update([
            'is_available' => true,
            'user_id' => null,
        ]);

        return redirect()->route('admin.appointments.index')->with('success', 'Reserva cancelada con éxito.');
    }
}
