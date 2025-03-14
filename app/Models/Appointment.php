<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    // Atributos que pueden ser asignados masivamente
    protected $fillable = [
        'date',
        'time',
        'is_available',
        'user_id',
        'post2_id',
    ];

    public function post2s()
    {
        return $this->belongsTo(Post2::class, 'post2_id'); // Relación inversa uno a muchos con Post2
    }
}
