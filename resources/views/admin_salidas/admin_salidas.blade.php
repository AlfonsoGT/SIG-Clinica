@extends('layouts.app')

@section('content')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Administración de Inventario de Materiales</div>
                    <div class="panel-body">
                        @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif

                        <h2 style="display: inline;">Gestionar Materiales</h2>
                        
                        <a href="{{ route('admin_salidas.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Aperturar Inventario</a>
                        <br><br>
                   
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>

                                    
                                    <th class="text-center">Mes</th>
                                    <th class="text-center">Encargado</th>
                                    <th class="text-center">Cantidad de Placas</th>
                                    <th class="text-center">Cantidad de Set para Fijador</th>
                                    <th class="text-center">Cantidad de Set para Revelador</th>
                                   <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($salidas as $salida)
                                    <tr>
                                        
                                        <td class="text-center"> 
                                            <?php
                                         $newDate = date("m-Y", strtotime($salida->fecha ));
                                        print_r($newDate ); ?>
                                            </td>
                                        <td class="text-center">  {{ $salida->id}}</td>
                                         <td class="text-center">  </td>
                                          <td class="text-center">  </td>
                                          <td class="text-center">  </td>
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
@endsection
