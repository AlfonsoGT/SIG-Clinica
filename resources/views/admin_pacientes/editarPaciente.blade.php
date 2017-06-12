
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

				<div style="padding-top:30px" class="panel-body" >

					<!--Mensaje de error -->
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

					<form class="form-horizontal" role="form" method="POST" action="admin_pacientes/{{$paciente->id}}">
						<input type="hidden" name="_method" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label for="duiPaciente" class="col-md-4 control-label">DUI Paciente</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="duiPaciente" value="{{ $paciente->duiPaciente }}">
							</div>
						</div>
						<div class="form-group">
							<label for="primerNombre" class="col-md-4 control-label">Primer Nombre</label>
							<div class="col-md-6">
								<input id="primerNombre" type="text" class="form-control" name="primerNombre" value="{{ $paciente->primerNombre }}" >
							</div>
						</div>
						<div class="form-group">
							<label for="segundoNombre" class="col-md-4 control-label">Segundo Nombre</label>
							<div class="col-md-6">
								<input id="segundoNombre" type="text" class="form-control" name="segundoNombre" value="{{ $paciente->segundoNombre }}">
							</div>
						</div>
						<div class="form-group">
							<label for="primerApellido" class="col-md-4 control-label">Primer Apellido</label>
							<div class="col-md-6">
								<input id="primerApellido" type="text" class="form-control" name= "primerApellido" value="{{ $paciente->primerApellido }} ">
							</div>
						</div>
						<div class="form-group">
							<label for="segundoApellido" class="col-md-4 control-label">Segundo Apellido</label>
							<div class="col-md-6">
								<input id="segundoApellido" type="text" class="form-control" name="segundoApellido" value="{{ $paciente->segundoApellido}}">
							</div>
						</div>
						<div class="form-group">
							<label for="fechaNacimiento" class="col-md-4 control-label">Fecha nacimiento</label>
							<div class="col-md-6">
								<input id="fechaNacimiento" type="date" class="form-control" name="fechaNacimiento" value="{{ $paciente->fechaNacimiento }}">
							</div>
						</div>
						<div class="form-group">
							<label for="numeroCelular" class="col-md-4 control-label">Numero Telefonico</label>
							<div class="col-md-6">
								<input id="numeroCelular" type="text" class="form-control" name="numeroCelular" value="{{ $paciente->numeroCelular }}">
							</div>
						</div>

						<div class="form-group">
							<label for="duiEncargado" class="col-md-4 control-label">DUI de Encargado</label>
							<div class="col-md-6">
								<input id="duiEncargado" type="text" class="form-control" name="duiEncargado" value="{{ $paciente->duiEncargado }}" >
							</div>
						</div>
						<div class="form-group">
							<label for="nombreEncargado" class="col-md-4 control-label">Nombre de Encargado</label>
							<div class="col-md-6">
								<input id="nombreEncargado" type="text" class="form-control" name="nombreEncargado" value="{{ $paciente->nombreEncargado }}">
							</div>
						</div>
						<div class="form-group">
							<label for="sexo" class="col-md-4 control-label">Sexo</label>
							<div class="col-md-6">
							<!--lista desplegable -->
								 <select class="form-control" name="sexo" id="sexo" onchange="ocul()">
                                   @foreach($sexos as $sexo)
                                            <option  value='{{ $sexo->idSexo }}'> {{ $sexo->nombre_sexo }} </option>
                                        @endforeach
                                 
                                  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="procedencia" class="col-md-4 control-label">Procedencia</label>
							<div class="col-md-6">
							<!--lista desplegable -->
								 <select class="form-control" name="procedencia" id="procedencia" onchange="ocul()">
                                   @foreach($procedencias as $procedencia)
                                            <option  value='{{ $procedencia->idProcedencia }}'> {{ $procedencia->nombre_procedencia }} </option>
                                        @endforeach
                                    </select>
							</div>
						</div>
						
						<div class="form-group">
                                <div class="col-lg-offset-4 col-lg-2">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ url('/admin_pacientes') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
