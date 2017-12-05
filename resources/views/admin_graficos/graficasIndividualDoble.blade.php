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
        data.addColumn('string', 'Departamentos');
        data.addColumn('number', '{{$number}}');
        data.addRows([
          @foreach($resultado1 as $resultado)
          ['Mayores de Edad', {{$resultado->conteo}}],
          @endforeach
          @foreach($resultado2 as $resultado)
          ['Menores de Edad', {{$resultado->conteo}}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'{{$titulo}}',
                       'width':1133,
                       'height':700};

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
                  <div>
                  <div class="table-responsive">
                     <table class="table table-striped table-hover table-bordered">
                       <thead>
                        <tr>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">{{$number}}</th>



                        </tr>
                      </thead>
                      <tbody>
                      @foreach($resultado1 as $resultado)

                      <TR><th class="text-center">Mayores de edad</TH>
                      <td class="text-center">{{$resultado->conteo}}</TD>
                        @endforeach
                        @foreach($resultado2 as $resultado)

                        <TR><th class="text-center">Menores de edad</TH>
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
