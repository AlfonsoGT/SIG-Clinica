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
     <hr size="4" color="black" />
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
    @foreach($lectura as $paciente)
      <p>
     <table class="table table-bordered">
        <tr>
          <th align="left"><h2>Nombre: {{$paciente->primerNombre}} {{$paciente->segundoNombre}} {{$paciente->primerApellido}} {{$paciente->segundoApellido}}</h2></th>
        </tr>
        <tr>  
          <th align="left"><h2>Sexo: {{$paciente->nombreSexo}}</h2></th>
          <th align="rightt"><h2>Edad: {{$paciente->nombreSexo}}</h2></th>
        </tr>
           <tr>  
          <th align="center"><h2>fecha:</h2></th>
        </tr>
        <tr>  
          <th align="left"><h2>Patologia: {{$paciente->patologia}}</h2></th>
        </tr>
        <tr>
          <th align="left"><h2>Tipo de Examen: {{$paciente->nombreTipoExamen}}</h2></th>
        </tr>
        <tr>
          <th align="left"><h2>Región Anatomica: {{$paciente->nombreRegionAnatomica}}</h2></th>
        </tr>
        <tr>  
          <th align="left"><h2>{{$paciente->descripcion}}</h2></th>
          </tr>
      </table>
    </p>
    @endforeach
   </div>
</body>
</html>
