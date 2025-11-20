<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Marcos Nieto',
            'email' => 'marcosnieto2293@gmail.com',
            'password' => Hash::make('12345678'), // Contraseña encriptada
            
        ]);
                User::create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('admin123'), // Contraseña encriptada
        ]);
                        User::create([
            'name' => 'Escuela',
            'email' => 'escuela@gmail.com',
            'password' => Hash::make('escuela123'), // Contraseña encriptada
        ]);
    }
}
