<?php

use Illuminate\Database\Seeder;
use App\Gitippat;

class GitippatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gitippat::create([
            'tpnomtip' => 'Patente otorgada',
        ]);
        Gitippat::create([
            'tpnomtip' => 'Patente NO otorgada',
        ]);
        Gitippat::create([
            'tpnomtip' => 'Patente en progreso',
        ]);
        Gitippat::create([
            'tpnomtip' => 'Patente solicitada',
        ]);
    }
}
