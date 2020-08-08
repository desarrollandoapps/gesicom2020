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
        $rolLider = Role::where('nombre', 'Líder SENNOVA')->first();
        $rolInvestigador = Role::where('nombre', 'Investigador')->first();

        $admin = User::create([
            'name' => 'Jose Oviedo',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $lider = User::create([
            'name' => 'Líder SENNOVA',
            'email' => 'lider@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $investigador = User::create([
            'name' => 'Investigador',
            'email' => 'investigador@gmail.com',
            'password' => Hash::make('investigador'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin->roles()->attach($rolAdmin);
        $lider->roles()->attach($rolLider);
        $investigador->roles()->attach($rolInvestigador);
    }
}
