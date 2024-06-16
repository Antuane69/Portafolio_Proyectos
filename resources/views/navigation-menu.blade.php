<style>
    /* since nested groupes are not supported we have to use
    regular css for the nested dropdowns
    */
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
        background-color: #F9F904;
        z-index: 50;
    }

    .MENU a:visited {
        text-decoration: none;
        color: black;
        background-color: #F9F904;
        z-index: 50;
    }

    .MENU a:hover {
        text-decoration: none;
        color: black;
        background-color: #F9F904;
        z-index: 50;
    }

    .MENU a:active {
        text-decoration: none;
        color: black;
        background-color: #F9F904;;
        z-index: 50;
    }
</style>
<nav x-data="{ open: false }" class="border-b border-gray-100" style="background-color: #1C0B49">
    <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('assets/PixelPerfectWeb.png')}}" class="block h-12 w-auto mr-10" alt="">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="MENU">
                    <div class="hidden space-x-8 sm:flex sm:items-center sm:ml-1 justify-between h-16">
                        <div class="group inline-block items-center ml-3" align="left" width="30">
                            <button class="px-1 py-1 rounded-sm flex items-center min-w-32" style="font-weight: 600;color:white;font-size:20px">
                                Proyectos
                            </button>
                        </div>
                        <div class="group inline-block items-center ml-1" align="left" width="30">
                            <button class="px-1 py-1 rounded-sm flex items-center min-w-32" style="font-weight: 600;color:white;font-size:20px">
                                Solicitar Servicio
                            </button>
                        </div>
                        <div class="group inline-block items-center ml-6" align="left" width="30">
                            <button class="px-1 py-1 rounded-sm flex items-center min-w-32" style="font-weight: 600;color:white;font-size:20px">
                                Más Información
                            </button>
                        </div>

                        <div class="group items-center inline-block" width="30" style="margin-left:320px">
                            <button class="px-1 py-1 rounded-sm flex items-center min-w-32" style="font-weight: 600;color:white;font-size:20px">
                                Descargar CV
                            </button>
                        </div>
                        {{-- <div class="group inline-block items-center ml-3" align="left" width="30">
                            <button
                                class="outline-none focus:outline-none px-1 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1">Empleados</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute                                
                                transition duration-150 ease-in-out origin-top min-w-32">
                                <a href="{{ route('empleadosInicio.show') }}">
                                    <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                </a>
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button
                                        class="w-full text-left flex items-center outline-none focus:outline-none text-black">
                                        <span class="pr-1 flex-1">Vacaciones</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                    transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>

                                    <ul class="bg-white border rounded-sm absolute top-0 right-0
                                    transition duration-150 ease-in-out origin-top-left
                                    min-w-32">
                                    <a href="{{ route('crearVacacion.create') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Registrar Vacaciones</li>
                                    </a>
                                    <a href="{{ route('mostrarVacaciones.show') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Ver Vacaciones Registradas</li>
                                    </a>
                                    </ul>
                                </li>
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button
                                        class="w-full text-left flex items-center outline-none focus:outline-none text-black">
                                        <span class="pr-1 flex-1">Permisos</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                    transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>

                                    <ul class="bg-white border rounded-sm absolute top-0 right-0
                                    transition duration-150 ease-in-out origin-top-left
                                    min-w-32">
                                    <a href="{{ route('crearPermisos.create') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Registrar Permisos</li>
                                    </a>
                                    <a href="{{ route('mostrarPermisos.show') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Ver Registros de Permisos</li>
                                    </a>
                                    </ul>
                                </li>
                            </ul>
                        </div> --}}                   
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