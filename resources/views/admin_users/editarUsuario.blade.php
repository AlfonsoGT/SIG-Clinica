@extends('layouts.app')

@section('content')
	@can('control_usuarios')
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="alert alert-info">
			<strong>IMPORTANTE: Los campos de contraseña y confirmar contraseña se deberán dejar en blanco a menos que se desee asignar una contraseña nueva al usuario </strong>
			</div>
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Editar Usuario</div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <!--Mensaje de error -->
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin_users.update',$user->id) }}">
                      	<input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="off" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" autocomplete="off" readonly="readonly" autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmación de Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar Cambios </button>
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
