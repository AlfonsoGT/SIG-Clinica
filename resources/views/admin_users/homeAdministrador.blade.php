@extends('layouts.app')

@section('content')
<section>
<div class="alert alert-info">
<strong>Bienvenido al Sistema de la Clinica </strong>Indicaciones para {{ Auth::user()->name }}
</div>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-12" style="background-color:	#F0F8FF ">
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 93px;">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img src="{{ asset('img/user.png')}}" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text_manejo">Los Permisos</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>{{ Auth::user()->name }} le damos la bienvenida al sistema para la Clinica de Radiologia&nbsp;<br>Puede Editar su Información Personal en el siguiente Boton</p>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-buttons mbr-buttons--center"><a href="{{ route('admin_users.show',Auth::user()->id) }}"" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">Mi Perfil</a></div>
                </div>
            </div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img src="{{ asset('img/user2.png')}}" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text_manejo">Permisos Asignados a {{ Auth::user()->name }} </h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-article mbr-article--wysiwyg">
                        @can('control_pacientes')
                        <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/admin_pacientes') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Gestión de Expedientes</a></div>
                        <br>
                        @endcan
                        @can('control_citas')
                        <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/admin_citas') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Gestión de Citas</a></div>
                        <br>
                        @endcan
                        @can('control_usuarios')
                        <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/admin_users') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Gestión de Usuarios</a></div>
                        <br>
                        @endcan
                        @can('control_roles')
                        <div class="mbr-buttons mbr-buttons--center"><a href="{{ url('/admin_roles') }}" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">
                        <span class="glyphicon glyphicon-list-alt"></span>Gestión de Roles</a></div>
                        <br>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img src="{{ asset('img/radio.png')}}" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text_manejo">Objetivo del Sistema</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>Nuestro Sistema Espera ayudar con la administración desde guardar los datos del paciente con sus respectivos examenes, eliminado el papeleo excesivo</p>
                    </div>
                </div>
            </div>
            
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img src="{{ asset('img/ues.png')}}" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text_manejo">Clinica Radiologia </h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>Bienvenido a su portal&nbsp;</p>
                    </div>
                </div>
            </div>
            </div>
 </div>
 </section>
 </section>
<!-- /. PAGE WRAPPER  -->
@endsection
