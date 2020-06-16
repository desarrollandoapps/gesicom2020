<?php

use Illuminate\Database\Seeder;
use App\Gisemill;

class GisemillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gisemill::create([ 
            'seidsemi' => 129,
            'segruinv' => 1,
            'senombre' => 'SI.GESICOM'
        ]);
    }
}
