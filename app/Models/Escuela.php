<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $fillable = [
        // Definimos los campos que se pueden asignar masivamente
        'escuela',
        'n_cue',
        'matricula',
        'expediente',
        'telefono',
        'direccion',
        'email',
        'localidad',
        'departamento',
        'zona',
        'archivo',
        'estado'
    ];

    // Define any relationships if necessary
    // public function students() {
    //     return $this->hasMany(Student::class);
    // }
}
