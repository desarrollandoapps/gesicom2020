<?php

use Illuminate\Database\Seeder;
use App\Giregion;

class RegionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Giregion::create(['renombre' => 'Amazonas']);
        Giregion::create(['renombre' => 'Antioquia']);
        Giregion::create(['renombre' => 'Arauca']);
        Giregion::create(['renombre' => 'Atlántico']);
        Giregion::create(['renombre' => 'Bogotá']);
        Giregion::create(['renombre' => 'Bolívar']);
        Giregion::create(['renombre' => 'Boyacá']);
        Giregion::create(['renombre' => 'Caldas']);
        Giregion::create(['renombre' => 'Caquetá']);
        Giregion::create(['renombre' => 'Casanare']);
        Giregion::create(['renombre' => 'Cauca']);
        Giregion::create(['renombre' => 'Cesar']);
        Giregion::create(['renombre' => 'Chocó']);
        Giregion::create(['renombre' => 'Córdoba']);
        Giregion::create(['renombre' => 'Cundinamarca']);
        Giregion::create(['renombre' => 'Guainía']);
        Giregion::create(['renombre' => 'Guaviare']);
        Giregion::create(['renombre' => 'Huila']);
        Giregion::create(['renombre' => 'Guajira']);
        Giregion::create(['renombre' => 'Magdalena']);
        Giregion::create(['renombre' => 'Meta']);
        Giregion::create(['renombre' => 'Nariño']);
        Giregion::create(['renombre' => 'Norte de Santander']);
        Giregion::create(['renombre' => 'Putumayo']);
        Giregion::create(['renombre' => 'Quindío']);
        Giregion::create(['renombre' => 'Risaralda']);
        Giregion::create(['renombre' => 'San Andrés']);
        Giregion::create(['renombre' => 'Santander']);
        Giregion::create(['renombre' => 'Sucre']);
        Giregion::create(['renombre' => 'Tolima']);
        Giregion::create(['renombre' => 'Valle']);
        Giregion::create(['renombre' => 'Vaupés']);
        Giregion::create(['renombre' => 'Vichada']);
    }
}
