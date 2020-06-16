<?php

use Illuminate\Database\Seeder;
use App\Gigruinv;

class GigruinvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gigruinv::create([
            'gicodgru' => 'COL1234', 
            'giregpnd' => 'Centro sur', 
            'giregion' => 30, 
            'gicenfor' => 105, 
            'ginombre' => 'GESICOM', 
            'gimescre' => 'Agosto',
            'gianocre' => 2014
        ]);
    }
}
