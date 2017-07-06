@extends('layouts.app')

@section('content')

<section>
	<div class="alert alert-info">
		<strong>Lista Usuarios</strong>
	</div>
	@if(session()->has('msj'))
	<div class="alert alert-success" role="alert">{{session('msj')}}</div>
	@endif

	<div class="container" id="panelAdminUsers">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Usuarios</div>
				<div class="panel-body">
					<h1 style="display: inline;">Gestionar Usuarios</h1>
					<a href="{{ route('admin_users.create')}}" class="btn btn-primary btn-sm">Ingresar Nuevo Usuario</a>
					<br><br>
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre de usuario</th>
									<th class="text-center">Username</th>
									<th class="text-center">Rol Asignado</th>
                  <th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($users as $user)
										<tr>

											<td class="text-center"> {{ $user->name}} </td>
											<td class="text-center"> {{ $user->username }} </td>
											<td class="text-center"> {{ $user->nombre_rol }} </td>
											<td>
											<a href="{{ route('admin_users.edit',$user->id) }}" class="btn btn-info btn-sm">Editar</a>
											<form method="POST" action="{{ route('admin_users.destroy', $user->id) }} " style='display: inline;'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('está seguro que desea eliminar?')">Borrar</button></form>
											</td>
										</tr>
							@endforeach
							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</section>
@endsection
