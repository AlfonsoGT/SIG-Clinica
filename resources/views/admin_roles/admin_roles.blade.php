@extends('layouts.app')

@section('content')
    <section>
      @can('control_roles')
        <div class="alert alert-info">
            <strong>Lista de Roles</strong>
        </div>
        
        <div class="container" id="panelAdminRoles">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Administración de Roles</div>
                    <div class="panel-body">
                        @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif
                         @if(session()->has('msj2'))
                        <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                        @endif
                        <h1 style="display: inline;">Gestionar Roles</h1>
                        <a href="{{ route('admin_roles.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Rol</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>

                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre de Rol</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $rol)
                                    <tr>
                                        <td class="text-center">{{ $rol->id }}</td>
                                        <td class="text-center"> {{ $rol->name }} </td>
                                        <td class="text-center"> {{ $rol->description }} </td>
                                        <td>
                                            <a href="{{ route('admin_roles.show',$rol->id) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver</a>
                                            <form method="GET" action="/vista_borrarRoles/{{$rol->id}} " style='display: inline;'>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-trash"></span>Borrar</button></form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $roles->render() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        @else
      	<div class="alert alert-danger">
      	<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
      	</div>
      	@endcan
    </section>
@endsection
