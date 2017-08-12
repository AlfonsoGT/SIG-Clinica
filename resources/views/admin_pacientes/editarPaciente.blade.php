
@extends('layouts.app')

@section('content')

<section>
	<div class="alert alert-info" role="alert">
		<strong>Actualizar datos del Paciente</strong>
	</div>
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Editar Datos del Paciente</div>
				</div>
				@if (count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					@if(session()->has('msj2'))
					<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
					@endif


					<script type="text/javascript" src="{{ asset('js/validarCamposEdad.js')}}"></script>

					</div

					<div style="padding-top:30px" class="panel-body" >

						<!--Mensaje de error -->
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						<form class="form-horizontal" role="form" method="POST" action="/admin_pacientes/{{$paciente->idPaciente}}">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
							<div class="form-group {{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
								<label for="fechaNacimiento" class="col-md-4 control-label">Fecha nacimiento</label>
								<div class="col-md-6">
									<input id="fechaNacimiento" type="date" class="form-control" name="fechaNacimiento" value="{{ $paciente->fechaNacimiento }}">
									@if ($errors->has('fechaNacimiento'))
									<span class="help-block">
										<strong>{{ $errors->first('fechaNacimiento') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('duiPaciente') ? ' has-error' : '' }}">
								<label for="duiPaciente" class="col-md-4 control-label">DUI Paciente</label>
								<div class="col-md-6">
									<input id="primerNombre" type="text" class="form-control" name="duiPaciente" value="{{ $paciente->duiPaciente }}">
									@if ($errors->has('duiPaciente'))
									<span class="help-block">
										<strong>{{ $errors->first('duiPaciente') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('duiEncargado') ? ' has-error' : '' }}">
								<label for="duiEncargado" class="col-md-4 control-label">DUI de Encargado</label>
								<div class="col-md-6">
									<input id="duiEncargado" type="text" class="form-control" name="duiEncargado" value="{{ $paciente->duiEncargado }}" >
									@if ($errors->has('duiEncargado'))
									<span class="help-block">
										<strong>{{ $errors->first('duiEncargado') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('nombreEncargado') ? ' has-error' : '' }}">
								<label for="nombreEncargado" class="col-md-4 control-label">Nombre de Encargado</label>
								<div class="col-md-6">
									<input id="nombreEncargado" type="text" class="form-control" name="nombreEncargado" value="{{ $paciente->nombreEncargado }}">
									@if ($errors->has('nombreEncargado'))
									<span class="help-block">
										<strong>{{ $errors->first('nombreEncargado') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('primerNombre') ? ' has-error' : '' }}">
								<label for="primerNombre" class="col-md-4 control-label">Primer Nombre</label>
								<div class="col-md-6">
									<input id="primerNombre" type="text" class="form-control" name="primerNombre" value="{{ $paciente->primerNombre }}" >
									@if ($errors->has('primerNombre'))
									<span class="help-block">
										<strong>{{ $errors->first('primerNombre') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
								<label for="segundoNombre" class="col-md-4 control-label">Segundo Nombre</label>
								<div class="col-md-6">
									<input id="segundoNombre" type="text" class="form-control" name="segundoNombre" value="{{ $paciente->segundoNombre }}">
									@if ($errors->has('segundoNombre'))
									<span class="help-block">
										<strong>{{ $errors->first('segundoNombre') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group  {{ $errors->has('primerApellido') ? ' has-error' : '' }}">
								<label for="primerApellido" class="col-md-4 control-label">Primer Apellido</label>
								<div class="col-md-6">
									<input id="primerApellido" type="text" class="form-control" name= "primerApellido" value="{{ $paciente->primerApellido }} ">
									@if ($errors->has('primerApellido'))
									<span class="help-block">
										<strong>{{ $errors->first('primerApellido') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('segundoApellido') ? ' has-error' : '' }}">
								<label for="segundoApellido" class="col-md-4 control-label">Segundo Apellido</label>
								<div class="col-md-6">
									<input id="segundoApellido" type="text" class="form-control" name="segundoApellido" value="{{ $paciente->segundoApellido}}">
									@if ($errors->has('segundoApellido'))
									<span class="help-block">
										<strong>{{ $errors->first('segundoApellido') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('numeroCelular') ? ' has-error' : '' }}">
								<label for="numeroCelular" class="col-md-4 control-label">Numero Telefonico</label>
								<div class="col-md-6">
									<input id="numeroCelular" type="text" class="form-control" name="numeroCelular" value="{{ $paciente->numeroCelular }}">
									@if ($errors->has('numeroCelular'))
									<span class="help-block">
										<strong>{{ $errors->first('numeroCelular') }}</strong>
									</span>
									@endif
								</div>
							</div>


							<div class="form-group">
								<label for="sexo" class="col-md-4 control-label">Sexo</label>
								<div class="col-md-6">
									<!--lista desplegable -->
									<select class="form-control" name="sexo" id="sexo" onchange="ocul()">
										@foreach($sexoPaciente as $sexo)
										<option  value='{{ $sexo->idSexo}}'> {{ $sexo->nombre_sexo }} </option>
										@endforeach
										@foreach($sexoDiferente as $sexo)
										<option  value='{{ $sexo->idSexo}}'> {{ $sexo->nombre_sexo }} </option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="procedencia" class="col-md-4 control-label">Procedencia</label>
								<div class="col-md-6">
									<!--lista desplegable -->
									<select class="form-control" name="procedencia" id="procedencia" onchange="ocul()">
										@foreach($procedenciaPaciente as $procedencia)
										<option  value='{{ $procedencia->idProcedencia}}'> {{ $procedencia->nombre_procedencia }} </option>
										@endforeach
										@foreach($procedenciaDiferente as $procedencia)
										<option  value='{{ $procedencia->idProcedencia}}'> {{ $procedencia->nombre_procedencia }} </option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="departamento" class="col-md-4 control-label">Departamento</label>
								<div class="col-md-6">
									<!--lista desplegable -->
									<select class="form-control" name="departamento" id="departamento" onchange="ocul()">
										@foreach($departamentoPaciente as $departamento)
										<option  value='{{ $departamento->idDepartamento}}'> {{ $departamento->nombre_departamento }} </option>
										@endforeach
										@foreach($departamentoDiferente as $departamento)
										<option  value='{{ $departamento->idDepartamento}}'> {{ $departamento->nombre_departamento }} </option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-4 col-lg-2">
									<button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar Cambios</button>
								</div>
								<div class="col-lg-4">
									<a href="{{ url('/admin_pacientes') }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
