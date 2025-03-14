<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post2 extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'cover_image', 'published_at', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');// Relación inversa con el usuario
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'post2_id'); // Relación uno a muchos con Appointment
    }
}
