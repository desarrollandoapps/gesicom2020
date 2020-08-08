<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Role::where('nombre', 'Administrador')->first();
        $rolUsuario = Role::where('nombre', 'Usuario')->first();

        $admin = User::create([
            'name' => 'Jose Oviedo',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $usuario = User::create([
            'name' => 'Usuario General',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin->roles()->attach($rolAdmin);
        $usuario->roles()->attach($rolUsuario);
    }
}
