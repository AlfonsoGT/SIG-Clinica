@extends('layouts.app')

@section('content')
<section>
  @can('generar_graficos')
  <div class="alert alert-info">
    <strong>Lista de Gráficos</strong>
  </div>

  <div class="container" id="panelAdminGraficos">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">Administración de Gráficos</div>
        <div class="panel-body">

          <h1 style="display: inline;">Area de Gráficos</h1>
          <br><br>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>

                  <th class="text-center">Nombre de gráfico</th>

                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">Gráfica de reservaciones hechas en el día por Región Anatómica</td>
                  <td>
                    <a href="{{ url('/graficaRegionAnatomica') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center">Gráfica de pacientes registrados por departamento</td>
                  <td>
                    <a href="{{ url('/graficaPacientesDepartamento') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center">Gráfica de pacientes registrados por sexo</td>
                  <td>
                    <a href="{{ url('/graficaPacientesPorSexo') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">Gráfica de total examenes realizados por región anatómica en el año</td>
                  <td>
                    <a href="{{ url('/graficaExamenesRealizadosRegionAnatomica') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                  </td>
                </tr>
                <tr>
                    <td class="text-center">Gráfica de total de examenes realizados en uno o más años</td>
                    <td>
                        <a href="{{ url('/graficaExamenesTotalEntre') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Gráfica de examenes realizados diarios por región anatómica</td>
                    <td>
                        <a href="{{ url('/graficaExamenesRealizadosRegionAnatomicaDiario') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Gráfica de pacientes registrados, mayores y menores de edad</td>
                    <td>
                        <a href="{{ url('/graficoEdades') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Gráfica de examenes registrados con patologías</td>
                    <td>
                        <a href="{{ url('/graficoPatologico') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Generar Gráfico</a>
                    </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@else
<div class="alert alert-danger">
  <strong>NO ESTÁ AUTORIZADO PARA VER ESTA PANTALLA </strong>
</div>
@endcan
</section>
@endsection
