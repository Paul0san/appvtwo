<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logovtwo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> V two<span class="font-medium"> logistics</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
        @switch(Auth::user())
            @case(Auth::user()->hasRole('Admin'))
            <ul>
                <li>
                    <a href="/panel" class="side-menu {{ request()->is('panel') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Panel </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*')||request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                        <div class="side-menu__title">
                            Ordenes
                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/ordenesNA" class="side-menu {{ request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="user-x"></i> </div>
                                <div class="side-menu__title"> No asignadas </div>
                            </a>
                        </li>
                        <li>
                            <a href="/ordenesA" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                <div class="side-menu__title"> Asignadas </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/operadores" class="side-menu {{ request()->is('operadores')||request()->is('operadores/create')||request()->is('operadores/*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Operadores </div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
                        <div class="side-menu__title"> Reportes </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="tool"></i> </div>
                        <div class="side-menu__title">
                            Herramientas de administrador
                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="git-pull-request"></i> </div>
                                <div class="side-menu__title"> Roles </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                                <div class="side-menu__title"> Permisos </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-dashboard.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                                <div class="side-menu__title"> Usuarios </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
                @break

            @case(Auth::user()->hasRole('Gerente'))
                <ul>
                    <li>
                        <a href="/panel" class="side-menu {{ request()->is('panel') ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Panel </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*')||request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                            <div class="side-menu__title">
                                Ordenes
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="/ordenesNA" class="side-menu {{ request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="user-x"></i> </div>
                                    <div class="side-menu__title"> No asignadas </div>
                                </a>
                            </li>
                            <li>
                                <a href="/ordenesA" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                    <div class="side-menu__title"> Asignadas </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/operadores" class="side-menu {{ request()->is('operadores')||request()->is('operadores/create')||request()->is('operadores/*') ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title"> Operadores </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="side-menu side-menu">
                            <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
                            <div class="side-menu__title"> Reportes </div>
                        </a>
                    </li>
                </ul>
                    @break
                    @case(Auth::user()->hasRole('Driver'))
                    <ul>
                        <li>
                            <a href="/panel" class="side-menu {{ request()->is('panel') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                                <div class="side-menu__title"> Panel </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*')||request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                                <div class="side-menu__title">
                                    Ordenes
                                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="/ordenesNA" class="side-menu {{ request()->is('ordenesNA')||request()->is('ordenesNA/create')||request()->is('ordenesNA/*') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon"> <i data-feather="user-x"></i> </div>
                                        <div class="side-menu__title"> No asignadas </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/ordenesA" class="side-menu {{ request()->is('ordenesA')||request()->is('ordenesA/create')||request()->is('ordenesA/*') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                        <div class="side-menu__title"> Asignadas </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" class="side-menu side-menu">
                                <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
                                <div class="side-menu__title"> Reportes </div>
                            </a>
                        </li>
                    </ul>
                        @break
            @default

        @endswitch

</nav>
<!-- END: Side Menu -->
