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
        $this->call([RolesTableSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([RegionalesSeeder::class]);
        $this->call([CentrosFormacionSeeder::class]);
        $this->call([LineasProgramaticasSeeder::class]);
        $this->call([CapacitacionSemilleroSeeder::class]);
        $this->call([GigruinvSeeder::class]);
        $this->call([GicarinvSeeder::class]);
        $this->call([GirolinvSeeder::class]);
        $this->call([GivininvSeeder::class]);
        $this->call([GigradosSeeder::class]);
        $this->call([GiproforSeeder::class]);
        $this->call([GisemillSeeder::class]);
        $this->call([GitipponSeeder::class]);
        $this->call([GilininvSeeder::class]);
        $this->call([GitipartSeeder::class]);
        $this->call([GitiplibSeeder::class]);
        $this->call([GitippatSeeder::class]);
        $this->call([GiproinvSeeder::class]);
        $this->call([GiinvestSeeder::class]);
    }
}
