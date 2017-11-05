@extends('layouts.app')

@section('content')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Detalle de Materiales Usados en el mes</div>
                    <div class="panel-body">
                       

                        <h2 style="display: inline;">Detalle de Usados Materiales</h2>
                   
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
               <a href="{{ route('admin_salidas.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Ingresar Uso de Material</a>
                        
                         <a href="{{ url('/admin_salidas') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Registros</a>
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
                                        <td class="text-center">  <?php
                                            $newDate = date("d-m-Y", strtotime($detalle->fecha));
                                            print_r($newDate ); ?></td>
                                        <td class="text-center">{{ $detalle->cantidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->nombreTipoUnidad }}</td>
                                       
                                        <td>
                                            
                                            <form method="GET" action="{{ route('vista_borrarMaterial',[$detalle->idMaterial,$detalle->idSalida]) }}" style='display: inline;'>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-trash"></span>Borrar</button></form>
                                         
                                        </td>
                                        
                                    </tr>
                                  @endforeach
                                </tbody>
                                
                            </table>
                            {!! $detalleSalidas->render() !!}
                        </div>
                        
                        
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
       
    </section>
@endsection
