<?php

use Illuminate\Database\Seeder;
use App\Gitipart;

class GitipartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gitipart::create([
            'tanomtip' => 'Artículo',
        ]);
        Gitipart::create([
            'tanomtip' => 'Memorias de evento',
        ]);
        Gitipart::create([
            'tanomtip' => 'Artículo en revista no indexada',
        ]);
    }
}
