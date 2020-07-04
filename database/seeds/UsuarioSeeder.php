<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Soporte',
            'email' => 'soporte@godincocinando.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://godincocinando.com',
        ]);
        $user = User::create([
            'name' => 'Eric',
            'email' => 'correo@correo.com',
            'password' => Hash::make('UTCV#1t!c'),
            'url' => 'https://godincocinando.com',
        ]);
    }
}
