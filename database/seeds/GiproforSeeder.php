<?php

use Illuminate\Database\Seeder;
use App\Giprofor;

class GiproforSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Giprofor::create([
            'pfnombre' => 'Tecnólogo en Análisis y Desarrollo de Sistemas de Información'
        ]);
        Giprofor::create([
            'pfnombre' => 'Tecnólogo en Gestión Documental'
        ]);
    }
}
