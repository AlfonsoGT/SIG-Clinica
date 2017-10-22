@extends('layouts.app')

@section('content')
@can('control_citas')
    <section>
        <div class="container" id="panelAdminRoles">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Administración de Citas</div>

                    <div class="panel-body">
                    @if(session()->has('msj'))
                     <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                    @endif
                    @if(session()->has('msj2'))
                    <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                    @endif
                        <h1 style="display: inline;">Gestionar Citas</h1>
                        <!--BUSCADOR DE PACIENTES-->
                    <br>
                    <div class="row" id="busquedaAvanzada">
                        {!! Form::open(['route' => 'admin_citas.index', 'method' =>'GET', 'class'=>'form-group']) !!}
                        <div class="input-group input-group-sm">
                            {!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar cita con Formato aaaa-mm-dd','autocomplete'=>'off']) !!}
                            <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>Buscar Cita</button>
                    </span>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <!--BUSCADOR DE PACIENTES-->
                    @if(count($citas)>0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>

                                    
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
                                        
                                        <td class="text-center">{{ $cita->nombreTipoExamen}}</td>
                                        <td class="text-center"> {{ $cita->horaCita }} </td>
                                        <td class="text-center"> <?php
                                        $newDate = date("d-m-Y", strtotime($cita->fechaCita));
                                        print_r($newDate ); ?></td>
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
                                            
                                             <a href="{{ route('admin_citas.show',$cita->idCita) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Cita</a>
                                             <form method="POST" action="{{ route('admin_citas.destroy', $cita->idCita) }} " style='display: inline;'>
                                            <!--<input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('está seguro que desea eliminar?')">
                                                <span class="glyphicon glyphicon-trash"></span>Borrar</button></form>-->
                                        @else
                                                
                                                <a href="{{ route('admin_citas.show',$cita->idCita) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Ver Cita</a>
                                                <!--<a class="btn btn-danger btn-sm" id="inhabilitado"><span class="glyphicon glyphicon-trash"></span>Borrar</a>-->
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
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            <strong>No se encuentra  Cita en esa fecha</strong>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @else
    <div class="alert alert-danger">
    <strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
    </div>
     @endcan
    </section>
@endsection
