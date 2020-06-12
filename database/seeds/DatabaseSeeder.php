<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersSeeder::class]);
        $this->call([RegionalesSeeder::class]);
        $this->call([CentrosFormacionSeeder::class]);
        $this->call([LineasProgramaticasSeeder::class]);
        $this->call([CapacitacionSemilleroSeeder::class]);
        $this->call([GicarinvSeeder::class]);
        $this->call([GirolinvSeeder::class]);
        $this->call([GivininvSeeder::class]);
        $this->call([GigradosSeeder::class]);
    }
}
