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
				
				
		@if(isset($carga))
				
				<div class="col-md-12  ">
				 <table class="table table-bordered tablePag">
 				
				   <thead>
				      <tr>
				        <td>Acciones</td>
				        <td>Numero de carga</td>
				        <td>Fecha de carga</td>
				        <td>Fecha de ensayo</td>
				        <td>Hora del ensayo</td>
				        <td>Yield</td>
				     
				      </tr>
				     </thead>

				    @foreach($carga as $c) 
				     <tr>
				     	
					 	<td>

					 	<a href="/pc/yield/historial/{{$c->Numero_Carga}}"  class="btn btn-info "  >{{$c->Nombre_Cuenta}}</a>
					 	</td>	
				     	<td>{{$c->Numero_Carga}}</td>
				     	<td>{{$c->Fecha_Carga}}</td>
				     	<td>{{$c->Fecha_Ensayo}}</td>
                        <td>{{$c->Hora_Ensayo}}</td>
				     	<td>{{$c->Yield}}</td>
				     	
				     	</tr>
				     @endforeach	
				     
				     <tbody>
				     	


				     </tbody>


				</table>
				
				</div>{{--End Col-md-12 --}}


	 	@endif

	 	

	 	
				
				</div>{{--End Row--}}
			@if(isset($carga))	
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
		     @endif

				</div>{{--End Panel Body--}}
				
			</div>{{--End Panel--}}
		</div>{{--End Col-md-12 --}}
	</div>{{--End Row--}}
</div>{{--End Container--}}



{{--Modal busqueda de Ensayo--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Digite un numero de carga </h4>
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

 
</div> {{--Modal busqueda de ensayo--}}


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


