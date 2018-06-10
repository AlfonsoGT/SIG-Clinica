@extends('layouts.app')

@section('content')

<section>
    <div class="container" id="panelAdminPacientes">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Administración Estratégica</div>

                <div class="panel-body">
                @if(session()->has('msj'))
                <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                @endif
                    <h2 style="display: inline;">Opciones Estratégicas</h2>
                    <br>
                    <br>
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_estrategicas/porcentaje_pacientes') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Porcentaje de pacientes registrados en la clinica</a></div>
                    <br>
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_estrategicas/numero_pacientes') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Numero de pacientes registrados en la clinica</a></div>
                    <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_estrategicas/cantidad_tipoExamen') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Numero de tipos de examen</a></div>
                        <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_estrategicas/cantidad_insumos') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Numero de insumos adquiridos</a></div> 
                         <br>    
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/salidas_estrategicas/cantidad_patologias') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Numero de patologias por tipo de examen</a></div>       
                </div>
            </div>
        </div>

    </div>
    
</section>


@endsection
