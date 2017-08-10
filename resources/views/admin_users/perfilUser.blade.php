@extends('layouts.app')

@section('content')
<section>

	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información del usuario</div>
				</div>
				@if(session()->has('msj'))
				<div class="alert alert-success" role="alert">{{session('msj')}}</div>
				@endif
				@if(session()->has('msj2'))
				<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
				@endif
				<div style="padding-top:30px" class="panel-body" >
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

					<!--tabla 1-->
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre Completo</th>
									<th class="text-center">Nombre de Usuario</th>
									<th class="text-center">Acciones</th>


								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>

									<td class="text-center">{{ $user->name }}</td>
									<td class="text-center"> {{ $user->username }} </td>
									<td>@if(Auth::user()->id==$user->id)
									<a href="/editPassword/{{$user->id}}" class="btn btn-info btn-sm">
										<span class="glyphicon glyphicon-pencil"></span>Editar mi contraseña</a>
										@endif
										<a href="{{ route('admin_users.edit',$user->id) }}" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-pencil"></span>Editar información del usuario</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>


						<!--tabla 2-->
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>

										<th class="text-center">Roles Asignados</th>
										<th class="text-center">Descripción</th>
										<th class="text-center">Acciones</th>


									</tr>
								</thead>
								<tbody>
									@foreach($rolesAsignados as $rolesA)
									<tr>

										<td class="text-center">{{ $rolesA->name }}</td>
										<td class="text-center">{{ $rolesA->description }}</td>
										<td><a href="/revocarRol/{{$user->id}},{{$rolesA->id}}" class="btn btn-danger btn-sm">borrar</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<form method="GET" action="/asignarRol/{{$user->id}}">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="rol_asignado" class="col-md-4 control-label">Rol a asignar</label>
								<div class="col-md-6">
									<select class="form-control" name="rol_asignado" id="rol_asignado" onchange="ocul()">
										@foreach($roles as $rol)
										<option  value='{{ $rol->id }}'> {{ $rol->name }} </option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>Asignar Rol</button></td>
						</div>
					</section>
					@endsection
