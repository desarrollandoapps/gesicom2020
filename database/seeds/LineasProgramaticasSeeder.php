<?php

use Illuminate\Database\Seeder;
use App\Gilinpro;

class LineasProgramaticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gilinpro::create([
            'lpnomlin' => '23 - Actualización y modernización tecnológica de los centros de formación'
        ]);
        Gilinpro::create([
            'lpnomlin' => '65 - Apropiacion de ciencia y tecnología y cultura de la innovación – divulgación'
        ]);
        Gilinpro::create([
            'lpnomlin' => '82 - Fomento de la innovación y desarrollo tecnológico de las empresas'
        ]);
        Gilinpro::create([
            'lpnomlin' => '66 - Investigación aplicada y semilleros de investigación en centros'
        ]);
        Gilinpro::create([
            'lpnomlin' => '68 - Fortalecimiento de la oferta de servicios tecnológicos para las empresas'
        ]);
    }
}
