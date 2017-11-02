@extends('layouts.app')
@section('content')
<div class="container">
    <div id="loginbox" style="margin-top:30px">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Editar Nuevo Material</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <form class="form-horizontal" role="form" method="POST" action="/admin_salidas/{{ $material->idMaterial }}">
                <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

                        <div class="form-group{{ $errors->has('cantidadMaterial') ? ' has-error' : '' }}">
                            <label for="cantidadMaterial" class="col-md-4 control-label">Cantidad de Material</label>

                            <div class="col-md-6">
                                <input id="cantidadMaterial" type="text" class="form-control" name="cantidadMaterial" value="{{ $material->cantidadMaterial }}" autocomplete="off" required autofocus>

                                @if ($errors->has('cantidadMaterial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidadMaterial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="fecha" class="col-md-4 control-label">Fecha de Uso</label>
                                <div class="col-md-6">
                                    <input id="fecha" type="date" class="form-control" name="fecha" value="{{ $material->fecha }}" " required autofocus>
                                    @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipoMaterial" class="col-md-4 control-label">Tipo Material</label>
                                <div class="col-md-6">
                                    <!--lista desplegable -->
                                    <select class="form-control" name="tipoMaterial" id="tipoMaterial" onchange="ocul()">
                                        @foreach($tipoUnidadSeleccionado as $material)
                                        <option  value='{{ $material->idTipoMaterial}}'> {{ $material->nombreTipoMaterial }} </option>
                                        @endforeach
                                       @foreach($tipoMaterialNoSeleccionado as $material)
                                        <option  value='{{ $material->idTipoMaterial}}'> {{ $material->nombreTipoMaterial }} </option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipoUnidad" class="col-md-4 control-label">Tipo Unidad</label>
                                <div class="col-md-6">
                                    <!--lista desplegable -->
                                    <select class="form-control" name="tipoUnidad" id="tipoUnidad" onchange="ocul()">
                                        @foreach($tipoUnidadSeleccionado as $unidad)
                                        <option  value='{{ $unidad->idTipoUnidad}}'> {{ $unidad->nombreTipoUnidad }} </option>
                                        @endforeach
                                       @foreach($tipoUnidadNoSeleccionado  as $unidad2)
                                        <option  value='{{ $unidad2->idTipoUnidad}}'> {{ $unidad2->nombreTipoUnidad }} </option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>Ingresar Nuevo Material
                                    </button>
                                     <a href="{{ url('/admin_salidas') }}" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-list-alt"></span>Regresar a ver Registros</a>
                                    
                                </div>
                            </div>
                    </form>
        </div>
    </div>
</div>
</div>
@endsection