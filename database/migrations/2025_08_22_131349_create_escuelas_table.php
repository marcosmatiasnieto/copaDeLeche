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
        Schema::create('escuelas', function (Blueprint $table) {
            $table->id();
            $table->string('escuela');
            $table->string('n_cue');
            $table->string('matricula');
            $table->string('expediente');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('localidad');
            $table->string('departamento');
            $table->enum('zona', ['Zona A', 'Zona B', 'Zona C']);

            $table->string('archivo');
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escuelas');
    }
};
