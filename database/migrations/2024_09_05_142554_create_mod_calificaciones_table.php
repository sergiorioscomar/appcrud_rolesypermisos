<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mod_calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->string('email');
            $table->text('review');
            $table->string('ticket');
            $table->integer('userid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mod_calificaciones');
    }
};
