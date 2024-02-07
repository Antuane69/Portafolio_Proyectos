<x-app-layout>
    @section('title', 'Little Tokyo Administración')
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

            <img src="{{ asset('assets/Imagen2.jpg') }}" alt="Logo tokyo" width="1000" height="200">

        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white  overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">

                        {{-- <!-- RIJS -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!--Icono Nota Apunte-->
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path
                                        d="M3,5 v16 h13 l4,-4 v-11 m-3,-1 h-14 M16,21 v-4 h4 M9,15 l2,0 l11,-11 l-2,-2 l-11,11 l0,2">
                                    </path>
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('rijs.inicio') }}"
                                        class="underline text-gray-900">RIJS</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">

                                    <!--Descripción del modulo RIJ-->

                                </div>
                            </div>
                        </div>

                        <!-- Evaluación 5s-->
                        @can('evaluacion5s.index')
                            <div class="p-6 border-b border-gray-200 md:border-l">
                                <div class="flex items-center">
                                    <!--Icono Nota Apunte-->
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                        <path
                                            d="M3,5 v16 h13 l4,-4 v-11 m-3,-1 h-14 M16,21 v-4 h4 M9,15 l2,0 l11,-11 l-2,-2 l-11,11 l0,2">
                                        </path>
                                    </svg>
                                    <div class="ml-4 text-lg leading-7 font-semibold"><a
                                            href="{{ route('evaluacion5s.inicio') }}"
                                            class="underline text-gray-900">Evaluación 5s</a></div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 text-sm">

                                        <!--Descripción del modulo Evaluación 5s-->

                                    </div>
                                </div>
                            </div>
                        @endcan

                        <!-- SIVA -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!--Ícono Calendario-->
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path d="M3,5 v16 h17 v-16 h-17 M3,9 h17 M12,12 v5 M12,12 l-2,2"></path>
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('sivas.inicio') }}"
                                        class="underline text-gray-900">SIVA</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">

                                    <!--Descripción del modulo SIVA-->

                                </div>
                            </div>
                        </div>

                        <!-- Mi Salud -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!--Ícono Estetoscopio-->
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path
                                        d="M6,5 a4,4 0 0 0 -3,3 v0,3 a1,1 0 0 0 9,0 v0,-3 a4,4 0 0 0 -3,-3 M8,16 a1,1 0 0 0 10,0 v0,-2 a2,2 0 1 0 -.1,0">
                                    </path>
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('salud.inicio') }}"
                                        class="underline text-gray-900">CFE-Bienestar</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">

                                    <!--Descripción del modulo Mi Salud-->

                                </div>
                            </div>
                        </div>

                        <!-- Inventarios -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!-- Ícono Librito -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a
                                        href="{{ route('inventarios.inicio') }}"
                                        class="underline text-gray-900">Inventarios</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">

                                    <!--Descripción del modulo Inventarios-->

                                </div>
                            </div>
                        </div>

                        <!-- Usuarios -->
                        @can('users.index')
                            <div class="p-6 border-b border-gray-200 md:border-l">
                                <div class="flex items-center">
                                    <!-- Ícono Usuarios -->
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                        <path
                                            d="M5,11 a1,1 0 01 5,0 a1,1 0 11 -5,0 M3,20 a1,1 0 01 9,0 M14,6 a1,1 0 01 5,0 a1,1 0 11 -5,0 M12,15 a1,1 0 01 9,0">
                                        </path>
                                    </svg>
                                    <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('users.inicio') }}"
                                            class="underline text-gray-900">Usuarios</a></div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600  text-sm">

                                        <!--Descripción del modulo Usuarios-->

                                    </div>
                                </div>
                            </div>
                        @endcan

                        <!-- Resguardos -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!-- Ícono Librito -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('resguardos.inicio')}}" class="underline text-gray-900">Resguardos</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">

                                    <!--Descripción del modulo Inventarios-->

                                </div>
                            </div>
                        </div>

                        <!-- Evidencias -->
                        <div class="p-6 border-b border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <!-- Ícono Librito -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('evidencias.inicio')}}" class="underline text-gray-900">Evidencia de Cumplimiento</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">

                                    <!--Descripción del modulo Inventarios-->

                                </div>
                            </div>
                        </div> --}}
                        
                    </div>

                </div>
            </div>


            <div class="mt-8 bg-white  overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <div class="p-6 border-t border-gray-200 ">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="http://eticacorporativa.cfemex.com/Pages/default.aspx"
                                    class="underline text-gray-900 ">Ética corporativa</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600  text-sm">
                                Aquí podrás descargar información y material que nos ayudan a la difusióny
                                comprensión de los Códigos de Ética y Conducta..
                            </div>
                        </div>
                    </div>

                        {{-- <div class="p-6 border-t border-gray-200  md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 31 31" class="w-8 h-8 text-gray-500">
                                    <path d="M16,12a2,2,0,1,1,2-2A2,2,0,0,1,16,12Zm0-2Z" />
                                    <path d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                    <path d="M16,24a2,2,0,0,1-2-2V16a2,2,0,0,1,4,0v6A2,2,0,0,1,16,24Zm0-8v0Z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('soportes.create')}}" class="underline text-gray-900 ">Soporte</a></div>
                            </div> --}}
                            
                        {{-- @if (Auth::user()->hasRole('admin'))
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 31 31" class="w-8 h-8 text-gray-500">
                                    <path d="M16,12a2,2,0,1,1,2-2A2,2,0,0,1,16,12Zm0-2Z" />
                                    <path d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                    <path d="M16,24a2,2,0,0,1-2-2V16a2,2,0,0,1,4,0v6A2,2,0,0,1,16,24Zm0-8v0Z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('soportes.index')}}" class="underline text-gray-900 ">Ver Soporte</a></div>
                            </div>
                        @endif

                            <div class="ml-12">
                                <div class="mt-44 text-gray-600  sm:text-right">


                                <img src="{{ asset('assets/cfecontigo.png') }}" alt="Girl in a jacket" width="144"
                                    height="30">


                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    