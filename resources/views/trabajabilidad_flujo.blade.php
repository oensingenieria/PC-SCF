@extends('app')

@section('content')

<?php

 function existe($id){ 
    
    $exist = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $exist =  $data['id'] ;
   
   }

    if($exist == null)
      {
       
       return false;

      }
      else
        return true ;

   }

function getname($id){ 
    
    $exist = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $exist =  $data['Nombre_Cuenta'] ;
   
   }

   return $exist;

   }


function hora($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Hora_Ensayo'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }

   function trabajo($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Revenimiento'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }

   function temperatura($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Temperatura'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }

   function codigo($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Codigo_Tarro'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }


    function observacion($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Observaciones'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }


   function connect_Mysql($sql){

     //realizo la conexion a la base de datos
    $db = new mysqli('localhost', 'pccompany', 'pccompany2015', 'iceberg');
    if($db->connect_errno > 0){
    die('Imposible conectar [' . $db->connect_error . ']');
    }


    //si falla la consulta
    if(!$resultado = $db->query($sql)){
    die('Ocurrio un error cargando el registro [' . $db->error . ']');
    }

    return $resultado;

   }





  ?>






<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	
	
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center" ><b>TRABAJABILIDAD Y FLUJO</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($mixer))	
				@if(!is_null($mixer) & count($mixer) > 0)	
				<table class="table table-bordered ">
 				
				   <thead class="bg-success " >
				      <tr>
				        <td>Acción</td>
				        <td>Numero carga</td>
				        <td>Nombre de proyecto</td>
				        <td>Nombre del elemento</td>
				        <td>Hora de ensayo</td>
				        <td>Trabajabilidad y flujo (cm) </td>
				        <td>Temperatura (°C)</td>
				        <td>Volumen (m3)</td>
				        <td>Codigo Tarro</td>
				        <td>Observación</td>

				      </tr>
				     </thead>	

             <div> 
				
				     <tbody >
				     
              
				     	@foreach($mixer as $mix)
				     	<tr >
				     	
				     	@if(existe($mix->id) )
					 	<td><button class="btn btn-info" ><span class="glyphicon glyphicon-ok"></span> {{getname($mix->id)}}</button></td>

					 	@else

					 	<td><button data-carga="{{$mix->Numero_Carga}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  data-volumen="{{$mix->Volumen_de_Carga}}"  data-idmixer="{{$mix->id}}" class="btn btn-success llenardatos" data-remodal-target="llenardatos_modal" >Datos</button></td>

					 	@endif


				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Nombre_Elemento}}</td>
				     	<td>{{hora($mix->id)}}</td>
				     	<td>{{trabajo($mix->id)}}</td>
				     	<td>{{temperatura($mix->id)}}</td>
				     	<td>{{$mix->Volumen_de_Carga}}</td>
				     	<td>{{codigo($mix->id)}}</td>
				     	<td>{{observacion($mix->id)}}</td>
			
				     	

				     	</tr>

				     	@endforeach
              
				     	

				     </tbody>

				</table>

				@else
				<p class="bg-danger" style="height:40px;padding-top:10px">No se han encontrado datos. Favor realize una nueva busqueda</p>
				@endif
        @else

        <p class="bg-info text-center" style="height:40px;padding-top:10px">Por favor realize una busqueda</p>
			@endif	

				</div>

				</div>
				

				</div>
			</div>
		</div>
	</div>
</div>{{--End Container--}}

{{--Modal busqueda de ensayo--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Busqueda de ensayo</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/trabajabilidad_flujo/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label><button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


  		<div class="col-md-6">
  			
  				<form class="form-inline"  method="post" action="/pc/trabajabilidad_flujo/codigo">
  				<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Codigo de diseño <input required="" class="form-control" type="text" name="Parametro" placeholder="Codigo" /></label><button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>

  			
  			</form>

  		</div>

  </div>

  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/trabajabilidad_flujo/boleta">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de boleta <input required class="form-control" type="text" name="Parametro" placeholder="Numero de boleta" /></label><button class="btn btn-success " >Buscar</button>
  			</form>

  		</div>


  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/trabajabilidad_flujo/fecha">
  			 <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de Carga&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label><button class="btn btn-success " >Buscar</button>
  			</form>

  		</div>
     </div>
  </div> 
</div> {{--Modal busqueda de ensayo--}}




{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Busqueda de historial</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/trabajabilidad_flujo/carga/historial">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label><button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/trabajabilidad_flujo/fecha/historial">
  			 <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de Carga&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label><button class="btn btn-success " >Buscar</button>
  			</form>

  		</div>
     </div>

      <div class="col-md-12">
      <div class="col-md-5">
        <form class="form-inline" >
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Mes de carga<input required  class="form-control" type="text" name="Parametro" placeholder="Digite un mes" /></label><button type="button" class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-5 pull-right">
        <form class="form-inline" >
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Rango de fecha:<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >

          <input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >

        </label><button type="button" class="btn btn-success " >Buscar</button>
        </form>

      </div>
     </div> 

  </div> 
</div> {{--Modal busqueda historial--}}






{{--Modal Llenado de datos--}}

<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Llenar Datos</h3>
  <br>
  
  <div class="row">
  		<div class="col-md-9">
  		
		  		<form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">ID:</label>
		    <div class="col-sm-6">
		      <input value="" name="idmixer"  id="id_mixer"  readonly="" type="number" class="form-control"  >
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Numero de carga:</label>
		    <div class="col-sm-6">
		      <input value="" name="Numero_Carga"  id="Numero_Carga" readonly="" type="text" class="form-control"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Proyecto</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="Nombre_Proyecto" id="Nombre_Proyecto" readonly="" value="" placeholder="Elemento">
		    </div>
		   </div>
		 

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Elemento:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="Nombre_Elemento" id="Nombre_Elemento" readonly="" value=""  placeholder="Elemento">
		    </div>
		   </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Fecha de ensayo:</label>
		    <div class="col-sm-6">
		      <input name="Fecha_Ensayo" style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Fecha">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Hora de ensayo:</label>
		    <div class="col-sm-6">
		      <input type="text" required="" name="Hora_Ensayo" class="form-control timepicker" id="timepicker" placeholder="Hora">
		    </div>
		  </div>
		  
		 
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Revenimiento (cm):</label>
		    <div class="col-sm-6">
		      <input type="number" step="0.01" name="Revenimiento" class="form-control" id="inputEmail3" placeholder="CM">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Temperatura (°C):</label>
		    <div class="col-sm-6">
		      <input type="number" step="0.01" required="" name="Temperatura" class="form-control" id="inputEmail3" placeholder="Temperatura">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Volumen (m3): </label>
		    <div class="col-sm-6">
		      <input type="number" step="0.01" required=""  readonly="" name="Volumen" class="form-control" id="Volumen" >
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Zona: </label>
		    <div class="col-sm-6">
		      
		      <select class="form-control" name="Zona">
				  <option value="Zona_1">Zona 1 - 2</option>
				  <option value="Zona_2">Zona 3 - 4</option>
				  <option value="Zona_3">Zona 5 - 6</option>
				  <option value="Zona_4">Zona 7 - 8</option>
				  <option value="Zona_5">Zona Patio</option>
				  
				</select>

		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Encargado: </label>
		    <div class="col-sm-6">
		      <input type="text" required=""  name="Encargado" class="form-control" id="inputEmail3" placeholder="Nombre">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Cod. Tarro: </label>
		    <div class="col-sm-6">
		      <input name="Codigo_Tarro" required=""  type="text" class="form-control" id="inputEmail3" placeholder="Codigo">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Observaciones: </label>
		    <div class="col-sm-6">
		      
		      <textarea  overflow: auto; wrap="off" rows="2" placeholder="Observacion" style="white-space: normal ; width:100%" class="form-control" name="Observaciones">
		      	

		      </textarea>
		    </div>
		  </div>

		  <input type="hidden" id="id_mixer" name="id_mixer">
		  	
		  <div class="form-group">
		    <div class="col-sm-offset-6 col-sm-6">
		     
		      <button type="submit" class="btn btn-success">Grabar</button>
		       
		    </div>
		  </div>
		</form>

       </div>

</div>
</div>
{{--Modal Llenado de datos--}}



@endsection

@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
       var carga = $(this).data('carga');
       var proyecto = $(this).data('proyecto');
       var elemento = $(this).data('elemento');
       var volumen = $(this).data('volumen');
       var id_mixer = $(this).data('idmixer');

       

      

       $('#Numero_Carga').val(carga);
       $('#Nombre_Proyecto').val(proyecto);
       $('#Nombre_Elemento').val(elemento);
       $('#Volumen').val(volumen);
       $('#id_mixer').val(id_mixer);


      });


    });


</script>



@endsection