@extends('layouts.app')

@section('content')
	@can('ingreso_material_salida')
    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Administración de Inventario de Materiales</div>
                    <div class="panel-body">
                        @if(session()->has('msj2'))
                        <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                        @endif

                        <h2 style="display: inline;">Gestionar Materiales</h2>

                        <a href="{{ route('admin_salidas.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Ingresar Uso de Material</a>
                        <br><br>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>


                                    <th class="text-center">Mes</th>
                                    <th class="text-center">Encargado</th>
                                    <th class="text-center">Cantidad de Placas</th>
                                    <th class="text-center">Cantidad de Revelador</th>
                                    <th class="text-center">Cantidad de Fijador</th>
                                   <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($salidas as $salida)
                                    <tr>

                                        <td class="text-center">
                                           {{$salida->fecha }}
                                            </td>
                                        <td class="text-center">  {{ $salida->username}}</td>
                                         <td class="text-center">
                                        <?php
                                        for($i=0; $i < $salidasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idSalida']== $salida->idSalida and $dato['idTipoMaterial']== 1){
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
                                        for($i=0; $i < $salidasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idSalida']== $salida->idSalida and $dato['idTipoMaterial']== 2){
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
                                        for($i=0; $i < $salidasConteo; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($sumaTotal[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idSalida']== $salida->idSalida and $dato['idTipoMaterial']== 3){
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
                                        <a href="{{ route('admin_salidas.show',$salida->idSalida) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Detalle </a>

                                        </td>
                                    </tr>
                               @endforeach
                                </tbody>
                            </table>
                           {!! $salidas->render() !!}
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
