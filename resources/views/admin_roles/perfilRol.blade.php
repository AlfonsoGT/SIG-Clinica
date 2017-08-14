@extends('layouts.app')

@section('content')
<section>
	@if(session()->has('msj'))
	<div class="alert alert-success" role="alert">{{session('msj')}}</div>
	@endif
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información del Rol</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

					<!--tabla 1-->
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th class="text-center">Nombre del Rol</th>
									<th class="text-center">Descripcion</th>
									<th class="text-center">Acciones</th>


								</tr>
							</thead>
							<tbody>
								@foreach($Rol as $rol)
								<tr>
									<td class="text-center">{{ $rol->name }}</td>
									<td class="text-center">{{ $rol->description }}</td>
									<td><a href="{{ route('admin_roles.edit',$rol->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span>Editar Información</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@if(count($permisosAsignados)>0)
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th class="text-center">Permisos Asignados</th>
										<th class="text-center">Descripción</th>
										<th class="text-center">Acciones</th>


									</tr>
								</thead>
								<tbody>
									@foreach($permisosAsignados as $permisoA)
									<tr>
										<td class="text-center">{{ $permisoA->name }}</td>
										<td class="text-center">{{ $permisoA->description }}</td>
										<td><a href="/revocarPermiso/{{$rol->id}},{{$permisoA->id}}" class="btn btn-danger btn-sm">borrar</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						@else
        					<div class="row">
            					<div class="col-lg-12">
                					<div class="panel panel-default">
                    					<div class="panel-body">
                        					<div class="alert alert-warning">
                            					<strong>No existen permisos asignados a este Rol.</strong>
                        					</div>

                    					</div>
               					 </div>
            					</div>
        					</div>
    					@endif
    					@if(count($permisos)>0)
						<form method="GET" action="/asignarPermiso/{{$rol->id}}">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="permiso_asignado" class="col-md-4 control-label">Permiso a asignar</label>
								<div class="col-md-6">
									<select class="form-control" name="permiso_asignado" id="permiso_asignado" onchange="ocul()">
										<option value="" disabled selected>Elija un Permiso</option>
										@foreach($permisos as $permiso)
										<option  value='{{ $permiso->id }}'> {{ $permiso->name }} </option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>Asignar Permiso</button></td>
						</div>
						@endif


						<div class="form-group">
							 <a href="{{ url('/admin_roles') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Lista de Roles</a>
						</div>
						</div>

						<!--</div>-->
					</section>
					@endsection
