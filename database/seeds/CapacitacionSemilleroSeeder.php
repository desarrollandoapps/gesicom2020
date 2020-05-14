<?php

use Illuminate\Database\Seeder;
use App\Gicapsem;

class CapacitacionSemilleroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gicapsem::create([
            'csnombre' => 'Curso ACAC - Formulación de proyectos - Marco lógico'
        ]);
        Gicapsem::create([
            'csnombre' => 'Curso ACAC - Escritura científica '
        ]);
        Gicapsem::create([
            'csnombre' => 'Particpación en actividades de MALOKA'
        ]);
        Gicapsem::create([
            'csnombre' => 'Participación en actividades de UPV'
        ]);
        Gicapsem::create([
            'csnombre' => 'Participación en actividades con OCyT'
        ]);
    }
}
