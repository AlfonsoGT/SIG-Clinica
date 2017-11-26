<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -130px;
      right: 0px;
      height: 150px;
      background-color: white;
      text-align: center;

    }
    header h2{
      margin: 10px 0;
    }
    header h3{
      margin: 0 0 15px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 15px;
      border-bottom: 3px solid #CEBEBE;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer .izq {
      text-align: justify;
      color: blue;
    }
  </style>
</head>  
<body>
  <header>
    <img src="img/logoUesLectura.png" align="left" >
    <img src="img/logoClinicaLectura.jpg" align="right" >
    <h2>UNIVERSIDAD DE EL SALVADOR</h2>
    <h3>FACULTAD DE MEDICINA</h3>
    <h3>CLINICA DE IMAGENES Y RADIOLOGIA</h3>
     <hr size="4px" color="black" />
  </header>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              La Clínica de Radiología y ultrasonografia de la Facultad de Medicina de la
              Universidad de El Salvador brinda sus servicios al público en general, a precios
              económicos y con atención profesional , mayor información a los teléfonos: 2511-2000
              ext. 6042 y ext.6022; clínicaderx_ues@hotmail.com
            </p>
        </td>
       </tr>
    </table>
  </footer>
  <div id="content">
    @foreach($pacientes as $paciente)
    <!--@if(count($pacientes)< 2)-->
      <p>
     <table class="table table-bordered">
        <tr>
          <th align="left"><h3>Tipo de Examen:</h3></th>
          <td align="right">{{$paciente->nombreTipoExamen}}</td>
        </tr>
        <tr>
          <th align="left"><h3>Nombre del paciente:</h3></th>
          <td align="right">{{$paciente->primerNombre}} {{$paciente->segundoNombre}} {{$paciente->primerApellido}} {{$paciente->segundoApellido}}</td>
        </tr>
        <tr>  
          <th align="left"><h3>Sexo:</h3></th>
          <td align="right">{{$paciente->nombreSexo}} </td>
        </tr>
        <tr>  
          <th align="left"><h3>Patologia:</h3></th>
          <td align="right"></td>
        </tr>
        <tr>  
          <th align="left"><h3>Descripción:</h3></th>
          <td align="right"></td>
        </tr>
      </table>
    </p>
    <!--@endif-->
    @endforeach
   </div>
</body>
</html>