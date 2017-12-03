@extends('layouts.app')

@section('content')

<section>
	@can('control_pacientes')
	<div class="container" id="panelAdminLecturas">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Lecturas de Pacientes</div>

				<div class="panel-body">
				@if(session()->has('msj'))
				<div class="alert alert-success" role="alert">{{session('msj')}}</div>
				@endif
				@if(session()->has('msj2'))
				<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
				@endif
					<h2 style="display: inline;">Gestionar Lecturas</h2>

                    <br><br>
					@if(count($examenesNoLectura)>0)
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre de Paciente</th>
									<th class="text-center">Tipo de Examen</th>
									<th class="text-center">Region Anatomica</th>
									<th class="text-center">Fecha de Realización del Examen</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($examenesNoLectura as $examen)
										<tr>

											<td class="text-center">{{ $examen->primerNombre }} {{ $examen->segundoNombre }} {{ $examen->primerApellido }} {{ $examen->segundoApellido }}</a> </td>
											<td class="text-center"> {{ $examen->nombreTipoExamen }}</td>
											<td class="text-center"> {{ $examen->nombreRegionAnatomica}} </td>
											<td class="text-center"> {{ $examen->fechaRealizacion}} </td>
											<td>
												@if($examen->hayLectura == 0)
												 <a href="{{ route('crearLectura',$examen->idExamen) }}" class="btn btn-success btn-sm">
                        						<span class="glyphicon glyphicon-paperclip"></span>Generar Lectura</a>
                        						@else
                        						<a href="{{ route('seePDF',$examen->idExamen) }}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-download-alt"></span>Ver PDF</a>
                        						@endif


											</td>

											</td>
										</tr>
							@endforeach
							</tbody>
						</table>
                       {!! $examenesNoLectura->render() !!}

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
                            <strong>No hay examenes pendientes de registro de lectura</strong>
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
