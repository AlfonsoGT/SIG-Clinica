@extends('layouts.app')

@section('content')
@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">{{session('msj')}}</div>
@endif
@if(session()->has('msj2'))
    <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
@endif
    <section>
        <div class="container" id="panelAdminRoles">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Administración de Citas</div>
                    <div class="panel-body">
                        <h1 style="display: inline;">Gestionar Citas</h1>
                        <a href="{{ route('admin_citas.create')}}" class="btn btn-primary btn-sm">Ingresar Nueva Cita</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>

                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tipo de Examen</th>
                                    <th class="text-center">Hora de Cita</th>
                                    <th class="text-center">Fecha de Cita</th>
                                    <th class="text-center">Cantidad de Reservaciones</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($citas as $cita)
                                    <tr>
                                        <td class="text-center">{{ $cita->idCita}}</td>
                                        <td class="text-center">{{ $cita->nombreTipoExamen}}</td>
                                        <td class="text-center"> {{ $cita->horaCita }} </td>
                                        <td class="text-center"> {{ $cita->fechaCita }} </td>
                                        <td class="text-center">
                                        <?php
                                        for($i=0; $i < $preliminar; $i++){
                                            $datos=[];
                                            $cero=0;
                                            $datos = json_decode($cantidad[$i],true);
                                            foreach ($datos as $dato) {
                                                if($dato['idCita']== $cita->idCita){
                                                    if($dato['conteo'] == 0)
                                                       intval($cero);
                                                    else
                                                        print_r($dato['conteo']);

                                                }
                                            }
                                        }

                                        ?>
                                        </td>
                                        <td>
                                        @if( $cita->habilitado == 1)
                                            <a href="{{ route('admin_citas.edit',$cita->idCita) }}" class="btn btn-info btn-sm" id= 'BotonEditar' name="BotonEditar">Editar</a>
                                             <a href="{{ route('admin_citas.show',$cita->idCita) }}" class="btn btn-success btn-sm">Ver</a>
                                        @else
                                         <a href="{{ route('admin_citas.show',$cita->idCita) }}" class="btn btn-success btn-sm">Ver</a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $citas->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
