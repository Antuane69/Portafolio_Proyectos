<style>
    nav.sticky-nav {
        position: -webkit-sticky; /* Para navegadores Safari */
        position: sticky;
        top: 0;
        z-index: 1000; /* Para asegurarse de que la navegación esté por encima de otros elementos */
    }
    .MENU li>ul {
        transform: translatex(100%) scale(0);
        z-index: 50;
    }

    .MENU li:hover>ul {
        transform: translatex(101%) scale(1);
        z-index: 50;
    }

    .MENU li>button svg {
        transform: rotate(-90deg);
        z-index: 50;
    }

    .MENU li:hover>button svg {
        transform: rotate(-270deg);
        z-index: 50;
    }

    .MENU .group:hover .group-hover\:scale-100 {
        transform: scale(1);
        z-index: 50;
    }

    .MENU .group:hover .group-hover\:-rotate-180 {
        transform: rotate(180deg);
        z-index: 50;
    }

    .MENU .scale-0 {
        transform: scale(0);
        z-index: 50;
    }

    .MENU .min-w-32 {
        min-width: 8rem;
        z-index: 50;
    }

    .MENU a:link {
        text-decoration: none;
        color: black;
        z-index: 50;
    }

    .MENU a:visited {
        text-decoration: none;
        color: black;
        z-index: 50;
    }

    .MENU a:hover {
        text-decoration: none;
        color: black;
        z-index: 50;
    }

    .MENU a:active {
        text-decoration: none;
        color: black;
        z-index: 50;
    }
    .text{
        text-shadow: 
            -1px -1px 0 #000,  
            1px -1px 0 #000,
            -1px 1px 0 #000,
            1px 1px 0 #000;
    }
    .lineaNav .lineaNav-foot {
        width:0%;
        margin: 0 auto;
        transition: width 0.2s ease-in;
        border-top:2px solid white;
    }

    .lineaNav:hover .lineaNav-foot{
        width: 90%;
    }
    .lineaNav2 .lineaNav2-foot {
        width:0%;
        margin: 0 auto;
        transition: width 0.2s ease-in;
        border-top:2px solid white;
    }

    .lineaNav2:hover .lineaNav2-foot{
        width: 76%;
    }

    .no-wrap {
        white-space: nowrap;
    }
</style>

<nav x-data="{ open: false }" class="sticky-nav" style="background-color: #1C0B49;border-bottom-width:2px; border-color:#120631">
    <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('assets/PixelPerfectWeb.png')}}" style="border-radius: 4px" class="block h-12 w-auto mr-10" alt="">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="MENU">
                    <div class="hidden space-x-8 sm:flex sm:items-center sm:ml-1 justify-between h-16">
                        <div class="lineaNav2 group inline-block items-center ml-1" align="left" width="40">
                            <a href="{{ route('proyectos') }}" class="px-1 py-1 rounded-sm flex items-center min-w-32 no-wrap" style="font-weight: 600;color:white;font-size:20px;background:none;">
                                <span class="pr-1 font-semibold flex-1">Proyectos</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </a>
                            <ul class="border rounded-md transform scale-0 group-hover:scale-100 absolute
                            transition duration-150 ease-in-out origin-top" style="min-width:100px;font-size:16px;background-color:white;color:#1C0B49;min-width:130px;font-weight:600">
                                <a href="{{ route('proyectos') }}">
                                    <li class="px-2 py-1.5 flex items-center" style="border-bottom: 1px solid #1C0B49;transition: color 0.1s linear, background-color 0.1s linear;"
                                    onmouseover="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1C0B49';"
                                    >Proyectos Pendientes</li>
                                </a>
                                <a href="{{ route('proyectos') }}">
                                    <li class="px-2 py-1.5 flex items-center" style="transition: color 0.1s linear, background-color 0.1s linear"
                                    onmouseover="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1C0B49';"
                                    >Mis Proyectos</li>
                                </a>
                            </ul>
                        </div>
                        <div class="lineaNav group inline-block items-center ml-4" align="left" width="40">
                            <a href=" @if(Route::currentRouteName() == 'dashboard') #section1 @else {{ route('dashboard') }}#section1 @endif " class="px-1 py-1 rounded-sm flex content-center text-center items-center min-w-32 no-wrap" style="font-weight: 600;color:white;font-size:20px;background:none;margin-top:2px">
                                <span class="pr-1 font-semibold flex-1">Solicitudes</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </a>
                            <ul class="border rounded-md transform scale-0 group-hover:scale-100 absolute
                            transition duration-150 ease-in-out origin-top" style="min-width:100px;font-size:16px;background-color:white;color:#1C0B49;min-width:130px;font-weight:600">
                                <a href=" @if(Route::currentRouteName() == 'dashboard') #section1 @else {{ route('dashboard') }}#section1 @endif ">
                                    <li class="px-2 py-1.5 flex items-center" style="border-bottom: 1px solid #1C0B49;transition: color 0.1s linear, background-color 0.1s linear;"
                                    onmouseover="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1C0B49';"
                                    >Solicitar una Cotización</li>
                                </a>
                                <a href="{{ route('proyectos') }}" >
                                    <li class="px-2 py-1.5 flex items-center" style="border-bottom: 1px solid #1C0B49;transition: color 0.1s linear, background-color 0.1s linear;"
                                    onmouseover="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1C0B49';"
                                    >Solicitar un Proyecto</li>
                                </a>
                                <a href="{{ route('proyectos') }}">
                                    <li class="px-2 py-1.5 flex items-center" style="transition: color 0.1s linear, background-color 0.1s linear"
                                    onmouseover="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1C0B49';"
                                    >Solicitudes Pendientes</li>
                                </a>
                            </ul>
                        </div>
                        <div class="lineaNav group inline-block items-center ml-4.5 mt-1" align="left" width="40">
                            <a href="{{ route('informacion') }}" class="px-1 py-1 rounded-sm flex items-center min-w-32 no-wrap" style="font-weight: 600;color:white;font-size:20px;background:none;">
                                Más Información
                            </a>
                            <div class="lineaNav-foot"></div>
                        </div>

                        <div class="lineaNav group items-center inline-block" width="40" style="margin-left:190px">
                            <a href="{{ route('informacion') }}" class="px-1 py-1 rounded-sm flex items-center min-w-32 no-wrap" style="font-weight: 600;font-size:20px;background:none;color:white" data-bs-toggle="modal" data-bs-target="#exampleModal_registrarme">
                                Registrarme
                            </a>
                            <div class="mr-1.5">
                                <div class="lineaNav-foot"></div>
                            </div>
                        </div>                
                        <div class="lineaNav group items-center inline-block" width="40" style="margin-left:15px">
                            <a href="{{ route('informacion') }}" class="px-1 py-1 rounded-sm flex items-center min-w-32 no-wrap" style="font-weight: 600;font-size:20px;background:none;color:white" data-bs-toggle="modal" data-bs-target="#exampleModal_iniciar">
                                Iniciar Sesión
                            </a>
                            <div class="lineaNav-foot"></div>
                        </div>                
                    </div>
                </div>
            </div>    

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>
    </div>
</nav>
