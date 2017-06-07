@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info">
		<strong>Ingresar datos del Paciente</strong>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ route('crearPaciente') }}">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="primerNombre" class="col-md-4 control-label">Primer Nombre</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="primerNombre" value="{{ old('primernombre') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="segundoNombre" class="col-md-4 control-label">Segundo Nombre</label>
							<div class="col-md-6">
								<input id="segundoNombre" type="text" class="form-control" name="segundoNombre" value="{{ old('segundonombre') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="primerApellido" class="col-md-4 control-label">Primer Apellido</label>
							<div class="col-md-6">
								<input id="primerapellido" type="text" class="form-control" name="primerapellido" value="{{ old('primerApellido') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="segundoApellido" class="col-md-4 control-label">Segundo Apellido</label>
							<div class="col-md-6">
								<input id="segundoApellido" type="text" class="form-control" name="segundoApellido" value="{{ old('segundoApellido') }}" required autofocus>
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
								<input id="numeroCelular" type="text" class="form-control" name="numeroCelular" value="{{ old('numeroCelular') }}" required autofocus>
							</div>
						</div>
						<label for="numeroTelefonico" class="col-md-4 control-label">Numero Telefonico</label>
						<div class="col-md-6">
							<input id="numeroTelefonico" type="text" class="form-control" name="numeroTelefonico" value="{{ old('numeroTelefonico') }}" required autofocus>
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
