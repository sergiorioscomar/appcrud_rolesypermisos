<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    // Definir la tabla si el nombre no sigue la convención pluralizada
    protected $table = 'mod_calificaciones';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'rating', 'email', 'review', 'userid',
    ];
}
?>
