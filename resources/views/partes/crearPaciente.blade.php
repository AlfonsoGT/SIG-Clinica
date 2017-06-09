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
							<label for="duiPaciente" class="col-md-4 control-label">DUI Paciente</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="duiPaciente" value="{{ old('duiPaciente') }}" required autofocus>
							</div>
						</div>
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

						<div class="form-group">
							<label for="duiEncargador" class="col-md-4 control-label">DUI de Encargado</label>
							<div class="col-md-6">
								<input id="duiEncargado" type="text" class="form-control" name="duiEncargado" value="{{ old('duiEncargado') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="nombreEncargado" class="col-md-4 control-label">Nombre deEncargado</label>
							<div class="col-md-6">
								<input id="duiEncargado" type="text" class="form-control" name="nombreEncargado" value="{{ old('nombreEncargado') }}" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="sexo" class="col-md-4 control-label">Sexo</label>
							<div class="col-md-6">
								 <select class="form-control" name="sexo" id="sexo" onchange="ocul()">
                                            <option  value=''>Femenino</option>
                                            <option  value=''>Masculino</option>
                                    </select>
							</div>
						</div>
						<div class="form-group">
							<label for="procedencia" class="col-md-4 control-label">Procedencia</label>
							<div class="col-md-6">
								 <select class="form-control" name="procedencia" id="procedencia" onchange="ocul()">
                                            <option  value=''>Facultad de Medicina</option>
                                            <option  value=''>Facultad de Odontologia</option>
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
