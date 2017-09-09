<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-9">
  <div class="mbr-navbar__section mbr-section">
    <div class="mbr-section__container container">
      <div class="mbr-navbar__container">
        <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
          <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
            <a href="{{route ('homeAdministrador')}}"><span class="mbr-brand__logo"><img src="{{ asset('img/logo1.png')}}" class="mbr-navbar__brand-img mbr-brand__img" ></span></a>
            <span class="mbr-brand__name"><a class="mbr-brand__name text-white">ADMINISTRACIÓN DE CLINICA&nbsp;</a></span>
          </span>
        </div>
        <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
        <div class="mbr-navbar__column mbr-navbar__menu">
          <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
            <div class="mbr-navbar__column">
              <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links">
                @if (Auth::guest())
                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('login') }}">INICIAR SESIÓN</a></li>
                @else
                  @can('control_pacientes')
                <div class="mbr-navbar__item btn-group">
                <li class="mbr-navbar__item">
                  <button type="buttons" class="mbr-buttons__btn btn btn-info" data-toggle="dropdown" style="color: white;"> Gestión de Pacientes<span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" id="menup">
                    <li ><a class="mbr-buttons__link btn text-white" href="{{ route('admin_pacientes.index') }}">VER EXPEDIENTES</a></li>
                    <li ><a class="mbr-buttons__link btn text-white" href="{{ route('admin_pacientes.create') }}">INGRESAR EXPEDIENTES</a></li>
                  </ul>
                  </li>
                </div>
                @endcan


                @can('control_citas')
                <div class="mbr-navbar__item btn-group">
                <li class="mbr-navbar__item">
                  <button type="buttons" class="mbr-buttons__btn btn btn-info" data-toggle="dropdown" style="color: white;"> Gestión de Citas<span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" id="menup">
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('admin_citas.index') }}">VER TODAS LAS CITAS</a></li>
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('admin_citas.create') }}">CREAR NUEVA CITA</a></li>
                  </ul>
                  </li>
                </div>
                @endcan


                @can('control_usuarios')
                <div class="mbr-navbar__item btn-group">
                <li class="mbr-navbar__item">
                  <button type="buttons" class="mbr-buttons__btn btn btn-info" data-toggle="dropdown" style="color: white;"> Gestión de Usuarios<span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu"  id="menup">
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('admin_users.index') }}">VER USUARIOS</a></li>
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('admin_users.create') }}">CREAR USUARIOS</a></li>
                    @can('control_roles')
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('admin_roles.index') }}">GESTION DE ROLES</a></li>
                    @endcan
                  </ul>
                  </li>
                </div>
                @endcan


                <div class="mbr-navbar__item btn-group">
                <li class="mbr-navbar__item">
                  <button type="buttons" class="mbr-buttons__btn btn btn-info" data-toggle="dropdown" style="color: white;"> {{ Auth::user()->username }}<span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" id="menup">
                  <li class="mbr-navbar__item"><a href="{{ route('admin_users.show',Auth::user()->id) }}" class="mbr-buttons__link btn text-white"  aria-expanded="false"> VER MI PERFIL</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                    </form>
                    <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SALIR</a></li>
                  </ul>
                  </li>
                </div>




                @endif

              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
