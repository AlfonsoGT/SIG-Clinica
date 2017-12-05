@extends('layouts.app')

@section('content')
<section>
	@can('generar_lectura')
	<div class="alert alert-info" role="alert">
		<strong>Ingresar datos de Lectura </strong>
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
			@if(session()->has('msj2'))
			<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
			@endif


		</div>
		<div class="container">
			<div id="loginbox" style="margin-top:30px">
				<div class="panel panel-primary" >
					<div class="panel-heading">
						<div class="panel-title">Registrar Lectura</div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<!--Mensaje de error -->
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_lecturas' ) }}">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

						@foreach($examenesNoLectura as $examen)
                         <input type="hidden" name="idExamen" value="{{ $examen->idExamen }}">
						<div class="form-group {{ $errors->has('nombrePaciente') ? ' has-error' : '' }}">
                            <label for="nombrePaciente" class="col-md-4 control-label">Nombre Completo del Paciente</label>
                            <div class="col-md-6">
                                <input id="nombrePaciente" type="text" class="form-control" name="nombrePaciente" value="{{ $examen->primerNombre }} {{ $examen->segundoNombre }} {{ $examen->primerApellido }} {{ $examen->segundoApellido }}" autocomplete="off" disabled="true">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tipoExamen') ? ' has-error' : '' }}">
                            <label for="tipoExamen" class="col-md-4 control-label">Tipo de Examen</label>
                            <div class="col-md-6">
                                <input id="tipoExamen" type="text" class="form-control" name="tipoExamen" value="{{ $examen->nombreTipoExamen }}" autocomplete="off" disabled="true">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('regionAnatomica') ? ' has-error' : '' }}">
                            <label for="regionAnatomica" class="col-md-4 control-label">Region Anatomica</label>
                            <div class="col-md-6">
                                <input id="regionAnatomica" type="text" class="form-control" name="regionAnatomica" value="{{ $examen->nombreRegionAnatomica}}" autocomplete="off" disabled="true">
                            </div>
                        </div>
                        @endforeach
                            <div class="form-group">
								<label for="patologia" class="col-md-4 control-label">Patologia</label>
								<div class="col-md-2">
								<fieldset class="form-control">
									<input type="radio" id="si" name="patologia" value="Si">
									<label for="si">Si</label>
									<input type="radio" id="no" name="patologia" value="No">
									<label for="no">No</label>
								</fieldset>
								</div>
							</div>

							<div class="form-group">
								<label for="descripcion" class="col-md-4 control-label">Descripción</label>
								<div class="col-md-6">
									<textarea id="descripcion"  class ="form-control" name="descripcion" rows="5" cols="50"></textarea>
								</div>

							</div>


							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-success btn-sm">
										<span class="glyphicon glyphicon-floppy-disk"></span>Guardar Lectura
									</button>
									 <a href="{{ url('/admin_lecturas') }}" class="btn btn-warning btn-sm">
                        			<span class="glyphicon glyphicon-list-alt"></span>Regresar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="alert alert-danger">
		<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
		</div>
		@endcan
	</section>
	@endsection
