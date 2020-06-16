<?php

use Illuminate\Database\Seeder;
use App\Gilininv;

class GilininvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gilininv::create([
            'lideslin' => 'Gestión informática, virtualización e innovación tecnológica - GIVIT',
            'licodgru' => 1
        ]);
        Gilininv::create([
            'lideslin' => 'Gestión logística, empresarial y de Mercados - LEM',
            'licodgru' => 1
        ]);
        Gilininv::create([
            'lideslin' => 'Gestión administrativa, contable y Asistencia financiera - ACAF',
            'licodgru' => 1
        ]);
        Gilininv::create([
            'lideslin' => 'Gestión Turística, gastronómica y hotelera - TUGA',
            'licodgru' => 1
        ]);
        Gilininv::create([
            'lideslin' => 'Servicios en salud y desarrollo deportivo - DEPOS',
            'licodgru' => 1
        ]);
        Gilininv::create([
            'lideslin' => 'Investigación para la formación profesional integral - IFPI',
            'licodgru' => 1
        ]);
    }
}
