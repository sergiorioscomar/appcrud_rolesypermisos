<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            //$table->unsignedBigInteger('post2_id')->after('id'); // Añadir la columna post2_id
            $table->foreign('post2_id')->references('id')->on('post2s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['post2_id']);
            $table->dropColumn('post2_id');
        });
    }
};
