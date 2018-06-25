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
         <br>
         <h2 style="display: inline;">CANTIDAD DE PATOLOGIAS POR TIPOS DE EXAMEN</h2>

        <p class="izq"><B>Torax:</B>   {{ $torax }}</p>
        <p class="izq"><B>Abdomen:</B>   {{ $abdomen }}</p>
        <p class="text-center"><B>Ovarios:</B>   {{$ovarios}}</p>
        <p class="text-center"><B>Utero:</B>   {{$utero}}</p>
        <p class="text-center"><B>Cuello:</B>   {{$cuello}}</p>
        <p class="text-center"><B>Hombro:</B>   {{$hombro}}</p>
        <p class="text-center"><B>Brazo:</B>   {{$brazo}}</p>
        <p class="text-center"><B>Codo:</B>   {{$codo}}</p>
        <p class="text-center"><B>Antebrazo:</B>   {{$antebrazo}}</p>
        <p class="text-center"><B>Muñeca:</B>   {{$muñeca}}</p>
        <p class="text-center"><B>Mano:</B>   {{$mano}}</p>
        <p class="text-center"><B>Gluteo:</B>   {{$gluteo}}</p>
        <p class="text-center"><B>Muslo:</B>   {{$muslo}}</p>
        <p class="text-center"><B>Rodilla:</B>   {{$rodilla}}</p>
        <p class="text-center"><B>Pierna:</B>   {{$pierna}}</p>
        <p class="text-center"><B>Tobillo:</B>   {{$tobillo}}</p>
        <p class="text-center"><B>Pie:</B>   {{$pie}}</p>
        <p class="text-center"><B>Cabeza:</B>   {{$cabeza}}</p>
        
   </div>
</body>
</html>
