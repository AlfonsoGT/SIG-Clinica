@extends('layouts.app')
@section('content')
@can('generar_graficos')
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', '');
        data.addColumn('number', '{{$number}}');
        data.addRows([
          @foreach($resultados as $resultado)
          ['{{$resultado->titulo}}', {{$resultado->conteo}}],

          @endforeach
        ]);

        // Set chart options
        var options = {'title':'{{$titulo}}: {{$anio}}',
                       'width':1133,
                       'height':470};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <section>
       <div class="container" id="panelAdminRoles">
            <div class="row">
                <div class="panel panel-default">

                  <div class="panel-heading">Datos Estadisticos</div>
                  <div class="table-responsive">
                    <form class="form-horizontal" role="form" method="GET" action="{{ url('/graficaExamenesRealizadosRegionAnatomica') }}">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                      <table class="table table-striped table-hover table-bordered">

                        <tr>

                          <td>Generar Gráficos del año:
                            <input id="A1" type="text"  size="20" name="A1" value="" required autocomplete="off" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">

                          </span>

                          <button type="submit" class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-floppy-disk"></span>Generar Gráfico
                          </button>
                        </td>

                      </tr>

                    </table>
                  </form>
                  <div class="table-responsive">
                  	 <table class="table table-striped table-hover table-bordered">
                       <thead>
       									<tr>
       										<th class="text-center">{{$ejex}}</th>
       										<th class="text-center">{{$number}}</th>



       									</tr>
       								</thead>
                      <tbody>
                  		@foreach($resultados as $resultado)

                  		<TR><th class="text-center">{{$resultado->titulo}}</TH>
                  		<td class="text-center">{{$resultado->conteo}}</TD>
                        @endforeach
                      </tbody>
                  	</table>
                  </div>
                </div>

          <!--BUSCADOR DE PACIENTES-->
                    <br><br>
                    <div class="panel-body">
                      <h1 style="display: inline;">Gráfico de Barras</h1>
                        <div align="center" id="chart_div">

                        </div>
                    </div>

                    <div class="panel-body">
                      <h1 style="display: inline;">Gráfico de Pastel</h1>
                        <div align="center" id="chart_div2">

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
  </body>
</html>
@endsection
