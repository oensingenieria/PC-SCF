<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialesSeeder extends Seeder  {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10014836' ,
          'nombre_material' => 'Arena Industrial' ,
          'unidad' => 'Ton'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10015184' ,
          'nombre_material' => 'Grava 16mm (Quinta)' ,
          'unidad' => 'Ton'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10017581' ,
          'nombre_material' => 'Plastol 5000' ,
          'unidad' => 'Lts'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10029324' ,
          'nombre_material' => 'Grava 16mm (Quinta)' ,
          'unidad' => 'Ton'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10033765' ,
          'nombre_material' => 'Vicstrol' ,
          'unidad' => 'Lts'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10033766' ,
          'nombre_material' => 'Eucon DC' ,
          'unidad' => 'Lts'

      	));

    \DB::table('materiales')->insert(array(

          'Codigo_Material' => '10043776' ,
          'nombre_material' => 'Arena Lavada' ,
          'unidad' => 'Ton'

      	));   
	}
}
