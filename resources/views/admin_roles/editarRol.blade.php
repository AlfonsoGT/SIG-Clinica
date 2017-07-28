@extends('layouts.app')

@section('content')

<div class="container">
    <div id="loginbox" style="margin-top:30px">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Editar Rol</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form class="form-horizontal" role="form" method="POST" action="/admin_roles/{{$rol->id}}">
                  <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                    <div class="form-group {{ $errors->has('nombre_rol') ? ' has-error' : '' }}">
                        <label for="nombre_rol" class="col-md-4 control-label">Nombre del Rol</label>
                        <div class="col-md-6">
                            <input id="nombre_rol" type="text" class="form-control" name="nombre_rol" value="{{ $rol->name }}" autocomplete="off">
                            @if ($errors->has('nombre_rol'))
                                <span class="help-block">
                    <strong>{{ $errors->first('nombre_rol') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
                      <label for="Descripción" class="col-md-4 control-label">Descripción</label>
                      <div class="col-md-6">
                        <input id="descripcion" type="text" class="form-control" name= "descripcion" value="{{ $rol->description }}" autocomplete="off" required autofocus>
                        @if ($errors->has('descripcion'))
                        <span class="help-block">
                          <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-sm">
                              <span class="glyphicon glyphicon-floppy-disk"></span> Guardar Cambios
                            </button>
                            <div class="col-lg-4">
                                <a href="{{ url('/admin_roles') }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
