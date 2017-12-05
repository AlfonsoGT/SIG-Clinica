@extends('layouts.app')

@section('content')

<section>
	@can('ver_usuarios')
	<div class="alert alert-info">
		<strong>Lista Usuarios</strong>
	</div>


	<div class="container" id="panelAdminUsers">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Usuarios</div>
				<div class="panel-body">
					@if(session()->has('msj'))
					<div class="alert alert-success" role="alert">{{session('msj')}}</div>
					@endif
					@if(session()->has('msj2'))
					<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
					@endif

					<h1 style="display: inline;">Gestionar Usuarios</h1>
					<a href="{{ route('admin_users.create')}}" class="btn btn-primary btn-sm">
						<span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Usuario</a>
					<br>
					<div class="row" id="busquedaAvanzada">
						{!! Form::open(['route' => 'admin_users.index', 'method' =>'GET', 'class'=>'form-group']) !!}
						<div class="input-group input-group-sm">
							{!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar Usuario por Nombre,Username','autocomplete'=>'off']) !!}
							<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>
							Buscar Usuario</button>
					</span>
						</div>

						{!! Form::close() !!}
					</div>
					<!--BUSCADOR DE PACIENTES-->
					<br><br>
					@if(count($users)>0)
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre de usuario</th>
									<th class="text-center">Username</th>
                  <th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($users as $user)
										<tr>

											<td class="text-center"> {{ $user->name}} </td>
											<td class="text-center"> {{ $user->username }} </td>
											<td>
											<a href="{{ route('admin_users.edit',$user->id) }}" class="btn btn-info btn-sm">
												@can('editar_usuarios')
											<span class="glyphicon glyphicon-pencil"></span>Editar</a>
											@endcan
											@can('ver_usuarios')
											<a href="{{ route('admin_users.show',$user->id) }}" class="btn btn-success btn-sm">
											<span class="glyphicon glyphicon-eye-open"></span>Ver</a>
											@endcan
											@can('borrar_usuarios')
											<form method="GET" action="{{ route('vista_borrarUsuarios',$user->id) }}
											 " style='display: inline;'>
											<button type="submit" class="btn btn-danger btn-sm">
											<span class="glyphicon glyphicon-trash"></span>Borrar</button></form>
											@endcan
											</td>
										</tr>
							@endforeach
							</tbody>
						</table>
						{!! $users->render() !!}
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
							<strong>No se encuentra el Usuario .</strong>
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
</section>
@endsection
