@extends('layouts.app')

@section('content')

<section>
	
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información de la Cita</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
	
<!--tabla 1-->
<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>

				<th class="text-center">ID Cita</th>
				<th class="text-center">Tipo de Examen</th>
				<th class="text-center">Hora de Cita</th>
				<th class="text-center">Fecha de Cita</th>
				<th class="text-center">Cantidad de Reservaciones</th>

			</tr>
		</thead>
		<tbody>
		@foreach($citas as $cita)
		@foreach($cantidad as $can)
					<tr>
					 <td class="text-center">{{ $cita->idCita}}</td>
                     <td class="text-center">{{ $cita->nombreTipoExamen}}</td>
                     <td class="text-center"> {{ $cita->horaCita }} </td>
                      <td class="text-center"> {{ $cita->fechaCita }} </td>
                       <td class="text-center"> {{ $can->conteo }} </td>
					</tr>
		@endforeach
		@endforeach
		</tbody>
	</table>


	<div class="panel-heading"><strong>Pacientes Registrados</strong></div>
		<table class="table table-striped table-hover table-bordered">
		 <thead>
			 <tr>

				 <th class="text-center">Nombre Completo de Paciente</th>
				 <th class="text-center">Sexo</th>
				 <th class="text-center">Región Anatomica</th>
				 
			 </tr>
		 </thead>
		 <tbody>
		 @foreach($reservaciones as $reservacion)
					 <tr>
						 <td class="text-center">{{ $reservacion->primerNombre}} {{$reservacion->segundoNombre}} {{$reservacion->primerApellido}}  {{$reservacion->segundoApellido}}</td>
						 <td class="text-center"> {{ $reservacion->nombre_sexo}}</td>
						 <td class="text-center"> {{ $reservacion->nombreRegionAnatomica}}</td>
						
					 </tr>
		@endforeach
		 </tbody>
		</table>
		 {!! $reservaciones->render() !!}
</div>
	</div>
	</div>
	</div>
	</div>


	</div>
	</div>
</section>
@endsection