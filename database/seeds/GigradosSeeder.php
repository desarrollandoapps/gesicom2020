<?php

use Illuminate\Database\Seeder;
use App\Gigrados;

class GigradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ( $i = 1; $i <= 9 ; $i++ ) {
            Gigrados::create([
                'grnombre' => '0' . $i,
            ]);
        }
        for ( $i = 10; $i <= 20 ; $i++ ) {
            Gigrados::create([
                'grnombre' => $i,
            ]);
        }
        Gigrados::create([
            'grnombre' => 'No aplica',
        ]);
    }
}
