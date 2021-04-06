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
            'senombre' => 'SI.GESICOM',
            'seenldoc' => '',
            'segruinv' => 1
        ]);
    }
}
