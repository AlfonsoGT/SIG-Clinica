@extends('layouts.app')

@section('content')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Detalle de Ingreso de Materiales</div>
                    <div class="panel-body">
                       

                        <h2 style="display: inline;">Detalle de Materiales</h2>
                   
                        <!--tabla 1-->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Mes</th>
                                <th class="text-center">Encargado</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salidas as $salida)
                            <tr>
                                <td class="text-center">{{ $salida->fecha }}</a> </td>
                                <td class="text-center">{{ $salida->username}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                
                <!--tabla 2-->
                 @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif
                       <h2 style="display: inline;">Materiales</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>

                                        <th class="text-center">Material</th>
                                        <th class="text-center">Fecha de Uso</th>
                                        <th class="text-center">Cantidad de Material</th>
                                        <th class="text-center">Unidad</th>
                                        <th class="text-center">Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($detalleSalidas as $detalle)
                                    <tr>

                                        <td class="text-center">{{ $detalle->nombreTipoMaterial }}</td>
                                        <td class="text-center">{{ $detalle->fecha }}</td>
                                        <td class="text-center">{{ $detalle->cantidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->nombreTipoUnidad }}</td>
                                       
                                        <td><a href="" class="btn btn-danger btn-sm">borrar</a></td>
                                        
                                    </tr>
                                  @endforeach
                                </tbody>
                                {!! $detalleSalidas->render() !!}
                            </table>
                        </div>
                        @foreach($salidas as $salida)
                        <form class="form-horizontal" role="form" method="POST" action="/ingresarMaterial/{{$salida->idSalida }}">
                        @endforeach
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->


                        <div class="form-group{{ $errors->has('cantidadMaterial') ? ' has-error' : '' }}">
                            <label for="cantidadMaterial" class="col-md-4 control-label">Cantidad de Material</label>

                            <div class="col-md-6">
                                <input id="cantidadMaterial" type="text" class="form-control" name="cantidadMaterial" value="{{ old('cantidadMaterial') }}" autocomplete="off" required autofocus>

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
                                    <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" " required autofocus>
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
                                    <select required class="form-control" name="tipoMaterial" id="tipoMaterial" onchange="ocul()">
                                        <option value="" disabled selected>Seleccione un Tipo de Material</option>
                                        @foreach($tipoMaterial as $tipo)
                                        <option  value='{{$tipo->idTipoMaterial}}'> {{$tipo->nombreTipoMaterial}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="tipoUnidad" class="col-md-4 control-label">Tipo Unidad</label>
                                <div class="col-md-6">
                                    <select required class="form-control" name="tipoUnidad" id="tipoUnidad" onchange="ocul()">
                                        <option value="" disabled selected>Seleccione un Tipo de Unidad</option>
                                        @foreach($tipoUnidad as $tipo)
                                        <option  value='{{$tipo->idTipoUnidad}}'> {{$tipo->nombreTipoUnidad}}</option>
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

        </div>
        </div>
       
    </section>
@endsection
