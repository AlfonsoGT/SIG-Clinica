<?php
    use App\Sexo;
    use App\Procedencia;
?>


@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info" role="alert">
		<strong>Ingresar datos del Paciente</strong>
		</div>
    <div>
    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif
</div>
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Registrar Paciente</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >

					<!--Mensaje de error -->
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

					<form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_pacientes' ) }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="duiPaciente" class="col-md-4 control-label">DUI Paciente</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="duiPaciente" value="{{ old('duiPaciente') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="primerNombre" class="col-md-4 control-label">Primer Nombre</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="primerNombre" value="{{ old('primernombre') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="segundoNombre" class="col-md-4 control-label">Segundo Nombre</label>
							<div class="col-md-6">
								<input id="segundoNombre" type="text" class="form-control" name="segundoNombre" value="{{ old('segundonombre') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="primerApellido" class="col-md-4 control-label">Primer Apellido</label>
							<div class="col-md-6">
								<input id="primerApellido" type="text" class="form-control" name= "primerApellido" value="{{ old('primerApellido') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="segundoApellido" class="col-md-4 control-label">Segundo Apellido</label>
							<div class="col-md-6">
								<input id="segundoApellido" type="text" class="form-control" name="segundoApellido" value="{{ old('segundoApellido') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="fechaNacimiento" class="col-md-4 control-label">Fecha nacimiento</label>
							<div class="col-md-6">
								<input id="fechaNacimiento" type="date" class="form-control" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="numeroCelular" class="col-md-4 control-label">Numero Telefonico</label>
							<div class="col-md-6">
								<input id="numeroCelular" type="text" class="form-control" name="numeroCelular" value="{{ old('numeroCelular') }}" autocomplete="off" required autofocus>
							</div>
						</div>

						<div class="form-group">
							<label for="duiEncargado" class="col-md-4 control-label">DUI de Encargado</label>
							<div class="col-md-6">
								<input id="duiEncargado" type="text" class="form-control" name="duiEncargado" value="{{ old('duiEncargado') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="nombreEncargado" class="col-md-4 control-label">Nombre de Encargado</label>
							<div class="col-md-6">
								<input id="nombreEncargado" type="text" class="form-control" name="nombreEncargado" value="{{ old('nombreEncargado') }}" autocomplete="off" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="sexo" class="col-md-4 control-label">Sexo</label>
							<div class="col-md-6">
								 <select class="form-control" name="sexo" id="sexo" onchange="ocul()">
								 @foreach(Sexo::all() as $sexo)
                                            <option  value='{{ $sexo->idSexo }}'> {{ $sexo->nombre_sexo }} </option>
                                        @endforeach
                                    </select>
							</div>
						</div>
						<div class="form-group">
							<label for="procedencia" class="col-md-4 control-label">Procedencia</label>
							<div class="col-md-6">
								 <select class="form-control" name="procedencia" id="procedencia" onchange="ocul()">
                                            @foreach(Procedencia::all() as $procedencia)
                                            <option  value='{{ $sexo->idSexo }}'> {{ $procedencia->nombre_procedencia }} </option>
                                        @endforeach
                                    </select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
