@extends('layouts.app')
@section('content')

@can('control_roles')
@if(session()->has('msj2'))
<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
@endif
<link rel="stylesheet" href="/css/asignacion.css" type="text/css">
<div class="container">
  <div id="loginbox" style="margin-top:30px">
    <div class="panel panel-primary" >
      <div class="panel-heading">
        <div class="panel-title">Crear Nuevo Rol</div>
      </div>
      <div style="padding-top:30px" class="panel-body" >
        <form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_roles' ) }}">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
          <div class="form-group {{ $errors->has('nombre_rol') ? ' has-error' : '' }}">
            <label for="nombre_rol" class="col-md-4 control-label">Nombre del Rol</label>
            <div class="col-md-6">
              <input id="nombre_rol" type="text" class="form-control" name="nombre_rol" value="{{ old('nombre_rol') }}" autocomplete="off">
              @if ($errors->has('nombre_rol'))
              <span class="help-block">
                <strong>{{ $errors->first('nombre_rol') }}</strong>
              </span>
              @endif
            </div>
          </div>


          <div class="form-group {{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
            <div class="col-md-6">
              <input id="descripcion" type="text" class="form-control" name= "descripcion" value="{{ old('descripcion') }}" autocomplete="off" required autofocus>
              @if ($errors->has('descripcion'))
              <span class="help-block">
                <strong>{{ $errors->first('descripcion') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <a href="{{ url('/admin_roles') }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
              <button type="submit" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-floppy-disk"></span>Guardar
              </button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else
<div class="alert alert-danger">
<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
</div>
@endcan
@endsection

<a href="{{ url('/admin_roles') }}" class="btn btn-danger">Cancelar</a>
