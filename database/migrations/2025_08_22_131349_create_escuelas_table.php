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
            $table->integer('n_cue');
            $table->integer('matricula');
            $table->string('telefono') ->nullable();
            $table->string('direccion');
            $table->string('localidad')->nullable(); ;
            $table->string('provincia')->nullable(); ;

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
