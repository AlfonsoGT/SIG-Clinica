
@extends('layouts.app')

@section('content')

<section>
@can('control_pacientes')
<div class="container">
	<div id="loginbox" style="margin-top:30px">
		<div class="panel panel-primary" >
			<div class="panel-heading">
				<div class="panel-title">Información del paciente</div>
			</div>
			<div style="padding-top:30px" class="panel-body" >
				@if(session()->has('msj3'))
				<div class="alert alert-success" role="alert">{{session('msj3')}}</div>
				@endif

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

				<!--tabla 1-->
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">DUI Paciente</th>
								<th class="text-center">Nombres</th>
								<th class="text-center">Apellidos</th>

								<th class="text-center">Fecha de Nacimiento</th>

							</tr>
						</thead>
						<tbody>
							@foreach($pacientes as $paciente)
							<tr>
								<td class="text-center">{{ $paciente->idPaciente }}</a> </td>
								<td class="text-center">{{ $paciente->duiPaciente }}</td>
								<td class="text-center"> {{ $paciente->primerNombre }} {{ $paciente->segundoNombre }} </td>
								<td class="text-center"> {{ $paciente->primerApellido }} {{ $paciente->segundoApellido}}</td>
								<td class="text-center">
								<?php
                                  $newDate = date("d-m-Y", strtotime($paciente->fechaNacimiento));
                                  print_r($newDate ); ?>
								  </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

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
								<th class="text-center">Originario de</th>

							</tr>
						</thead>
						<tbody>
							@foreach($pacientes as $paciente)
							<tr>
								<td class="text-center"> {{ $paciente->numeroCelular }} </td>
								<td class="text-center"> {{ $paciente->duiEncargado}}</td>
								<td class="text-center"> {{ $paciente->nombreEncargado}} </td>
								<td class="text-center"> {{ $paciente->nombreSexo }} </td>
								<td class="text-center"> {{ $paciente->nombreProcedencia }} </td>
								<td class="text-center"> {{ $paciente->nombreDepartamento}} </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@if($paciente->activo==1)
				<a href="{{ route('admin_pacientes.edit',$paciente->idPaciente) }}" class="btn btn-info btn-sm">
					<span class="glyphicon glyphicon-pencil"></span>Editar información</a>

					@can('control_citas')
					<a href="{{ route('tomarIdPaciente',$paciente->idPaciente) }}" class="btn btn-info btn-sm" id="asignar">
						<span class="glyphicon glyphicon-wrench"></span>Asignar Cita</a>
						@endcan

						@can('modificar_perfil_paciente')
						<a href="{{ route('inactivar',$paciente->idPaciente) }}" class="btn btn-info btn-sm" id="pac_inhabilitado">
								<span class="glyphicon glyphicon-remove"></span>inhabilitar perfil </a>
								@endcan

								@else

								@can('modificar_perfil_paciente')
								<a href="{{ route('activar',$paciente->idPaciente) }}" class="btn btn-info btn-sm" id="pac_habilitado">
									<span class="glyphicon glyphicon-link"></span>habilitar perfil </a>
									@endcan

									@endif
										<input name="button" type="button" class="btn btn-warning btn-sm" onclick="window.close();" value="Salir de este Expediente" />

									<!--tabla 3-->
									<div class="panel-heading"><strong>Examenes Almacenados del paciente</strong></div>
									@if(session()->has('msj'))
									<div class="alert alert-success" role="alert">{{session('msj')}}</div>
									@endif
									@if(session()->has('msj2'))
									<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
									@endif
									@if(count($reservaciones)>0)
									<div class="table-responsive">
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

														@can('control_citas')
														@if($reservacion->realizado==0)
														<a href="/tomarIdPacienteUpdate/{{$paciente->idPaciente}},{{$reservacion->idReservacion}}" class="btn btn-info btn-sm">
															<span class="glyphicon glyphicon-pencil"></span>Editar</a>
															@endif
															@endcan


															<a href="{{ route('admin_reservaciones.show',$reservacion->idReservacion) }}" class="btn btn-success btn-sm">
																<span class="glyphicon glyphicon-eye-open"></span>Ver</a>

																@can('control_citas')
																@if($reservacion->realizado==0)
																<form method="GET" action="/vista_borrar/{{$paciente->idPaciente}},{{$reservacion->idReservacion}} " style='display: inline;'>
																	<button type="submit" class="btn btn-danger btn-sm">
																		<span class="glyphicon glyphicon-trash"></span>Borrar</button></form>
																		@endif
																		@endcan


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
													@else
													<div class="row">
														<div class="col-lg-12">
															<div class="panel panel-default">
																<div class="panel-body">
																	<div class="alert alert-warning">
																		<strong>No hay Examenes Registrados</strong>
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
