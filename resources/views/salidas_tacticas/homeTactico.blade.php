@extends('layouts.app')

@section('content')

<section>
    <div class="container" id="panelAdminTactica">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Administración Táctica</div>

                <div class="panel-body">
                @if(session()->has('msj'))
                <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                @endif
                    <h2 style="display: inline;">Opciones Tácticas</h2>
                    <br>
                    <br>
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/costos_insumos') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Costos de insumos de la clinica</a></div>
                    <br>
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/ganancias_examenes') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Ganancias de examenes realizados en la clinica</a></div>
                    <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/inventario_materiales') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Inventario de materiales en la clinica</a></div>
                        <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/pacientes_departamento') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Pacientes atendidos en la clinica por departamento</a></div> 
                         <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/presupuesto') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Presupuesto de la clinica</a></div>
                        <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_tacticas/reservacion_citas') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Reservaciones de citas de la clinica</a></div>       
                </div>
            </div>
        </div>

    </div>
    
</section>


@endsection
