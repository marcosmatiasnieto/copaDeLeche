<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $fillable = [
        'Escuela',
        'direccion',
        'matricula',
        'numCUE',
        'archivo'
    ];

    // Define any relationships if necessary
    // public function students() {
    //     return $this->hasMany(Student::class);
    // }
}
