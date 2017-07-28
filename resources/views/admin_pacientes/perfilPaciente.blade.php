
@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info" role="alert">
		<strong>Perfil del Paciente</strong>
   </div>
   @if(session()->has('msj'))
  <div class="alert alert-success" role="alert">{{session('msj')}}</div>
	@endif
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información del paciente</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

<!--tabla 1-->
<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>

				<th class="text-center">DUI Paciente</th>
				<th class="text-center">Nombres</th>
				<th class="text-center">Apellidos</th>

				<th class="text-center">Fecha de Nacimiento</th>

			</tr>
		</thead>
		<tbody>
		@foreach($pacientes as $paciente)
					<tr>

						<td class="text-center">{{ $paciente->duiPaciente }}</td>
						<td class="text-center"> {{ $paciente->primerNombre }} {{ $paciente->segundoNombre }} </td>
						<td class="text-center"> {{ $paciente->primerApellido }} {{ $paciente->segundoApellido}}</td>
						<td class="text-center"> {{ $paciente->fechaNacimiento }} </td>
					</tr>
		@endforeach
		</tbody>
	</table>

<!--tabla 2-->
	<div class="table-responsive">
		 <table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">Numero Celular</th>
					<th class="text-center">DUI Encargado</th>
					<th class="text-center">Nombre Encargado</th>
					<th class="text-center">Sexo</th>
					<th class="text-center">Procedencia</th>

				</tr>
			</thead>
			<tbody>
			@foreach($pacientes as $paciente)
						<tr>
							<td class="text-center"> {{ $paciente->numeroCelular }} </td>
							<td class="text-center"> {{ $paciente->duiEncargado}}</td>
							<td class="text-center"> {{ $paciente->nombreEncargado}} </td>
							<td class="text-center"> {{ $paciente->nombre_sexo }} </td>
							<td class="text-center"> {{ $paciente->nombre_procedencia }} </td>

						</tr>
			@endforeach
			</tbody>
		</table>
<a href="{{ route('admin_pacientes.edit',$paciente->idPaciente) }}" class="btn btn-info btn-sm">
	<span class="glyphicon glyphicon-pencil"></span>Editar información</a>
<a href="{{ route('tomarIdPaciente',$paciente->idPaciente) }}" class="btn btn-info btn-sm" id="asignar">
	<span class="glyphicon glyphicon-wrench"></span>Asignar Cita</a>
<a href="{{ url('/admin_pacientes') }}" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-list-alt"></span>Regresar a Expedientes</a>
<!--tabla 3-->
<div class="panel-heading"><strong>Examenes Almacenados del paciente</strong></div>
		<table class="table table-striped table-hover table-bordered">
		 <thead>
			 <tr>

				 <th class="text-center">Fecha de Cita</th>
				 <th class="text-center">Hora de Cita</th>
				 <th class="text-center">Tipo de Examen</th>
				 <th class="text-center">Región Anatomica</th>
				 <th class="text-center">Acciones</th>
			 </tr>
		 </thead>
		 <tbody>
		 @foreach($reservaciones as $reservacion)
					 <tr>

						 <td class="text-center"> {{ $reservacion->fechaCita }} </td>
						 <td class="text-center"> {{ $reservacion->horaCita }} </td>
						 <td class="text-center"> {{ $reservacion->nombreTipoExamen }}</td>
						 <td class="text-center"> {{ $reservacion->nombreRegionAnatomica}} </td>
						 <td>
						 @if( $reservacion->habilitado == 1)
						<a href="/tomarIdPacienteUpdate/{{$paciente->idPaciente}},{{$reservacion->idReservacion}}" class="btn btn-info btn-sm">
						<span class="glyphicon glyphicon-pencil"></span>Editar</a>
						 <a href="{{ route('admin_reservaciones.show',$reservacion->idReservacion) }}" class="btn btn-success btn-sm">
						<span class="glyphicon glyphicon-eye-open"></span>Ver</a>
						<form method="GET" action="/tomarIdPacienteEliminar/{{$paciente->idPaciente}},{{$reservacion->idReservacion}} " style='display: inline;'>
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('está seguro que desea eliminar?')">
						<span class="glyphicon glyphicon-trash"></span>Borrar</button></form>
						@else
						 <a href="{{ route('admin_reservaciones.show',$reservacion->idReservacion) }}" class="btn btn-success btn-sm">
						<span class="glyphicon glyphicon-eye-open"></span>Ver</a>
						@endif
						</td>
					 </tr>
		@endforeach
		 </tbody>
		</table>
		 {!! $reservaciones->render() !!}

                       <div class="form-group">
                                <div class="col-lg-offset-4 col-lg-2">
                                     
                                </div>
                                
                            </div>

	</div>
	</div>
</section>

@endsection
