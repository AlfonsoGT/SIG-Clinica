@extends('layouts.app')
@section('content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
            @foreach($resultados as $resultado)
          ['{{$resultado->titulo}}', {{$resultado->conteo}}, 0, 0],
          @endforeach


        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>

 <body>
    <!--Div that will hold the pie chart-->
    <section>
       <div class="container" id="panelAdmin">
            <div class="row">
                <div class="panel panel-default">

                  <div class="panel-heading">Datos Estadisticos</div>
                  <div class="panel-body">
                      <h1 style="display: inline;">Datos Estadisticos</h1>
                        <div align="center" id="columnchart_material" style="width: 800px; height: 500px;"></div>
                  </div>
                  </div>

                </div>
            </div>
        </div>

  </section>
  </body>
</html>
@endsection
