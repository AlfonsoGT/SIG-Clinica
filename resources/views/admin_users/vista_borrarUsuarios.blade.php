@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="table-responsive">
		<form class="form" method="post" action="{{ route('admin_users.destroy', $usuario->id) }} ">
     <input type="hidden" name="_method" value="DELETE">
     				{{ csrf_field() }}    
     		 
      		 <h1>Desea eliminar al Usuario de nombre: {{$usuario->name}} con Username: {{$usuario->username}} </h1>
      		 <div class="form-group">
        <button  type="submit" class="btn btn-danger btn-sm "><span class="glyphicon glyphicon-trash"></span>Eliminar Usuario</button>
        <a href="{{ url('/admin_users') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a lista de Usuarios</a>
    </div>
    </form>
		</div>
	</div>
	</div>
</div>
</div>
</div>

@endsection