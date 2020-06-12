<?php

use Illuminate\Database\Seeder;
use App\Gicarinv;

class GicarinvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gicarinv::create([
            'cinombre' => 'Instructor',
        ]);
        Gicarinv::create([
            'cinombre' => 'Asesor',
        ]);
        Gicarinv::create([
            'cinombre' => 'Profesional',
        ]);
        Gicarinv::create([
            'cinombre' => 'Técnico',
        ]);
        Gicarinv::create([
            'cinombre' => 'Contratista',
        ]);

    }
}
