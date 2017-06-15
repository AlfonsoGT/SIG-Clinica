@extends('layouts.app')

@section('content')
<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Iniciar Sesión</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <!--Mensaje de error -->
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  <!--Seguridad Otorgada por blade -->


                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Nombre de Usuario</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

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
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
