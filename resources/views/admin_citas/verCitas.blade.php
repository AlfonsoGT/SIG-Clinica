@extends('layouts.app')

@section('content')

<section>
	@can('control_citas')
	@if(session()->has('msj'))
	<div class="alert alert-success" role="alert">{{session('msj')}}</div>
	@endif
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información de la Cita</div>
				</div>
                <br>
                @if(session()->has('msj'))
                    <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                @endif
				<div style="padding-top:30px" class="panel-body" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

<!--tabla 1-->

<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>

				<th class="text-center">ID Cita</th>
				<th class="text-center">Tipo de Examen</th>
				<th class="text-center">Hora de Cita</th>
				<th class="text-center">Fecha de Cita</th>
				<th class="text-center">Cantidad de Reservaciones</th>

			</tr>
		</thead>
		<tbody>
		@foreach($citas as $cita)
		@foreach($cantidad as $can)
					<tr>
					 <td class="text-center">{{ $cita->idCita}}</td>
                     <td class="text-center">{{ $cita->nombreTipoExamen}}</td>
                     <td class="text-center"> {{ $cita->horaCita }} </td>
                      <td class="text-center">
                      	<?php
                        $newDate = date("d-m-Y", strtotime($cita->fechaCita));
                        print_r($newDate ); ?>
                      </td>
                       <td class="text-center"> {{ $can->conteo }} </td>
					</tr>

		</tbody>
	</table>


    <div class="panel-heading"><strong><h3>Pacientes Registrados</h3></strong></div>
    <!--BUSCADOR DE PACIENTES-->
    <div class="row" id="busquedaAvanzada">
        {!! Form::open(['route' =>  array('admin_citas.show', $cita->idCita), 'method' =>'GET', 'class'=>'form-group']) !!}
        <div class="input-group input-group-sm">
            {!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar Paciente','autocomplete'=>'off']) !!}
            <span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>Buscar Paciente</button>
					</span>

        </div>

        {!! Form::close() !!}
    </div>
    <!--BUSCADOR DE PACIENTES-->
</div>
    @endforeach
    @endforeach
                    @if(count($reservaciones)>0)
                    <div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
		 <thead>
			 <tr>

				 <th class="text-center">Nombre Completo de Paciente</th>
				 <th class="text-center">Sexo</th>
				 <th class="text-center">Región Anatomica</th>
				 <th class="text-center">Acciones</th>


			 </tr>
		 </thead>
		 <tbody>
		 @foreach($reservaciones as $reservacion)
					 <tr>
						 <td class="text-center">{{ $reservacion->primerNombre}} {{$reservacion->segundoNombre}} {{$reservacion->primerApellido}}  {{$reservacion->segundoApellido}}</td>
						 <td class="text-center"> {{ $reservacion->nombreSexo}}</td>
						 <td class="text-center"> {{ $reservacion->nombreRegionAnatomica}}</td>
							 <td><a href="/crearcita/{{$reservacion->idReservacion}}" class="btn btn-info btn-sm">
							 <span class="glyphicon glyphicon-pencil"></span>Realizar Examen</a></td>
					 </tr>
		@endforeach
		 </tbody>
		</table>
		 {!! $reservaciones->render() !!}
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
                        <div class="alert alert-warning">
                            <strong>No se encuentra ninguna Reservacion registrada a esta Cita.</strong>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
		<a href="{{ url('/admin_citas') }}" class="btn btn-warning btn-sm">
		 <span class="glyphicon glyphicon-list-alt"></span>Regresar a Lista de Citas</a>
		 @if($cita->habilitado==1)
		 <a href="{{ route('inhabilitarCita',$cita->idCita) }}"class="btn btn-danger btn-sm">
		 <span class="glyphicon glyphicon-wrench"></span>Cerrar Cita</a>
		 @else
		 <a href="{{ route('habilitarCita',$cita->idCita) }}" class="btn btn-info btn-sm"  id="pac_habilitado">
		<span class="glyphicon glyphicon-wrench"></span>Abrir Cita</a>
		@endif

		@else
		<div class="alert alert-danger">
		<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
		</div>
		 @endcan
</section>
@endsection
