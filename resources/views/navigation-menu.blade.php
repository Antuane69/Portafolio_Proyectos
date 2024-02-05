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

    /* Below styles fake what can be achieved with the tailwind config
    you need to add the group-hover variant to scale and define your custom
    min width style.
        See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
        for implementation with config file
    */
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
        background-color: white;
        z-index: 50;
    }

    .MENU a:visited {
        text-decoration: none;
        color: black;
        background-color: white;
        z-index: 50;
    }

    .MENU a:hover {
        text-decoration: none;
        color: black;
        background-color: white;
        z-index: 50;
    }

    .MENU a:active {
        text-decoration: none;
        color: black;
        background-color: white;
        z-index: 50;
    }
</style>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="MENU">
                    <div class="hidden space-x-8 sm:flex sm:items-center sm:ml-10 flex justify-between h-16">
                        <!-- Evidencia de cumplimiento-->
                        {{-- <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger"> --}}
                        {{-- <button
                                class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">

                                {{ __('EVIDENCIAS DE CUMPLIMIENTO') }}
                            </button> --}}
                        <!-- Control interno -->
                        <div class="group inline-block" align="left" width="48">
                            <button
                                class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1">Control interno</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                        transition duration-150 ease-in-out"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul
                                class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                transition duration-150 ease-in-out origin-top min-w-32">
                                <!-- Evidencias de cumplimiento -->
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">Evidencias de cumplimiento</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                        transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul
                                        class="bg-white border rounded-sm absolute top-0 right-0
                                        transition duration-150 ease-in-out origin-top-left
                                        min-w-32
                                        ">
                                        <a href="{{ route('evidencias.inicio') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                        </a>
                                        <a href="{{ route('evidencias.tablero') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Tablero</li>
                                        </a>
                                        @if (!@Auth::user()->hasRole('JefeInventario'))
                                            <a href="{{ route('evidencias.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Capturar Evidencias</li>
                                            </a>
                                            {{-- <x-jet-dropdown-link href="{{ route('evidencias.create') }}">
                                            {{ __('Capturar Evidencias') }}
                                        </x-jet-dropdown-link> --}}
                                        @endif
                                        <a href="{{ route('evidencias.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Mostrar evidencias</li>
                                        </a>
                                        <a href="{{ route('evidencias.reportes') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Mostrar Reportes</li>
                                        </a>
                                        <a href="{{ route('evidencias.crearSec') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Crear Sección</li>
                                        </a>
                                        <a href="{{ route('evidencias.mostrarSec') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Mostrar Secciones</li>
                                        </a>
                                        <a href="{{ route('evidencias.crearDoc') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Crear Documento de Evidencia</li>
                                        </a>
                                        <a href="{{ route('evidencias.mostrarDoc') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Mostrar Documentos</li>
                                        </a>
                                    </ul>
                                </li>
                                <!-- Usuarios -->
                                @can('users.index')
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                            <span class="pr-1 flex-1">Usuarios</span>
                                            <span class="mr-auto">
                                                <svg class="fill-current h-4 w-4
                                            transition duration-150 ease-in-out"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </span>
                                        </button>

                                        <ul
                                            class="bg-white border rounded-sm absolute top-0 right-0
                                            transition duration-150 ease-in-out origin-top-left
                                            min-w-32
                                            ">
                                            <a href="{{ route('users.inicio') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                            </a>
                                            <a href="{{ route('users.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Gestión</li>
                                            </a>
                                            <a href="{{ route('roles.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Roles</li>
                                            </a>
                                            @can('users.create')
                                                <a href="{{ route('users.create') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Crear</li>
                                                </a>
                                            @endcan
                                            @can('users.usuariosBaja')
                                                <a href="{{ route('users.usuariosBaja') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Baja</li>
                                                </a>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                        {{-- </x-slot>
                        <x-slot name="content"> --}}
                        {{-- <x-jet-dropdown-link href="{{ route('evidencias.inicio') }}">
                                {{ __('Inicio') }}
                            </x-jet-nav-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.tablero') }}">
                                {{ __('Tablero') }}
                            </x-jet-dropdown-link> --}}
                        {{-- @if (!@Auth::user()->hasRole('JefeInventario')) --}}
                        {{-- <x-jet-dropdown-link href="{{ route('evidencias.create') }}">
                                    {{ __('Capturar Evidencias') }}
                                </x-jet-dropdown-link> --}}
                        {{-- @endif --}}
                        {{-- <x-jet-dropdown-link href="{{ route('evidencias.index') }}">
                                {{ __('Mostrar Evidencias') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.reportes') }}">
                                {{ __('Mostrar Reportes') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.crearSec') }}">
                                {{ __('Crear Sección') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.mostrarSec') }}">
                                {{ __('Mostrar Secciones') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.crearDoc') }}">
                                {{ __('Crear Documento de Evidencia') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('evidencias.mostrarDoc') }}">
                                {{ __('Mostrar Documentos') }}
                            </x-jet-dropdown-link> --}}
                        {{-- </x-slot>
                    </x-jet-dropdown> --}}

                        {{-- <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger"> --}}
                        {{-- <button
                                class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                {{ __('RIJS') }}
                            </button> --}}
                        <!-- Recursos humanos -->
                        <div class="group inline-block" align="left" width="48">
                            <button
                                class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1">Recursos humanos</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                        transition duration-150 ease-in-out"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul
                                class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                transition duration-150 ease-in-out origin-top min-w-32">
                                <!-- SIVA -->
                                {{-- @can('feriados.create') --}}
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">SIVA</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                                transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul
                                        class="bg-white border rounded-sm absolute top-0 right-0
                                                transition duration-150 ease-in-out origin-top-left
                                                min-w-32
                                                ">
                                        <a href="{{ route('sivas.inicio') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                        </a>
                                        <a href="{{ route('solicitars.create') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Solicitar vacaciones</li>
                                        </a>
                                        <a href="{{ route('solicitars.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar vacaciones</li>
                                        </a>

                                        <a href="{{ route('solicitarfuera.create') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Solicitar vacaciones fuera de
                                                programa</li>
                                        </a>
                                        <a href="{{ route('solicitarfuera.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar vacaciones fuera de
                                                programa</li>
                                        </a>

                                        @can('solicitars.reportes')
                                            <a href="{{ route('solicitars.reporte') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Reporte vacaciones capturadas</li>
                                            </a>
                                        @endcan
                                        @can('feriados.create')
                                            <a href="{{ route('feriados.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Capturar dias festivos</li>
                                            </a>
                                        @endcan

                                        <a href="{{ route('feriados.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar dias festivos</li>
                                        </a>
                                        @can('cursos.create')
                                            <a href="{{ route('cursos.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Capturar cursos</li>
                                            </a>
                                        @endcan
                                        <a href="{{ route('cursos.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar cursos</li>
                                        </a>
                                        @can('solicitars.admin')
                                            <a href="{{ route('solicitars.reportes') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Reportes vacaciones</li>
                                            </a>
                                        @endcan
                                    </ul>
                                </li>
                                {{-- @endcan --}}
                                <!-- RIJS -->
                                @can('rijs.create')
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                            <span class="pr-1 flex-1">RIJS</span>
                                            <span class="mr-auto">
                                                <svg class="fill-current h-4 w-4
                                            transition duration-150 ease-in-out"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <ul
                                            class="bg-white border rounded-sm absolute top-0 right-0
                                            transition duration-150 ease-in-out origin-top-left
                                            min-w-32
                                            ">
                                            <a href="{{ route('rijs.inicio') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                            </a>
                                            <a href="{{ route('rijs.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Capturar RIJ</li>
                                            </a>
                                            <a href="{{ route('reportesRij.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Reportes RIJ</li>
                                            </a>
                                            @can('rijs.index')
                                                <a href="{{ route('rijs.index') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">RIJS Capturadas</li>
                                                </a>
                                            @endcan
                                        </ul>
                                </li>@endcan
                                <!-- Evaluación 5s-->
                                @can('evaluacion5s.index')
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                            <span class="pr-1 flex-1">EVALUACIÓN 5's</span>
                                            <span class="mr-auto">
                                                <svg class="fill-current h-4 w-4
                                                transition duration-150 ease-in-out"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <ul
                                            class="bg-white border rounded-sm absolute top-0 right-0
                                                transition duration-150 ease-in-out origin-top-left
                                                min-w-32
                                                ">
                                            <a href="{{ route('evaluacion5s.inicio') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                            </a>
                                            <a href="{{ route('evaluacion5s.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Capturar Evaluación 5's</li>
                                            </a>
                                            <a href="{{ route('reportesEv5.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Reportes Evaluación 5's</li>
                                            </a>
                                            <a href="{{ route('evaluacion5s.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Evaluación 5's Capturadas</li>
                                            </a>
                                        </ul>
                                    </li>
                                @endcan
                                <!-- Mi Salud -->
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">CFE-BIENESTAR</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                                transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul
                                        class="bg-white border rounded-sm absolute top-0 right-0
                                                transition duration-150 ease-in-out origin-top-left
                                                min-w-32
                                                ">
                                        <div class="border-t border-gray-100"></div>
                                        <a href="{{ route('salud.inicio') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                        </a>
                                        <a href="{{ route('datos.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Expedientes de usuarios</li>
                                        </a>
                                        @if (!@Auth::user()->hasRole('JefeInventario'))
                                            <a href="{{ route('datos.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Alta de usuario de Salud</li>
                                            </a>
                                        @endif
                                    </ul>
                                </li>
                                <!-- Inventarios -->
                                @can('inventarios')
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                            <span class="pr-1 flex-1">STOCK1</span>
                                            <span class="mr-auto">
                                                <svg class="fill-current h-4 w-4
                                                transition duration-150 ease-in-out"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <ul
                                            class="bg-white border rounded-sm absolute top-0 right-0
                                                transition duration-150 ease-in-out origin-top-left
                                                min-w-32
                                                ">
                                            <a href="{{ route('inventarios.inicio') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Inicio STOCK1</li>
                                            </a>

                                            <!--Inventario general-->
                                            @if (@Auth::user()->rpe == '9JJGM' || @Auth::user()->can('producto.TodosAlmacenes'))
                                                <a href="{{ route('productos.indexTotal') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Inventario General</li>
                                                </a>
                                            @endif
                                            @can('producto.crear')
                                                <a href="{{ route('productos.create') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Crear Producto</li>
                                                </a>
                                                <a href="{{ route('productos.index') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Consultar Productos</li>
                                                </a>
                                            @endcan
                                            @can('producto.existencias')
                                                {{-- <a href="{{ route('productos.indexI') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Agregar Existencias</li>
                                                </a> --}}
                                                <a href="{{ route('productos.eliminarExistenciasIndex') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Gestionar Existencias</li>
                                                </a>
                                            @endcan
                                            @can('inventarios.categoria')
                                                <a href="{{ route('categorias.create') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Crear Categoría</li>
                                                </a>
                                                <a href="{{ route('categorias.index') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Consultar Categorías</li>
                                                </a>
                                            @endcan
                                            <a href="{{ route('inventarios.create') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Solicitar Producto</li>
                                            </a>
                                            <a href="{{ route('inventarios.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Consultar Pedidos</li>
                                            </a>
                                            @can('inventarios.autorizar')
                                                <a href="{{ route('inventarios.autorizar') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Autorizar Pedidos</li>
                                                </a>
                                            @endcan
                                            @can('inventarios.entregar')
                                                <a href="{{ route('inventarios.entregar') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Entregar Pedidos</li>
                                                </a>
                                                <a href="{{ route('inventarios.entregados') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Pedidos Entregados</li>
                                                </a>
                                            @endcan
                                            @can('inventarios.almacenes')
                                                <a href="{{ route('almacenes.index') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Almacenes</li>
                                                </a>
                                            @endcan
                                            @can('inventarios.mermas')
                                                <a href="{{ route('mermas.index') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Mermas</li>
                                                </a>
                                                <a href="{{ route('mermas.indexHistorial') }}">
                                                    <li class="px-3 py-1 hover:bg-gray-100">Historial Mermas</li>
                                                </a>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                        {{-- </x-slot>

                        <x-slot name="content"> --}}
                        {{-- @can('rijs.create')
                                <x-jet-dropdown-link href="{{ route('rijs.inicio') }}" style="text-decoration: none">
                                    {{ __('Inicio') }}
                                    </x-jet-nav-link>
                                    <x-jet-dropdown-link href="{{ route('rijs.create') }}">
                                        {{ __('Capturar RIJ') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('reportesRij.index') }}">
                                        {{ __('Reportes RIJ') }}
                                    </x-jet-dropdown-link>
                                    @can('rijs.index')
                                        <x-jet-dropdown-link href="{{ route('rijs.index') }}">
                                            {{ __('RIJS Capturadas') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                            @endcan --}}

                        {{-- </x-slot>
                    </x-jet-dropdown> --}}


                        <!-- Evaluación 5s-->
                        {{-- @can('evaluacion5s.index')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    {{ __('EVALUACION 5\'s') }}
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-jet-dropdown-link href="{{ route('evaluacion5s.inicio') }}">
                                    {{ __('Inicio') }}
                                    </x-jet-nav-link>
                                    <x-jet-dropdown-link href="{{ route('evaluacion5s.create') }}">
                                        {{ __('Capturar Evaluacion 5\'s') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('reportesEv5.index') }}">
                                        {{ __('Reportes Evaluacion 5\'s') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('evaluacion5s.index') }}">
                                        {{ __('Evaluacion 5\'s Capturadas') }}
                                    </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endcan --}}

                        <!-- SIVA -->
                        {{-- @can('feriados.index')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    {{ __('SIVA') }}
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-jet-dropdown-link href="{{ route('sivas.inicio') }}">
                                    {{ __('Inicio') }}
                                    </x-jet-nav-link>
                                    <x-jet-dropdown-link href="{{ route('solicitars.create') }}">
                                        {{ __('Solicitar vacaciones') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('solicitars.index') }}">
                                        {{ __('Consultar vacaciones') }}
                                    </x-jet-dropdown-link>
                                    @can('feriados.create')
                                        <x-jet-dropdown-link href="{{ route('feriados.create') }}">
                                            {{ __('Capturar dias festivos') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                    <x-jet-dropdown-link href="{{ route('feriados.index') }}">
                                        {{ __('Consultar dias festivos') }}
                                    </x-jet-dropdown-link>
                                    @can('cursos.create')
                                        <x-jet-dropdown-link href="{{ route('cursos.create') }}">
                                            {{ __('Capturar cursos') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                    <x-jet-dropdown-link href="{{ route('cursos.index') }}">
                                        {{ __('Consultar cursos') }}

                                    </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endcan --}}

                        <!-- Mi Salud -->
                        {{-- <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">

                                {{ __('CFE-BIENESTAR') }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('salud.inicio') }}">
                                {{ __('Inicio') }}

                                </x-jet-nav-link>
                                <x-jet-dropdown-link href="{{ route('datos.index') }}">
                                    {{ __('Expedientes de usuarios') }}
                                </x-jet-dropdown-link>
                                @if (!@Auth::user()->hasRole('JefeInventario'))
                                <x-jet-dropdown-link href="{{ route('datos.create') }}">
                                    {{ __('Alta de usuario de Salud') }}
                                </x-jet-dropdown-link>
                                @endif
                                <div class="border-t border-gray-100"></div>

                        </x-slot>
                    </x-jet-dropdown> --}}

                        <!-- Inventarios -->
                        {{-- @can('inventarios')
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                {{ __('STOCK1') }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('inventarios.inicio') }}">
                                {{ __('INICIO STOCK1') }}
                            </x-jet-dropdown-link>

                            <!--Inventario general-->
                            @if (@Auth::user()->rpe == '9JJGM' || @Auth::user()->can('producto.TodosAlmacenes'))
                                <x-jet-dropdown-link href="{{ route('productos.indexTotal') }}">
                                    {{ __('Inventario General') }}
                                </x-jet-dropdown-link>
                            @endif
                            @can('producto.crear')
                                    <x-jet-dropdown-link href="{{ route('productos.create') }}">
                                        {{ __('Crear Producto') }}
                                    </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('productos.index') }}">
                                    {{ __('Consultar Productos') }}
                                </x-jet-dropdown-link>
                            @endcan
                            @can('producto.existencias')
                                <x-jet-dropdown-link href="{{ route('productos.indexI') }}">
                                    {{ __('Agregar Existencias') }}
                                </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('productos.eliminarExistenciasIndex') }}">
                                {{ __('Quitar Existencias') }}
                            </x-jet-dropdown-link>
                            @endcan
                            @can('inventarios.categoria')
                                <x-jet-dropdown-link href="{{ route('categorias.create') }}">
                                    {{ __('Crear Categoría') }}
                                </x-jet-dropdown-link>


                                <x-jet-dropdown-link href="{{ route('categorias.index') }}">
                                    {{ __('Consultar Categorías') }}
                                </x-jet-dropdown-link>
                            @endcan
                            <x-jet-dropdown-link href="{{ route('inventarios.create') }}">
                                {{ __('Solicitar Producto') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('inventarios.index') }}">
                                {{ __('Consultar Pedidos') }}
                            </x-jet-dropdown-link>
                            @if (!@Auth::user()->hasRole('usuario'))
                            @can('inventarios.autorizar')
                                <x-jet-dropdown-link href="{{ route('inventarios.autorizar') }}">
                                    {{ __('Autorizar Pedidos') }}
                                </x-jet-dropdown-link>
                            @endcan
                            @can('inventarios.entregar')
                                <x-jet-dropdown-link href="{{ route('inventarios.entregar') }}">
                                    {{ __('Entregar Pedidos') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('inventarios.entregados') }}">
                                    {{ __('Pedidos Entregados') }}
                                </x-jet-dropdown-link>
                            @endcan
                            @can('inventarios.almacenes')
                                <x-jet-dropdown-link href="{{ route('almacenes.index') }}">
                                    {{ __('Almacenes') }}
                                </x-jet-dropdown-link>
                            @endcan
                            @can('inventarios.mermas')
                                <x-jet-dropdown-link href="{{ route('mermas.index') }}">
                                    {{ __('Mermas') }}
                                </x-jet-dropdown-link>
                                @if (@Auth::user()->rpe == '9JJGM' || @Auth::user()->rpe == 'ADMIN')
                                <x-jet-dropdown-link href="{{ route('mermas.indexHistorial') }}">
                                    {{ __('Hsitorial Mermas') }}
                                </x-jet-dropdown-link>
                                @endif
                            @endcan
                            @endif
                        </x-slot>
                    </x-jet-dropdown>
                    @endcan --}}
                        <!-- Usuarios -->
                        {{-- @can('users.create')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    {{ __('USUARIOS') }}
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="{{ route('users.inicio') }}">
                                    {{ __('Inicio') }}
                                    </x-jet-nav-link> --}}
                        {{-- <x-jet-dropdown-link href="{{ route('calendario.index') }}">
                                {{ __('Calendario') }}
                            </x-jet-dropdown-link> --}}

                        {{-- <x-jet-dropdown-link href="{{ route('users.index') }}">
                                        {{ __('Gestion') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('roles.index') }}">
                                        {{ __('Roles') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('users.create') }}">
                                        {{ __('Crear') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>
                            </x-slot>
                        </x-jet-dropdown>
                    @endcan --}}

                        <!-- Resguardos resguardos.registrar -->
                        {{-- <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger"> --}}
                        {{-- <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                {{ __('RESGUARDOS') }}
                            </button> --}}
                        <!-- Finanzas -->
                        <div class="group inline-block" align="left" width="48">
                            <button
                                class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1">Finanzas</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                        transition duration-150 ease-in-out"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul
                                class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                transition duration-150 ease-in-out origin-top min-w-32">
                                <!-- Resguardos -->
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">Resguardos</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                                transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul
                                        class="bg-white border rounded-sm absolute top-0 right-0
                                                transition duration-150 ease-in-out origin-top-left
                                                min-w-32
                                                ">
                                        <a href="{{ route('resguardos.inicio') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Inicio</li>
                                        </a>
                                        <a href="{{ route('resguardos.create') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Crear resguardo</li>
                                        </a>
                                        <a href="{{ route('resguardos.index') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar resguardos</li>
                                        </a>
                                        <a href="{{ route('resguardos.index.rpe') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Consultar resguardos por RPE</li>
                                        </a>
                                        @can('resguardos.status.index')
                                            <a href="{{ route('resguardos.status.index') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Asignación</li>
                                            </a>
                                            <a href="{{ route('resguardos.status.index.pendientes') }}">
                                                <li class="px-3 py-1 hover:bg-gray-100">Pendientes autorización</li>
                                            </a>
                                        @endcan
                                        <a href="{{ route('resguardos.bitacora') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Bitácora</li>
                                        </a>
                                        <a href="{{ route('resguardos.reporte') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Reportes</li>
                                        </a>
                                        <a href="{{ route('resguardos.status') }}">
                                            <li class="px-3 py-1 hover:bg-gray-100">Listado de status</li>
                                        </a>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        {{-- </x-slot>
                        <x-slot name="content"> --}}
                        {{-- <x-jet-dropdown-link href="{{ route('resguardos.inicio') }}">
                                {{ __('Inicio') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('resguardos.create') }}">
                                {{ __('Crear resguardo') }}
                            </x-jet-nav-link>
                            <x-jet-dropdown-link href="{{ route('resguardos.index') }}">
                                {{ __('Consultar resguardos') }}
                            </x-jet-nav-link>
                            <x-jet-dropdown-link href="{{ route('resguardos.index.rpe') }}">
                                {{ __('Consultar resguardos por RPE') }}
                            </x-jet-nav-link>
                            @can('resguardos.status.index')
                                <x-jet-dropdown-link href="{{ route('resguardos.status.index') }}">
                                    {{ __('Asignación') }}
                                </x-jet-nav-link>
                                <x-jet-dropdown-link href="{{ route('resguardos.status.index.pendientes') }}">
                                    {{ __('Pendientes autorización') }}
                                </x-jet-nav-link>
                            @endcan
                            <x-jet-dropdown-link href="{{ route('resguardos.bitacora') }}">
                                {{ __('Bitácora') }}
                            </x-jet-nav-link>
                            <x-jet-dropdown-link href="{{ route('resguardos.reporte') }}">
                                {{ __('Reportes') }}
                            </x-jet-nav-link>
                            <x-jet-dropdown-link href="{{ route('resguardos.status') }}">
                                {{ __('Listado de status') }}
                            </x-jet-nav-link>

                                <div class="border-t border-gray-100"></div> --}}
                        {{-- </x-slot>
                    </x-jet-dropdown> --}}

                    </div>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->rpe }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="inline-flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-150 transition align-middle">
                                    <img class="h-8 w-8 mr-2 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->rpe }}" />
                                    {{ Auth::user()->rpe }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->rpe }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administracion') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('users.datosPersonales') }}">
                                {{ __('Datos personales') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Configuracion') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
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

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
