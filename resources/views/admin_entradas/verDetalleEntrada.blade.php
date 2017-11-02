@extends('layouts.app')

@section('content')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Detalle de Materiales Comprados en el año</div>
                    <div class="panel-body">
                       

                        <h2 style="display: inline;">Detalle de Materiales Comprados</h2>
                   
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
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Cajas de Placas de 6 1/2</th>
                                <th class="text-center">Cajas de Placas de 8 x 10</th>
                                <th class="text-center">Cajas de Placas de 10 x 12</th>
                                <th class="text-center">Cajas de Placas de 11 x 14</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                
                                <td class="text-center">  
                                @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 1)
                                {{ $suma->cantidadUnidad }}
                                  
                                 @endif 
                                @endforeach
                                </td>
                                <td class="text-center">
                                 @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 2)
                                {{ $suma->cantidadUnidad }}
                                   
                                 @endif 
                                @endforeach
                                </td>
                                <td class="text-center">
                                @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 3)
                                {{ $suma->cantidadUnidad }}
                                   
                                 @endif 
                                @endforeach
                                 
                                </td>
                                <td class="text-center">
                                @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 4)
                                {{ $suma->cantidadUnidad }}
                                   
                                 @endif 
                                @endforeach
                                </td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Cajas de Revelador</th>
                                <th class="text-center">Cajas de  Fijador</th>
                                <th class="text-center">Cajas de Placas de 14 x 14</th>
                                <th class="text-center">Cajas de Placas de 14 x 17</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                
                                <td class="text-center">
                                 @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 6)
                                {{ $suma->cantidadUnidad }}
                                  
                                 @endif 
                                @endforeach
                                </td>
                                <td class="text-center">
                               @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 7)
                                {{ $suma->cantidadUnidad }}
                                  
                                 @endif 
                                @endforeach
                                </td>
                                <td class="text-center">
                               @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 5)
                                {{ $suma->cantidadUnidad }}
                                  
                                 @endif 
                                @endforeach
                                </td>
                                <td class="text-center">
                               @foreach($sumaTotal as $suma)
                                @if($suma->idTipoUnidad == 8)
                                {{ $suma->cantidadUnidad }}
                                  
                                 @endif 
                                @endforeach
                                </td>
                            </tr>
                            
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
                                        <td class="text-center">{{ $detalle->fecha }}</td>
                                        <td class="text-center">{{ $detalle->cantidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->cantidadUnidadMaterial }}</td>
                                        <td class="text-center">{{ $detalle->nombreTipoUnidad }}</td>
                                        <td class="text-center">{{ $detalle->proveedor }}</td>
                                       
                                        <td>
                                            
                                            <form method="GET" action="/borrarMaterialEntrada/{{$detalle->idMaterial}},{{$detalle->idEntrada}}" style='display: inline;'>
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
       
    </section>
@endsection
