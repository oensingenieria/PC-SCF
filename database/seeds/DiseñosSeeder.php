<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DiseñosSeeder extends Seeder  {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
    \DB::table('diseños')->insert(array(

          'codigo' => '07112007' ,
          'nombre' => 'Autocompactante' ,
          'resistencia_inicial' => '280 Kg/cm2',
          'resistencia_final' => '700 Kg/cm2',
          'acronimo' => 'AUTO 700',
          'equivalencia' => '280/700'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017207' ,
          'nombre' => 'Concreto Pobre 280' ,
          'resistencia_inicial' => '100 Kg/cm2',
          'resistencia_final' => '280 Kg/cm2',
          'acronimo' => 'CAD 280',
          'equivalencia' => '100/280'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017208-Auto' ,
          'nombre' => '350-Auto' ,
          'resistencia_inicial' => '100 Kg/cm2',
          'resistencia_final' => '350 Kg/cm2',
          'acronimo' => 'AUTO 350',
          'equivalencia' => '100/350'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017209' ,
          'nombre' => 'SCC 550' ,
          'resistencia_inicial' => '175 Kg/cm2',
          'resistencia_final' => '550 Kg/cm2',
          'acronimo' => 'AUTO 550',
          'equivalencia' => '175/550'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017280' ,
          'nombre' => 'CAD PC 350' ,
          'resistencia_inicial' => '100 Kg/cm2',
          'resistencia_final' => '350 Kg/cm2',
          'acronimo' => 'CAD 350',
          'equivalencia' => '100/350'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017414' ,
          'nombre' => 'Lex 20-25 Weiler' ,
          'resistencia_inicial' => '420 Kg/cm2',
          'resistencia_final' => '',
          'acronimo' => '',
          'equivalencia' => '420'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017415' ,
          'nombre' => 'Concreto Losalex' ,
          'resistencia_inicial' => '320 Kg/cm2',
          'resistencia_final' => '420 Kg/cm2',
          'acronimo' => 'Elematic',
          'equivalencia' => '320/420'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => '10017423' ,
          'nombre' => 'CAD 700 A' ,
          'resistencia_inicial' => '280 Kg/cm2',
          'resistencia_final' => '700 Kg/cm2',
          'acronimo' => 'CAD 700',
          'equivalencia' => '280/700'

      	));

    \DB::table('diseños')->insert(array(

          'codigo' => 'Postes08' ,
          'nombre' => 'CAD420' ,
          'resistencia_inicial' => '300 Kg/cm2',
          'resistencia_final' => '420 Kg/cm2',
          'acronimo' => 'Postes',
          'equivalencia' => '300/420'

      	));   
	}
}
