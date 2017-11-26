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
					<h2 style="display: inline;">Gestionar Lecturas</h2>
					<a href="{{ route('admin_lecturas.create')}}" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-paperclip"></span>Ingresar Nueva Lectura</a>
		
					<br>
					
                    <br><br>
					@if(count($pacientes)>0)
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									
									<th class="text-center">DUI Paciente</th>
									<th class="text-center">Nombre de Paciente</th>
									<th class="text-center">Tipo de Examen</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($pacientes as $paciente)
										<tr>
											
											<td class="text-center">{{ $paciente->duiPaciente }}</a> </td>
											<td class="text-center"> {{ $paciente->primerNombre }} {{ $paciente->segundoNombre }} {{ $paciente->primerApellido }} {{ $paciente->segundoApellido}}</td>
											<td class="text-center"> {{ $paciente->nombreTipoExamen}} </td>
											<td>
											<a href="{{ route('admin_lecturas.edit',$paciente->idPaciente) }}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-pencil"></span>Editar</a>
											<a href="{{action('LecturaController@seePDF', $paciente->idPaciente)}}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-eye-open"></span>Ver PDF</a>	
											<a href="{{action('LecturaController@downloadPDF', $paciente->idPaciente)}}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-download-alt"></span>Descargar PDF</a>	
											</td>

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
                            <strong>No se encuentran Lecturas del Paciente .</strong>
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
