<?php

use Illuminate\Database\Seeder;
use App\Girolinv;

class GirolinvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Girolinv::create([
            'rinombre' => 'Líder Sennova',
        ]);
        Girolinv::create([
            'rinombre' => 'Líder de grupo de investigación',
        ]);
        Girolinv::create([
            'rinombre' => 'Líder de semillero de investigación',
        ]);
        Girolinv::create([
            'rinombre' => 'Investigador en grupo de investigación',
        ]);
        Girolinv::create([
            'rinombre' => 'Aprendiz en grupo de investigación',
        ]);
        Girolinv::create([
            'rinombre' => 'Aprendiz en semilleros',
        ]);
        Girolinv::create([
            'rinombre' => 'Instructor investigador en semillero',
        ]);
        Girolinv::create([
            'rinombre' => 'Gestor SENNOVA',
        ]);
        Girolinv::create([
            'rinombre' => 'Asesor SENNOVA DG',
        ]);
        Girolinv::create([
            'rinombre' => 'Otro',
        ]);
    }
}
