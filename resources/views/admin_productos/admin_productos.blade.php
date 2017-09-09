@extends('layouts.app')

@section('content')

    <section>
        <div class="container" id="panelAdminProductos">
            <div class="row">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Administración de Productos</div>
                    <div class="panel-body">
                        @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                        @endif

                        <h2 style="display: inline;">Gestionar Productos</h2>
                        
                        <a href="{{ route('admin_productos.create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-paperclip"></span>Nuevo Registro de Producto</a>
                        <br><br>
                    @if(count($productos)>0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>

                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tipo de Producto</th>
                                    <th class="text-center">Cantidad del Producto</th>
                                    <th class="text-center">Fecha de Compra</th>
                                   <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->idProducto }}</td>
                                        <td class="text-center">{{ $producto->nombreTipoProducto }}</td>
                                         <td class="text-center"> {{ $producto->cantidadProducto }} </td>
                                          <td class="text-center"> {{ $producto->fechaCompra }} </td>
                                        <td>
                                        @if( $producto->reciente == 1)
                                            <a href="{{ route('admin_productos.edit',$producto->idProducto) }}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-pencil"></span>Editar Ingreso </a>
                                             <a href="{{ route('admin_productos.show',$producto->idProducto) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Detalle </a>
                                        @else
                                                <a class="btn btn-info btn-sm" id="inhabilitado" ><span class="glyphicon glyphicon-pencil"></span>Editar Ingreso </a>
                                                <a href="{{ route('admin_productos.show',$producto->idProducto) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Detalle </a>
                                                >
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $productos->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="alert alert-warning">
                            <strong>No hay Registros de Productos</strong>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
    </section>
@endsection
