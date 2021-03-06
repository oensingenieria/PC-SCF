@extends('app')

@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			
		<div style="margin-bottom:20px">
		<button class="btn btn-success" data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
	    <button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
        
        </div>
				

			<div class="panel panel-default">
				<div class="panel-heading text-center"><b>{{$titlemesage}}</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12" >
				
				@if(!isset($carga))
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
				@endif

				</div>
				
				@if(isset($carga))
				<div class="row">
				<div class="col-md-12  ">
				 <table class="table table-bordered tablePag">
 				
				   <thead>
				      <tr>
				        <td>Usuario</td>
				        <td>Numero de carga</td>
				        <td>Fecha de carga</td>
				        <td>Numero de boleta</td>
				        <td>Nombre del elemento</td>
				        <td>Codigo de diseño</td>
				     
				      </tr>
				     </thead>

				     
				     <tr>
				     	
					 	<td>

					 	

						<button  class="btn btn-info "  >{{$carga->Nombre_Cuenta}}</button>

					 	</td>	
				     	<td>{{$carga->Numero_Carga}}</td>
				     	<td>{{$carga->Fecha_de_Carga}}</td>
				     	<td>{{$carga->Boleta_Batida}}</td>
                        <td>{{$carga->Nombre_Proyecto}}</td>
				     	<td>{{$carga->Codigo_Diseño}}</td>
				     	
				     	</tr>
				     
				     <tbody>
				     	


				     </tbody>


				</table>
		
				    
				@endif

				</div>
				</div>
				
				</div>
@if( isset($carga) )
	@if( $carga != null )			
	<div class="row">
		<div class="col-md-12">
			
		<div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Densidad Real (kg/m3)</p> 
			
			<p class="text-center"><b>
				
			<?php 
			$yield_dato = $carga->Yield;
			$peso_molde = $carga->Peso_Molde;
			$volumen_molde = $carga->Volumen_Molde;

		    $densidad_real = ($yield_dato - $peso_molde)/$volumen_molde;

		    print(number_format((float)$densidad_real, 2, '.', ''));
			 ?>

			</b></p>

			</div>
         </div>

         <div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Volumen Real (m3)</p> 
			<p class="text-center"><b>
				
			<?php 

			$agregado_dato = $carga->Agregado;
			$cemento_dato = $carga->Cemento;
			$aditivo1_dato =$carga->Aditivo1;
			$aditivo2_dato = $carga->Aditivo2;
			$agua_dato = $carga->Agua;

			$volumen_real = ($agregado_dato+$cemento_dato+$aditivo1_dato+$aditivo2_dato+$agua_dato) / $densidad_real;

		    print(number_format((float)$volumen_real, 2, '.', ''));
			 
			 ?>	


			</b></p>

			</div>
         </div>

         <div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Rendimiento Real (%)</p> 
			<p class="text-center"><b>
				
			<?php 

			 $volumen_mixer = $carga->Volumen_de_Carga;

			 $Rendimiento_real =  100 * ($volumen_real/$volumen_mixer);

			 print(number_format((float)$Rendimiento_real, 2, '.', ''));

			 ?>



			</b></p>

			</div>
         </div>

		</div>

	</div>	

	<div class="row" style="margin-top:40px;">
		
	<div class="col-md-12">
		
	<p class="text:muted" >El sistema ha realizado los calculos con los siguientes datos.</p>	
	<div class="col-md-4">

     <label>Yield (kg) : &nbsp;&nbsp; <strong>{{$carga->Yield}}</strong></label><br>
     <label>Peso del Molde (kg) : &nbsp;&nbsp; <strong>{{$carga->Peso_Molde}}</strong></label><br>
     <label>Volumen del molde (m3) : &nbsp;&nbsp; <strong>{{$carga->Volumen_Molde}}</strong></label><br>
     <label>Volumen de carga (m3) : &nbsp;&nbsp; <strong>{{$carga->Volumen_de_Carga}}</strong></label><br>
     <label>Fecha de ensayo : &nbsp;&nbsp; <strong>{{$carga->Fecha_Ensayo}}</strong></label><br>

	</div>

	<div class="col-md-4">

     <label>Agregado (kg): &nbsp;&nbsp; <strong>{{$carga->Agregado}}</strong></label><br>
     <label>Cemento (kg) : &nbsp;&nbsp; <strong>{{$carga->Cemento}}</strong></label><br>
     <label>Aditivo 1 (lts) : &nbsp;&nbsp; <strong>{{$carga->Aditivo1}}</strong></label><br>
     <label>Aditivo 2 (lts) : &nbsp;&nbsp; <strong>{{$carga->Aditivo2}}</strong></label><br>
     <label>Agua (lts) : &nbsp;&nbsp; <strong>{{$carga->Agua}}</strong></label><br>

	</div>

	<div class="col-md-4">

     
     
	</div>
	</div>


	</div>

     
     @endif

@endif

				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
</div>


{{--Modal busqueda de Ensayo--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Buscar un Ensayo </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12" >
  		
  			<form class="form-horizontal" method="post" action="/pc/yield/ensayo/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>		
  	
  </div>

 <div class="col-md-12" >
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</form>	

 </div>

  </div>

 
</div> 
{{--Modal busqueda de ensayo--}}




{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/yield/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="form-group">
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>
  			</div>
  			
  			<div class="form-group">
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</div>
  			
  			</form>
  			
  		</div>


  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/yield/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="form-group">
  			<label>Fecha de ensayo <input required="" class="form-control fechaingresada datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
  		   </div>

  		   <div class="form-group">
           <button type="submit" class="btn btn-success" >Buscar</button>
           </div>
  			</form>
  			
  		</div>
  </div>	

  	<div class="col-md-12">
     
       
        <form class="form-horizontal" method="post" action="/pc/yield/rango">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Rango de fecha:<input  type="text" name="Desde"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >

          <input  type="text" name="Hasta"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >

        </label>
        <div class="form-group">
        <button class="btn btn-success " >Buscar</button>
       </div>
        
        </form>

     
    </div>	

  </div>

 
</div> {{--Modal busqueda de historial--}}


@endsection
