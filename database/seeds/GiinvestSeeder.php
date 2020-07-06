<?php

use Illuminate\Database\Seeder;
use App\Giinvest;

class GiinvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Giinvest::create([
            'innombre' => 'Investigador 1',
            'inregion' => 30,
            'incenfor' => 105,
            'ingruinv' => 1,
            'inrolsen' => 4,
            'intipdoc' => 'C.C.',
            'innumdoc' => '1101657457',
            'infecexp' => '2004-06-07',
            'inmunexp' => 'Ibagué',
            'infecnac' => '1986-06-02',
            'inprofes' => 'Ingeniero',
            'incorper' => 'inge11@gmail.com',
            'incorsen' => 'inge11@sena.edu.co',
            'innumcel' => '(300) 301-4455',
            'intelfij' => '(8) 2704533',
            'innumeip' => '84403',
            'inantsen' => '36',
            'ingrafor' => 'Posgrado maestría',
            'intitulo' => 'Magíster en algo',
            'inporded' => '50',
            'inarecon' => 'Ingeniería',
            'inniving' => 'B1',
            'inprofor' => 1,
            'intipvin' => 1,
            'incarinv' => 1,
            'innumgra' => 10,
            'inasimen' => 3000000,
            'innumcon' => 'NA',
            'inestcon' => 'Si',
            'inlininv' => 1,
            'insemill' => 1
        ]);

        Giinvest::create([
            'innombre' => 'Investigador 2',
            'inregion' => 30,
            'incenfor' => 105,
            'ingruinv' => 1,
            'inrolsen' => 4,
            'intipdoc' => 'C.C.',
            'innumdoc' => '1106436757',
            'infecexp' => '2005-07-08',
            'inmunexp' => 'Ibagué',
            'infecnac' => '1987-07-03',
            'inprofes' => 'Ingeniero',
            'incorper' => 'inge11@gmail.com',
            'incorsen' => 'inge11@sena.edu.co',
            'innumcel' => '(300) 301-4455',
            'intelfij' => '(8) 2704533',
            'innumeip' => '84403',
            'inantsen' => '36',
            'ingrafor' => 'Posgrado especialización',
            'intitulo' => 'Especialista en algo',
            'inporded' => '50',
            'inarecon' => 'Ingeniería',
            'inniving' => 'A2',
            'inprofor' => 1,
            'intipvin' => 1,
            'incarinv' => 1,
            'innumgra' => 10,
            'inasimen' => 3000000,
            'innumcon' => 'NA',
            'inestcon' => 'Si',
            'inlininv' => 1,
            'insemill' => 1
        ]);
        Giinvest::create([
            'innombre' => 'Investigador 3',
            'inregion' => 30,
            'incenfor' => 105,
            'ingruinv' => 1,
            'inrolsen' => 4,
            'intipdoc' => 'C.C.',
            'innumdoc' => '1102421521',
            'infecexp' => '2006-04-08',
            'inmunexp' => 'Ibagué',
            'infecnac' => '1988-04-03',
            'inprofes' => 'Ingeniero',
            'incorper' => 'inge11@gmail.com',
            'incorsen' => 'inge11@sena.edu.co',
            'innumcel' => '(300) 301-4455',
            'intelfij' => '(8) 2704533',
            'innumeip' => '84403',
            'inantsen' => '36',
            'ingrafor' => 'Posgrado especialización',
            'intitulo' => 'Especialista en algo',
            'inporded' => '50',
            'inarecon' => 'Ingeniería',
            'inniving' => 'B1',
            'inprofor' => 1,
            'intipvin' => 1,
            'incarinv' => 1,
            'innumgra' => 10,
            'inasimen' => 3000000,
            'innumcon' => 'NA',
            'inestcon' => 'Si',
            'inlininv' => 1,
            'insemill' => 1
        ]);
    }
}
