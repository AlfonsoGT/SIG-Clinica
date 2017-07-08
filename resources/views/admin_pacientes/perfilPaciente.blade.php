
@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info" role="alert">
		<strong>Perfil del Paciente</strong>
   </div>
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
<a href="{{ route('admin_pacientes.edit',$paciente->id) }}" class="btn btn-info btn-sm">Editar información</a>
<!--tabla 3-->

<div class="panel-heading"><strong>Examenes Almacenados del paciente</strong></div>
		<table class="table table-striped table-hover table-bordered">
		 <thead>
			 <tr>

				 <th class="text-center">Examen</th>
				 <th class="text-center">Examen</th>
				 <th class="text-center">Examen</th>
				 <th class="text-center">Examen</th>
				 <th class="text-center">Examen</th>
				 <th class="text-center">Examen</th>
			 </tr>
		 </thead>
		 <tbody>

					 <tr>

						 <td class="text-center"><a href=""> </a> </td>
						 <td class="text-center">  </td>
						 <td class="text-center"> </td>
						 <td class="text-center"> </td>
						 <td class="text-center">  </td>
						 <td class="text-center">  </td>
					 </tr>
		 </tbody>
		</table>



	</div>
	</div>
</section>
@endsection
