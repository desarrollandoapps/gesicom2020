<?php

use Illuminate\Database\Seeder;
use App\Givininv;

class GivininvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Givininv::create([
            'vinombre' => 'Planta',
        ]);
        Givininv::create([
            'vinombre' => 'Planta temporal',
        ]);
        Givininv::create([
            'vinombre' => 'Contratista',
        ]);
    }
}
