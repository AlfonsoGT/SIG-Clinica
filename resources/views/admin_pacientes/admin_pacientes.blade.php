@extends('layouts.app')

@section('content')

<section>
	@can('control_pacientes')
	<div class="container" id="panelAdminPacientes">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Pacientes</div>

				<div class="panel-body">
				@if(session()->has('msj'))
				<div class="alert alert-success" role="alert">{{session('msj')}}</div>
				@endif
					<h2 style="display: inline;">Gestionar Pacientes</h2>
					<a href="{{ route('admin_pacientes.create')}}" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Paciente</a>
					<!--BUSCADOR DE PACIENTES-->
					<br>
					<div class="row" id="busquedaAvanzada">
						{!! Form::open(['route' => 'admin_pacientes.index', 'method' =>'GET', 'class'=>'form-group']) !!}
						<div class="input-group input-group-sm">
							{!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar Paciente','autocomplete'=>'off']) !!}
							<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>Buscar Paciente</button>
					</span>
						</div>

						{!! Form::close() !!}
					</div>
					<!--BUSCADOR DE PACIENTES-->
                    <br><br>
					@if(count($pacientes)>0)
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">DUI Paciente</th>
									<th class="text-center">Nombre de Paciente</th>
									<th class="text-center">Fecha de Nacimiento</th>
									<th class="text-center">Dui Encargado</th>
									<th class="text-center">Nombre Encargado</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($pacientes as $paciente)
										<tr>
											<td class="text-center">{{ $paciente->idPaciente }}</a> </td>
											<td class="text-center">{{ $paciente->duiPaciente }}</a> </td>
											<td class="text-center"> {{ $paciente->primerNombre }} {{ $paciente->segundoNombre }} {{ $paciente->primerApellido }} {{ $paciente->segundoApellido}}</td>
											<td class="text-center">
											<?php
		                                    $newDate = date("d-m-Y", strtotime($paciente->fechaNacimiento));
		                                    print_r($newDate ); ?>
											  </td>
											<td class="text-center"> {{ $paciente->duiEncargado}} </td>
											<td class="text-center"> {{ $paciente->nombreEncargado}} </td>
											<td>
											<a href="{{ route('admin_pacientes.edit',$paciente->idPaciente) }}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-pencil"></span>Editar</a>
											<a href="{{ route('admin_pacientes.show',$paciente->idPaciente) }}" target="_blank" class="btn btn-success btn-sm">
												<span class="glyphicon glyphicon-eye-open"></span>Ver</a>
											<!--<a href="{{ route('tomarIdPaciente',$paciente->idPaciente) }}" class="btn btn-info btn-sm">
	                                        <span class="glyphicon glyphicon-wrench"></span>Asignar Cita</a>
											<form method="POST" action="{{ route('admin_pacientes.destroy', $paciente->idPaciente) }} " style='display: inline;'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('está seguro que desea eliminar?')">
												<span class="glyphicon glyphicon-trash"></span>Borrar</button></form>-->
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
	@else
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="alert alert-danger">
                            <strong>No se encuentra el Paciente .</strong>
                        </div>

					</div>
				</div>
			</div>
		</div>
	@endif
	@else
	<div class="alert alert-danger">
	<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
	</div>
	@endcan
</section>


@endsection
