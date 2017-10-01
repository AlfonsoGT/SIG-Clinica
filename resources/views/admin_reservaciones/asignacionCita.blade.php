@extends('layouts.app')
@section('content')
@can('control_citas')
<script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/cargarRegion.js')}}"></script>
<div class="container">
    <div id="loginbox" style="margin-top:30px">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Asignación de Examen a Paciente </div>
            </div>
             @foreach($paciente as $pac)
             @if($pac->activo==1)
            <div style="padding-top:30px" class="panel-body" >
                <form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_reservaciones' ) }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                    <div class="form-group">

                            <label for="tipoExamen" class="col-md-4 control-label">Tipo de Examen</label>
                            <div class="col-md-6">
                                 <select required class="form-control" name="examen" id="examen">
                                  <option value="" disabled selected>Seleccione un tipo de Examen</option>
                                           @foreach($examen as $exa)
                                            <option  value='{{ $exa->idTipoExamen}}'>{{ $exa->nombreTipoExamen}} </option>
                                        @endforeach
                                    </select>
                            </div>
                </div>
                <label>Citas Disponibles</label>
                <div class="table-responsive"   >
                         <table class="table table-striped table-hover table-bordered" id="tabla">
                           <div class="alert alert-info" role="alert">
                                    <strong>Seleccione un Tipo de Examen para ver las Citas Disponibles</strong>
                            </div>
                        </table>
                    </div>
                     <div class="form-group">

                            <label for="tipoExamen" class="col-md-4 control-label">Seleccionar Cita Disponible</label>
                            <div class="col-md-6">
                                 <select required class="form-control" name="tipos" id="tipos">
                                  <option value="" disabled selected>Seleccione una cita</option>
                                        
                                    </select>
                            </div>
                </div>
                 <div class="form-group">
                            <label for="regionAnatomica" class="col-md-4 control-label">Region Anatomica</label>
                            <div class="col-md-6">
                                 <select required class="form-control" name="region" id="region">
                                  <option value="" disabled selected>Seleccione una Region Anatomica</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">Nombre de Paciente</label>
                            <div class="col-md-6">
                            @foreach($paciente as $pac)
                                <input type="hidden" name="idPaciente" value="{{$pac->idPaciente}}">
                                <input id="nombreCompleto" type="text" class="form-control" name="nombreCompleto" value="{{ $pac->primerNombre}} {{$pac->segundoNombre}} {{$pac->primerApellido}} {{$pac->segundoApellido}} " autocomplete="off" disabled="disabled">
                            @endforeach
                            </div>
                        </div>
                     <div class="form-group {{ $errors->has('numeroRecibo') ? ' has-error' : '' }}">
                            <label for="numeroRecibo" class="col-md-4 control-label">Numero de Recibo</label>
                            <div class="col-md-6">
                                <input id="numeroRecibo" type="text" class="form-control" name="numeroRecibo" value="{{ old('numeroRecibo') }}" autocomplete="off">
                                @if ($errors->has('numeroRecibo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('numeroRecibo') }}</strong>
                                                </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-4 control-label">Precio</label>
                            <div class="col-md-6">
                                <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}" autocomplete="off">
                                @if ($errors->has('precio'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('precio') }}</strong>
                                                </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fechaPago') ? ' has-error' : '' }}">
                            <label for="fechaPago" class="col-md-4 control-label">Fecha Pago</label>
                            <div class="col-md-6">
                                <input id="fechaPago" type="date" class="form-control" name="fechaPago" value="{{ old('fechaPago') }}" required autofocus>
                                @if ($errors->has('fechaPago'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('fechaPago') }}</strong>
                                                </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('referencia') ? ' has-error' : '' }}">
                            <label for="referencia" class="col-md-4 control-label">Referencia</label>
                            <div class="col-md-6">
                                <input id="referencia" type="text" class="form-control" name="referencia" value="{{ old('referencia') }}" autocomplete="off">
                                @if ($errors->has('referencia'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('referencia') }}</strong>
                                                </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('detalleReferencia') ? ' has-error' : '' }}">
                            <label for="detalleReferencia" class="col-md-4 control-label">Detalle de Referencia</label>
                            <div class="col-md-6">
                                <input id="detalleReferencia" type="text" class="form-control" name="detalleReferencia" value="{{ old('detalleReferencia') }}" autocomplete="off">
                                @if ($errors->has('detalleReferencia'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('detalleReferencia') }}</strong>
                                                </span>
                                 @endif
                            </div>
                        </div>


                    <div class="form-group {{ $errors->has('preparacion') ? ' has-error' : '' }}">
                            <label for="preparacion" class="col-md-4 control-label">Preparación</label>
                            <div class="col-md-6">
                                <select required class="form-control" name="preparacion" id="preparacion" onchange="ocul()">
                                  <option value="" disabled selected>Elija una Opcion</option>
                                   <option  value='1'> SI</option>
                                   <option  value='0'> NO</option>
                                    </select>

                            </div>
                    </div>
                  <div class="form-group {{ $errors->has('usgIndicacion') ? ' has-error' : '' }}">
                            <label for="usgIndicacion" class="col-md-4 control-label">USG Indicación</label>
                            <div class="col-md-6">
                                <input id="usgIndicacion" type="text" class="form-control" name="usgIndicacion" value="{{ old('usgIndicacion') }}" autocomplete="off">
                                @if ($errors->has('usgIndicacion'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('usgIndicacion') }}</strong>
                                                </span>
                                 @endif
                            </div>
                    </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success btn-sm">
                           <span class="glyphicon glyphicon-floppy-disk"></span> Guardar Reservación
                        </button>
                         @foreach($paciente as $pac)
                         <a href="{{ route('admin_pacientes.show',$pac->idPaciente) }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Perfil de Paciente</a>
                        @endforeach

                    </div>
                </div>
            </form>
        </div>
        @else
        <div class="alert alert-danger" role="alert"> EL PERFIL DEL PACIENTE NO ESTÁ HABILITADO, NO PUEDE ASIGNARLE NINGUNA CITA </div>
        @endif
        @endforeach
    </div>
</div>
</div>
@else
<div class="alert alert-danger">
<strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
</div>
 @endcan

@endsection
