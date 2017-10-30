@extends('layouts.app')
@section('content')
<div class="container">
    <div id="loginbox" style="margin-top:30px">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Aperturar Nuevo Inventario</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_salidas' ) }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                    
                    <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="mes" class="col-md-4 control-label">Año</label>
                                <div class="col-md-6">
                                    <input id="fecha" type="month" class="form-control" name="fecha" value="{{ old('fecha') }}" required autofocus>
                                    @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                 <div class="form-group">
            <label for="id" class="col-md-4 control-label">Nombre del Encargado del examen</label>
            <div class="col-md-6">

              <input type="hidden" name="idUser" value=" {{ Auth::user()->id}}">
              <input id="nombreCompletoUser" type="text" class="form-control" name="nombreCompletoUser" value=" {{ Auth::user()->username }}" autocomplete="off" disabled="disabled">
            </div>
          </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success btn-sm">
                             <span class="glyphicon glyphicon-floppy-disk"></span>Guardar Registro del mes 
                        </button>
                         <a href="{{ url('/admin_productos') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Productos</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection