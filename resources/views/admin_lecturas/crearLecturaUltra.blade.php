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
									<input required type="radio" id="si" name="patologia" value="Si">
									<label for="si">Si</label>
									<input type="radio" id="no" name="patologia" value="No">
									<label for="no">No</label>
								</fieldset>
								</div>
							</div>
							<div class="form-group {{ $errors->has('posicionUtero') ? ' has-error' : '' }}">
                  				<label for="posicionUtero" class="col-md-4 control-label">Posición</label>
                  				<div class="col-md-6">
                      				<select required class="form-control" name="posicionUtero" id="posicionUtero" onchange="ocul()">
                        			<option value="" disabled selected>Elija Posición</option>
                         			<option  value='En Anteversión'>En Anteversión</option>
                         			<option  value='Retroversión'>Retroversión</option>
                         			<option  value='Posición Intermedia'>Posición Intermedia</option>
                          		</select>
                 				 </div>
          					</div>
							<div class="form-group {{ $errors->has('medidas') ? ' has-error' : '' }}">
								<label for="medidas" class="col-md-4 control-label">Medidas :</label>
								<div class="col-md-6">
									<input id="medidas" type="text" class="form-control" name= "medidas" value="{{ old('medidas') }}" autocomplete="off" required autofocus>
									@if ($errors->has('medidas'))
									<span class="help-block">
										<strong>{{ $errors->first('medidas') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('contorno') ? ' has-error' : '' }}">
								<label for="contorno" class="col-md-4 control-label">Contorno :</label>
								<div class="col-md-6">
									<input id="contorno" type="text" class="form-control" name= "contorno" value="{{ old('contorno') }}" autocomplete="off" required autofocus>
									@if ($errors->has('contorno'))
									<span class="help-block">
										<strong>{{ $errors->first('contorno') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('miometrio') ? ' has-error' : '' }}">
								<label for="miometrio" class="col-md-4 control-label">Miometrio :</label>
								<div class="col-md-6">
									<input id="miometrio" type="text" class="form-control" name= "miometrio" value="{{ old('miometrio') }}" autocomplete="off" required autofocus>
									@if ($errors->has('miometrio'))
									<span class="help-block">
										<strong>{{ $errors->first('miometrio') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('endometrio') ? ' has-error' : '' }}">
								<label for="endometrio" class="col-md-4 control-label">Endometrio :</label>
								<div class="col-md-6">
									<input id="endometrio" type="text" class="form-control" name= "endometrio" value="{{ old('endometrio') }}" autocomplete="off" required autofocus>
									@if ($errors->has('endometrio'))
									<span class="help-block">
										<strong>{{ $errors->first('endometrio') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('derecho') ? ' has-error' : '' }}">
								<label for="derecho" class="col-md-4 control-label">Derecho :</label>
								<div class="col-md-6">
									<input id="derecho" type="text" class="form-control" name= "derecho" value="{{ old('derecho') }}" autocomplete="off" required autofocus>
									@if ($errors->has('derecho'))
									<span class="help-block">
										<strong>{{ $errors->first('derecho') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('izquierdo') ? ' has-error' : '' }}">
								<label for="izquierdo" class="col-md-4 control-label">Izquierdo :</label>
								<div class="col-md-6">
									<input id="izquierdo" type="text" class="form-control" name= "izquierdo" value="{{ old('izquierdo') }}" autocomplete="off" required autofocus>
									@if ($errors->has('izquierdo'))
									<span class="help-block">
										<strong>{{ $errors->first('izquierdo') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('fondo') ? ' has-error' : '' }}">
								<label for="fondo" class="col-md-4 control-label">Fondo de Saco :</label>
								<div class="col-md-6">
									<input id="fondo" type="text" class="form-control" name= "fondo" value="{{ old('fondo') }}" autocomplete="off" required autofocus>
									@if ($errors->has('fondo'))
									<span class="help-block">
										<strong>{{ $errors->first('fondo') }}</strong>
									</span>
									@endif
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
