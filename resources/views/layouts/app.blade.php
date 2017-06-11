<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Sistema de Radiologia e Imagenes">
    <link rel="shortcut icon" href="{{ asset('img/clinica.png')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISTEMA DE RADIOLOGIA</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    {!!Html:: style('css/bootstrap.min.css')!!}
    {!!Html:: style('css/animate.min.css')!!}
    {!!Html:: style('css/style.css')!!}
    {!!Html:: style('css/mbr-additional.css')!!}

</head>
<body>
    <section>
        @include('modulos.cabecera')
    </section>
    <section class="engine"><a rel="external">Clinica de Radiologia e Imagenes</a></section><section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header4-6" style="background-image: url({{ ('img/fondo.png')}}");>
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-center mbr-after-navbar">
        @yield('content')
    </div>
</section>
<section>
    @include('modulos.pie')
</section>

</body>
</html>