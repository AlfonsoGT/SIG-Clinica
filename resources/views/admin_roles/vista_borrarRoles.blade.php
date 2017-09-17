@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="table-responsive">
		<form class="form" method="post" action="{{ route('admin_roles.destroy', $rol->id) }} ">
     <input type="hidden" name="_method" value="DELETE">
     				{{ csrf_field() }}    
     		 
      		 <h1>Desea eliminar al Rol de nombre: {{$rol->name}} con descripcion : {{$rol->description}} </h1>
      		 <div class="form-group">
        <button  type="submit" class="btn btn-danger btn-sm "><span class="glyphicon glyphicon-trash"></span>Eliminar Rol </button>
        <a href="{{ url('/admin_roles') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a lista de Roles</a>
    </div>
    </form>
		</div>
	</div>
	</div>
</div>
</div>
</div>

@endsection