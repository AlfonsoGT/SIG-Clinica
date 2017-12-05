@extends('layouts.app')

@section('content')
  @can('generar_graficos')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Adquisición de Material</div>
                    <div class="panel-body">
                        @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif

                        <h2 style="display: inline;">Gestionar Adquisición de Materiales</h2>

                        <a href="{{ route('admin_entradas.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Material</a>
                        <br><br>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>


                                    <th class="text-center">Año</th>
                                    <th class="text-center">Encargado</th>
                                    <th class="text-center">Cantidad de Cajas de Placas</th>
                                    <th class="text-center">Cantidad de Cajas de Fijador</th>
                                    <th class="text-center">Cantidad de Cajas de Revelador</th>
                                   <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($entradas as $entrada)
                                    <tr>

                                        <td class="text-center"> {{$entrada->año }}
                                            </td>
                                        <td class="text-center">  {{ $entrada->username}}</td>
                                         <td class="text-center">
                                        <?php
                                        for($i=0; $i < $entradasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idEntrada']== $entrada->idEntrada and $dato['idTipoMaterial']== 1){
                                                    if($dato['cantidadUnidad'] == 0)
                                                       intval($cero);
                                                    else
                                                        print_r($dato['cantidadUnidad']);

                                                }
                                            }
                                        }
                                        ?>
                                         </td>
                                          <td class="text-center">
                                        <?php
                                        for($i=0; $i < $entradasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idEntrada']== $entrada->idEntrada and $dato['idTipoMaterial']== 2){
                                                    if($dato['cantidadUnidad'] == 0)
                                                       intval($cero);
                                                    else
                                                        print_r($dato['cantidadUnidad']);

                                                }
                                            }
                                        }
                                        ?>
                                          </td>
                                          <td class="text-center">
                                           <?php
                                        for($i=0; $i < $entradasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idEntrada']== $entrada->idEntrada and $dato['idTipoMaterial']== 3){
                                                    if($dato['cantidadUnidad'] == 0)
                                                       intval($cero);
                                                    else
                                                        print_r($dato['cantidadUnidad']);

                                                }
                                            }
                                        }
                                        ?>

                                          </td>
                                        <td>
                                        <a href="{{ route('admin_entradas.show',$entrada->idEntrada) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Detalle </a>

                                        </td>
                                    </tr>
                               @endforeach
                                </tbody>
                            </table>
                           {!! $entradas->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </section>
    @else
    <div class="alert alert-danger">
      <strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
    </div>
    @endcan
@endsection
