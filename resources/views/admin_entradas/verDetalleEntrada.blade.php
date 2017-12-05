@extends('layouts.app')

@section('content')
  @can('generar_graficos')
    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Detalle de Materiales Comprados en el año</div>
                    <div class="panel-body">




                        <!--tabla 1-->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Año de Registro de Adquisición</th>
                                <th class="text-center">Encargado de Registro de Adquisición</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entradas as $entrada)
                            <tr>
                                <td class="text-center">{{ $entrada->año }}</a> </td>
                                <td class="text-center">{{ $entrada->username}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                  <h2 style="display: inline;">Detalle de Materiales </h2>
                <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>

                                        <th class="text-center">Material</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Unidades Compradas</th>
                                        <th class="text-center">Unidades Utilizadas</th>
                                        <th class="text-center">Unidades Disponibles</th>


                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($TipoUnidadTodo as $detalle)
                                    <tr>
                                        <td class="text-center">{{$detalle->nombreTipoMaterial}}</td>
                                        <td class="text-center">{{$detalle->nombreTipoUnidad}}</td>
                                        <td class="text-center">@foreach($sumaTotal as $suma)
                                                @if($suma->idTipoUnidad == $detalle->idTipoUnidad)
                                                <?php
                                                $cantidadCajas =  $suma->cantidadUnidad;
                                                $cantidadUnidad = $suma->cantidadSuma;
                                                $cantidadTotal = $cantidadCajas*$cantidadUnidad;
                                                 print_r( $cantidadTotal );
                                                ?>

                                                 @endif
                                                @endforeach</td>
                                        <td class="text-center">
                                             @foreach($sumaTotalSalidas as $suma)
                                                @if($suma->idTipoUnidad == $detalle->idTipoUnidad)
                                                <?php
                                                $cantidadCajas =  $suma->cantidadUnidad;

                                                 print_r( $cantidadCajas);
                                                ?>

                                                 @endif
                                                @endforeach
                                        </td>
                                        <td class="text-center">
                                             @foreach($sumaTotal as $suma)
                                                @foreach($sumaTotalSalidas as $suma2)
                                                @if($suma->idTipoUnidad == $detalle->idTipoUnidad && $suma2->idTipoUnidad == $detalle->idTipoUnidad)
                                                <?php
                                                $cantidadCajas =  $suma->cantidadUnidad;
                                                $cantidadUnidad = $suma->cantidadSuma;
                                                $cantidad = $suma2->cantidadUnidad;
                                                $cantidadTotal = $cantidadCajas*$cantidadUnidad;
                                                $cantidadRestante = $cantidadTotal-$cantidad;
                                                 print_r( $cantidadRestante);
                                                ?>

                                              @endif
                                                @endforeach
                                             @endforeach
                                        </td>

                                       </tr>
                                 @endforeach
                                </tbody>

                            </table>
                        </div>

               <a href="{{ route('admin_entradas.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Material</a>

                         <a href="{{ url('/admin_entradas') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Registros </a>
                    <br><br>
                <!--tabla 2-->
                 @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif
                @if(session()->has('msj2'))
                                    <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                                    @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>

                                        <th class="text-center">Material</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Cantidad de Cajas de Material</th>
                                        <th class="text-center">Cantidad de Unidades por Caja</th>
                                        <th class="text-center">Unidad</th>
                                        <th class="text-center">Proveedor</th>
                                        <th class="text-center">Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($detalleEntradas as $detalle)
                                    <tr>

                                        <td class="text-center">{{ $detalle->nombreTipoMaterial }}</td>
                                        <td class="text-center">
                                            <?php
                                            $newDate = date("d-m-Y", strtotime($detalle->fecha));
                                            print_r($newDate ); ?>
                                           </td>
                                        <td class="text-center">{{ $detalle->cantidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->cantidadUnidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->nombreTipoUnidad }}</td>
                                        <td class="text-center">{{ $detalle->proveedor }}</td>

                                        <td>

                                            <form method="GET" action="
                                            {{ route('borrarMaterialEntrada',[$detalle->idMaterial,$detalle->idEntrada]) }}" style='display: inline;'>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-trash"></span>Borrar</button></form>

                                        </td>

                                    </tr>
                                  @endforeach
                                </tbody>

                            </table>
                            {!! $detalleEntradas->render() !!}
                        </div>


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
