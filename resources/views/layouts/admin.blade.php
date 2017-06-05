<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISTEMA DE RADIOLOGIA</title>
    <!-- Styles -->
    <link href="{{('css/bootstrap.css') }}" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="{{ ('css/customAdmin.css')}}" rel="stylesheet" />
    <link href="{{ ('css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<section>
    @include('modulos.cabecera')
</section>
<section>
    @yield('content')
</section>
<div class="footer">
    <div class="row">
        <div class="col-lg-12" >
            &copy;  2017 Diseño de Sistema I| Design by: <a href="" style="color:#fff;" target="_blank">Clinica de Radiologia e Imagenes</a>
        </div>
    </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ ('js/jquery-1.10.2.js ')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src=" {{ ('js/bootstrap.min.js')}}"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ ('js/customAdmin.js  ')}}"></script>
</body>
</html>