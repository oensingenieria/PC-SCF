<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Moldes;

use App\Mixer; // Modelo Mixer
use App\Ensayo;
use App\Trabajabilidad;

use App\Http\Requests\Request_Yield; //Solicitud yield

use Auth;

class EnsayoYieldController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }


	//Flujo de yield

			public function consulta_yield(){

				return view('yield' , array('titlemesage' => 'YIELD' ));

			}

			
			  public function consulta_yield_ensayo_carga(){

			   //Comprobando si el ensayo ya se a realizado en yield
			    $carga_yield = Ensayo::where('Numero_Carga' , '=' , $_POST['carga'] )->first();

				    if(!is_null($carga_yield)){

				    //Uniendo el registro del mixer con la informacion del ensayo
				   $carga = \DB::table('yield')
			            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
			            ->where('yield.Numero_Carga' , '=' , $_POST['carga'] )
			            ->groupBy('yield.Numero_Carga')
			            ->first();

				 
				    return view('yield_historial' , array(
				    	'carga' =>$carga , 
				    	'titlemesage' => 'ENSAYO  '.$_POST['carga'] .'  REALIZADO!'
				    		
				    		 ));

				    }
			   //Fin comprobacion de existencia 


			   //Busca el ensayo realizado en trabajabilidad
			    $carga = Trabajabilidad::where('Numero_Carga' , '=' , $_POST['carga'] )->first();

			   //Si la carga fue nula , no existe el ensayo realizado en trabajabilidad
			    if(is_null($carga)){
			    	return view('yield' , 
			    	array('carga'=>$carga ,
			    		   'bad' =>1,
			    		   'titlemesage' => 'ENSAYO  '.$_POST['carga'] .'  NO ENCONTRADO'));
			    }
			    else{



			         $cemento = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
			                           ->where('Tipo_Material','=','CEM')
			                           ->first();

				    $agua = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
				                           ->where('Tipo_Material','=','AGU')
				                           ->first();  


				    $aditivo = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
				                           ->where('Tipo_Material','=','ADI')
				                           ->first();                                             
				                           

				    $agregado = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
			                           ->where('Tipo_Material','=','AGR')
			                           ->get();

			        $moldes = Moldes::all();                   

			        

			   //Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('revenimiento')
		            ->join('mixerconsumo', 'revenimiento.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->first();
			    
				    

               return view('yield' , array('carga' =>$carga , 
			    		'cemento' =>$cemento ,
			    		'agua' =>$agua ,
			    		'aditivo' =>$aditivo ,
			    		'agregado' =>$agregado ,
			    		'molde' => $moldes ,
			    		'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['carga'] 
			    		

			    		 ));
			    



			       }//End else isnull
			    
			  }//End Ensayo por numero de carga


			public function yield_post(Request_Yield $request){

				$yield = new Ensayo($request->all());
                $yield->Nombre_Cuenta = Auth::user()->username;
                $yield->save();

				
				//Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('yield')
		            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->where('yield.Numero_Carga' , '=' , $_POST['Numero_Carga'] )
		            ->groupBy('yield.Numero_Carga')
		            ->first();

			 
			    return view('yield_historial' , array(
			    	'carga' =>$carga , 
			    	'titlemesage' => 'ENSAYO  '.$_POST['Numero_Carga'] .'  REALIZADO!'
			    		
			    		 ));
			}


//Fin de flujo yield



//Busqueda historial yield


public function consulta_yield_historial_fecha(){

 //Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('yield')
		            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->where('yield.Fecha_Ensayo' , '=' , $_POST['fecha'])
		            ->groupBy('yield.Numero_Carga')
		            ->get(); 

return view('listadoYields' , array('carga' => $carga , 'titlemesage' => 'LISTA POR FECHA ' .$_POST['fecha'] . ' YIELD REALIZADOS'));

}


public function consulta_yield_historial_carga(){

	//Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('yield')
		            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->where('yield.Numero_Carga' , '=' , $_POST['carga'])
		            ->groupBy('yield.Numero_Carga')
		            ->first(); 

   
	return view('yield_historial' , array('carga' => $carga , 'titlemesage' => 'LISTA POR CARGA ' .$_POST['carga'] . ' YIELD REALIZADOS'));


}

//Busqueda por rangos de fecha
public function consulta_yield_historial_rango(){

	
				$carga = \DB::table('yield')
			        ->join('mixerconsumo', function ($join) {
			        	
			        	

			            $join->on('mixerconsumo.Numero_Carga', '=', 'yield.Numero_Carga')
			                 ->where('yield.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                 ->where('yield.Fecha_Ensayo', '<=', $_POST['Hasta'] );


			        })
			        ->groupBy('yield.Numero_Carga')
			        ->get();


				return view('listadoYields' , array(
					'carga' => $carga ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS YIELD REALIZADOS.'


					) );
					
}

//End busqueda historial

}
