<?php

use Illuminate\Database\Seeder;
use App\Giproinv;

class GiproinvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Giproinv::create([ 
            'piregion' => 30,
            'picenfor' => 105,
            'pigruinv' => 1,
            'pianofor' => 2014,
            'pinompro' => 'Proyecto A',
            'pinumrad' => 'SGPS-2014-001',
            'pivalpre' => 1550000,
            'pianoeje' => 2015,
            'pilinpro' => 4,
            'pienldri' => 'https://drive.google.com/drive/folders/1FMnd5WW8yGmYCShds31qlbJnVWSwowEI?usp=sharing'
        ]);
        Giproinv::create([ 
            'piregion' => 30,
            'picenfor' => 105,
            'pigruinv' => 1,
            'pianofor' => 2015,
            'pinompro' => 'Proyecto B',
            'pinumrad' => 'SGPS-2015-001',
            'pivalpre' => 1020000,
            'pianoeje' => 2016,
            'pilinpro' => 4,
            'pienldri' => 'https://drive.google.com/drive/folders/1FMnd5WW8yGmYCShds31qlbJnVWSwowEI?usp=sharing'
        ]);
        Giproinv::create([ 
            'piregion' => 30,
            'picenfor' => 105,
            'pigruinv' => 1,
            'pianofor' => 2016,
            'pinompro' => 'Proyecto C',
            'pinumrad' => 'SGPS-2016-001',
            'pivalpre' => 8150000,
            'pianoeje' => 2017,
            'pilinpro' => 4,
            'pienldri' => 'https://drive.google.com/drive/folders/1FMnd5WW8yGmYCShds31qlbJnVWSwowEI?usp=sharing'
        ]);
    }
}
