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
				@if(session()->has('msj'))
                     <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                    @endif
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

<!--tabla 1-->

<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		@foreach($reservaciones as $reservacion)
		
		<TR><th class="text-center">Nombre Completo del Paciente</TH>
		<td class="text-center">{{ $reservacion->primerNombre}} {{$reservacion->segundoNombre}} {{$reservacion->primerApellido}} {{$reservacion->segundoApellido}}</TD>
		<TR><th class="text-center">Fecha de Cita</TH>
		<td class="text-center">
			<?php
             $newDate = date("d-m-Y", strtotime($reservacion->fechaCita ));
             print_r($newDate ); ?> 
			</TD>
		<TR><th class="text-center">Hora de Cita</TH>
		<td class="text-center">{{ $reservacion->horaCita }}</TD>
		<TR><th class="text-center">Tipo de Examen</TH>
		<td class="text-center">{{ $reservacion->nombreTipoExamen }}</TD>
		<TR><th class="text-center">Region Anatomica</TH>
		<td class="text-center">{{ $reservacion->nombreRegionAnatomica }}</TD>
		<TR><th class="text-center">Número de Recibo</TH>
		<td class="text-center">{{ $reservacion->numeroRecibo }}</TD>
	  <TR><th class="text-center">Precio del Recibo</TH>
    <td class="text-center">{{ $reservacion->precio }}</TD>
		@if(  $reservacion->referencia == null)
		@else
		<TR><th class="text-center">Referencia</TH>
		<td class="text-center">{{ $reservacion->referencia }}</TD>
		<TR><th class="text-center">Detalle de Referencia</TH>
		<td class="text-center">{{ $reservacion->detalleReferencia }}</TD>
		@endif
		<TR><th class="text-center">Fecha de Pago</TH>
		<td class="text-center">
		<?php
        $newDate = date("d-m-Y", strtotime($reservacion->fechaPago ));
        print_r($newDate ); ?>
        </TD>
		<TR><th class="text-center">Preparación</TH>
		<td class="text-center">
		@if(  $reservacion->preparacion == 1  )
		SI
		@else
		NO
		@endif
		</TD>
		@if(  $reservacion->usgIndicacion == null  )

		@else
		<TR><th class="text-center">USG Indicación</TH>
		<td class="text-center">{{ $reservacion->usgIndicacion }}</TD>
		@endif
		</thead>
		@endforeach
		</tbody>
	</table>
	<div class="form-group">
	 @foreach($pdf as $pdf)
	<a href="{{ route('seePDF',$pdf->idExamen) }}" class="btn btn-info btn-sm">
	<span class="glyphicon glyphicon-download-alt"></span>Ver PDF</a>
	@endforeach
	 @foreach($reservaciones as $pac)
     <a href="{{ route('admin_pacientes.show',$pac->idPaciente) }}" class="btn btn-warning btn-sm">
     <span class="glyphicon glyphicon-list-alt"></span>Regresar a Perfil de Paciente</a>
     @endforeach
</section>

@endsection
