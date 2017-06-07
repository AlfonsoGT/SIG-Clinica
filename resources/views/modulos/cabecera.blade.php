<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-9">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><img src="{{ ('img/logo1.png')}}" class="mbr-navbar__brand-img mbr-brand__img" ></span>
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
                            <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('register') }}">REGISTRESE</a></li></ul>                            
                             @else
                              <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="">VER EXPEDIENTE</a></li>  
                              <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="">INGRESAR PACIENTE</a></li>  
                             <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SALIR</a></li>
                             <li class="mbr-navbar__item"><a href="{{ url('/home') }}" class="mbr-buttons__link btn text-white"  aria-expanded="false"> {{ Auth::user()->name }} </a></li>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endif                          
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

