@extends('layouts.app')

@section('content')
<section>
<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información de la Reservación de Cita</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

<!--tabla 1-->

<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		@foreach($reservaciones as $reservacion)
		<TR><th class="text-center">Nombre Completo del Paciente</TH>
		<td class="text-center">{{ $reservacion->primerNombre}} {{$reservacion->segundoNombre}} {{$reservacion->primerApellido}} {{$reservacion->segundoApellido}}</TD>
		<TR><th class="text-center">Fecha de Cita</TH>
		<td class="text-center">{{ $reservacion->fechaCita }}</TD>
		<TR><th class="text-center">Hora de Cita</TH>
		<td class="text-center">{{ $reservacion->horaCita }}</TD>
		<TR><th class="text-center">Tipo de Examen</TH>
		<td class="text-center">{{ $reservacion->nombreTipoExamen }}</TD>
		<TR><th class="text-center">Region Anatomica</TH>
		<td class="text-center">{{ $reservacion->nombreRegionAnatomica }}</TD>
		<TR><th class="text-center">Número de Recibo</TH>
		<td class="text-center">{{ $reservacion->numeroRecibo }}</TD>
		<TR><th class="text-center">Referencia</TH>
		<td class="text-center">{{ $reservacion->referencia }}</TD>
		<TR><th class="text-center">Fecha de Pago</TH>
		<td class="text-center">{{ $reservacion->fechaPago }}</TD>
		<TR><th class="text-center">Preparación</TH>
		<td class="text-center">
		@if(  $reservacion->preparacion == 1  )
		SI
		@else
		NO
		@endif
		</TD>
		<TR><th class="text-center">USG Indicación</TH>
		<td class="text-center">{{ $reservacion->usgIndicacion }}</TD>
		</thead>
		@endforeach
		</tbody>
	</table>
</section>

@endsection