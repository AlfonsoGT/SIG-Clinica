@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/validarFechaExamen.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/validarRepetidas.js')}}"></script>


<div class="container">
  <div id="loginbox" style="margin-top:30px">
    <div class="panel panel-primary" >
      <div class="panel-heading">
        <div class="panel-title">Información General del Examen </div>
      </div>
      @foreach($reservacion as $reservacion)
      <div style="padding-top:30px" class="panel-body" >
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">Nombre completo</th>
                <th class="text-center">Tipo de Examen</th>
                <th class="text-center">Región Anatómica</th>
                <th class="text-center">Número de Recibo</th>
                <th class="text-center">Fecha de Pago</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">{{$reservacion->primerNombre }} {{$reservacion->segundoNombre }} {{$reservacion->primerApellido}} {{$reservacion->segundoApellido}}</td>
                <td class="text-center">{{$reservacion->nombreTipoExamen}}</td>
                <td class="text-center">{{$reservacion->nombreRegionAnatomica}}</td>
                <td class="text-center">{{$reservacion->numeroRecibo}}</td>
                <td class="text-center">
                  <?php
                  $newDate = date("d-m-Y", strtotime($reservacion->fechaPago));
                  print_r($newDate ); ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--fin tabla 1-->
      <!--tabla 2-->

      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center">Referencia</th>
              <th class="text-center">Detalle de Referencia</th>
              <th class="text-center">USG indicación</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <td class="text-center">{{ $reservacion->referencia}}</td>
              <td class="text-center">{{ $reservacion->detalleReferencia}}</td>
              <td class="text-center"> {{ $reservacion->usgIndicacion}}</td>

            </tr>
          </tbody>
        </table>
      </div>

      <!--fin tabla 2-->
    </div>
  </div>
</div>

@endforeach

@if($reservacion->realizado==0)
<div class="container">
  <div id="loginbox" style="margin-top:30px">
    <div class="panel panel-primary" >
      <div class="panel-heading">
        <div class="panel-title">Realización del Examen</div>
      </div>
      <div style="padding-top:30px" class="panel-body" >
        <form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_examenes' ) }}">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
          <input type="hidden" name="idReservacion" value="{{$reservacion->idReservacion}}">


          <div class="form-group">
            <label for="id" class="col-md-4 control-label">Nombre del Encargado del examen</label>
            <div class="col-md-6">

              <input type="hidden" name="idUser" value=" {{ Auth::user()->id}}">
              <input id="nombreCompletoUser" type="text" class="form-control" name="nombreCompletoUser" value=" {{ Auth::user()->username }}" autocomplete="off" disabled="disabled">
            </div>
          </div>

          <div class="form-group">
            <label for="nombrePlaca" class="col-md-4 control-label">Tipo de placa a usar</label>
            <div class="col-md-6">
              <select required class="form-control" name="nombrePlaca" id="nombrePlaca" onchange="ponerFecha();">
                <option value="" disabled selected>Elija un tipo de Placa</option>
                <option  value='8x10'>8x10</option>
                <option  value='10x12'>10x12</option>
                <option  value='11x14'>11x14</option>
                <option  value='14x14'>14x14</option>
                <option  value='14x17'>14x17</option>
              </select>
            </div>
          </div>

          <div class="form-group {{ $errors->has('cantidadUsadas') ? ' has-error' : '' }}">
            <label for="cantidadUsadas" class="col-md-4 control-label">Cantidad Usadas</label>
            <div class="col-md-6">
              <input id="cantidadUsadas" type="text" class="form-control" name= "cantidadUsadas" value="{{ old('cantidadUsadas') }}" autocomplete="off" required autofocus>
              @if ($errors->has('cantidadUsadas'))
              <span class="help-block">
                <strong>{{ $errors->first('cantidadUsadas') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('cantidadUsadas') ? ' has-error' : '' }}">
            <label for="cantidadRepetidas" class="col-md-4 control-label">Cantidad Repetidas</label>
            <div class="col-md-6">
              <input id="cantidadRepetidas" type="text" class="form-control" name= "cantidadRepetidas" value="{{ old('cantidadRepetidas') }}" autocomplete="off" required onchange="validarRepetidas();">
              @if ($errors->has('cantidadRepRepetidas'))
              <span class="help-block">
                <strong>{{ $errors->first('cantidadRepetidas') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('motivorepeticion') ? ' has-error' : '' }}">
                  <label for="motivorepeticion" class="col-md-4 control-label">Repetición</label>
                  <div class="col-md-6">
                      <select required class="form-control" name="motivorepeticion" id="motivorepeticion" onchange="ocul()">
                        <option value="" disabled selected>Motivo de Repetición</option>
                         <option  value='Técnica'>Técnica</option>
                         <option  value='Procesador'>Procesador</option>
                         <option  value='Posición'>Posición</option>
                          </select>

                  </div>
          </div>

          <div class="form-group {{ $errors->has('fechaCita') ? ' has-error' : '' }}">
            <label for="fechaRealizacion" class="col-md-4 control-label">Fecha de Realización </label>
            <div class="col-md-6">
              <input id="fechaRealizacion" type="date" class="form-control" name="fechaRealizacion" value="{{ old('fechaRealizacion') }}"  required autofocus onblur="validarFecha();" >
              @if ($errors->has('fechaRealizacion'))
              <span class="help-block">
                <strong>{{ $errors->first('fechaRealizacion') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-floppy-disk"></span> Guardar detalles del examen
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
<strong>ESTE EXAMEN YA FUE REALIZADO Y REGISTRADO</strong>
</div>
@endif

@endsection
