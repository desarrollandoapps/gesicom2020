<?php

use Illuminate\Database\Seeder;
use App\Gitiplib;

class GitiplibSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gitiplib::create([
            'tlnomtip' => 'Libro resultado de investigación',
        ]);
        Gitiplib::create([
            'tlnomtip' => 'Libro de divulgación',
        ]);
        Gitiplib::create([
            'tlnomtip' => 'Cartilla',
        ]);
        Gitiplib::create([
            'tlnomtip' => 'Manual',
        ]);
        Gitiplib::create([
            'tlnomtip' => 'Capítulo de libro',
        ]);
    }
}
