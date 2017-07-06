@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info">
		<strong>Lista de Pacientes</strong>
	</div>
	@if(session()->has('msj'))
	<div class="alert alert-success" role="alert">{{session('msj')}}</div>
	@endif
	<div class="container" id="panelAdminPacientes">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Pacientes</div>
				<div class="panel-body">
					<h1 style="display: inline;">Gestionar Pacientes</h1>
					<a href="{{ route('admin_pacientes.create')}}" class="btn btn-primary btn-sm">Ingresar Nuevo Paciente</a>
					<br><br>
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">DUI Paciente</th>
									<th class="text-center">Nombre de Paciente</th>
									<th class="text-center">Fecha de Nacimiento</th>
									<th class="text-center">Procedencia</th>
									<th class="text-center">Dui Encargado</th>
									<th class="text-center">Nombre Encargado</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($pacientes as $paciente)
										<tr>

											<td class="text-center">{{ $paciente->duiPaciente }}</a> </td>
											<td class="text-center"> {{ $paciente->primerNombre }} {{ $paciente->segundoNombre }} {{ $paciente->primerApellido }} {{ $paciente->segundoApellido}}</td>
											<td class="text-center"> {{ $paciente->fechaNacimiento }} </td>
											<td class="text-center"> {{ $paciente->nombre_procedencia }} </td>
											<td class="text-center"> {{ $paciente->duiEncargado}} </td>
											<td class="text-center"> {{ $paciente->nombreEncargado}} </td>
											<td>
											<a href="{{ route('admin_pacientes.edit',$paciente->id) }}" class="btn btn-info btn-sm">Editar</a>
											<a href="{{ route('admin_pacientes.show',$paciente->id) }}" class="btn btn-success">Ver</a>
											<form method="POST" action="{{ route('admin_pacientes.destroy', $paciente->id) }} " style='display: inline;'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('está seguro que desea eliminar?')">Borrar</button></form>
											</td>
										</tr>
							@endforeach
							</tbody>
						</table>
                       {!! $pacientes->render() !!}

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</section>
@endsection
