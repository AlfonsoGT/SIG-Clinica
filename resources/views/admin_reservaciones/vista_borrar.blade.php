@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="table-responsive">
      
        <form class="form" method="post" action="{{ route('admin_reservaciones.destroy', $reservacion->idReservacion ) }} ">
     <input type="hidden" name="_method" value="DELETE">
			{{ csrf_field() }}    
     		@foreach($detalleReservacion as $reserva)    
      		 <h1>Desea eliminar el tipo de Examen de :{{ $reserva->nombreTipoExamen}} con fecha: {{$reservacion->fechaCita}} y hora: {{$reserva->horaCita}} </h1>
      		 @endforeach
      		 <div class="form-group">
        
        
         <button  type="submit" class="btn btn-danger btn-sm "><span class="glyphicon glyphicon-trash"></span>Eliminar Reservacion</button>

        <a href="{{ route('admin_pacientes.show',$paciente->idPaciente) }}" class="btn btn-warning btn-sm">
     <span class="glyphicon glyphicon-list-alt"></span></span>Cancelar</a>
    </div>
    </form>
		</div>
	</div>
	</div>
</div>
</div>
</div>

@endsection