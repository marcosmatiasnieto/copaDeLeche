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
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('admin123'),// Contraseña encriptada
            'role' => 'admin',
        ]);
                        User::create([
            'name' => 'Escuela',
            'email' => 'escuela@gmail.com',
            'password' => Hash::make('escuela123'), // Contraseña encriptada
            'role' => 'escuela',
        ]);
    }
}
