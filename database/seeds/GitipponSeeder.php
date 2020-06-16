<?php

use Illuminate\Database\Seeder;
use App\Gitippon;

class GitipponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gitippon::create([
            'tpnomtip' => 'Ponencia investigadores',
        ]);
        Gitippon::create([
            'tpnomtip' => 'Ponencia aprendices',
        ]);
    }
}
