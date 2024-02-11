<style>
    .inf{
        font-weight: 600;
        font-size: 1.25rem/* 20px */;
        line-height: 1.75rem/* 28px */;
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity));
        line-height: 1.25;
    }
    .lbl
    {
        text-transform: uppercase;
        font-size: 0.75rem/* 12px */;
        line-height: 1rem/* 16px */;
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
        font-weight: 600;
    }
</style>

<x-app-layout>
    @section('title', 'DCJ - CFE')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información de Solicitud') }}
        </h2>
    </x-slot>
    <div class="mt-4 px-4 py-3 ml-11 leading-normal text-green-500 rounded-lg" role="alert">
        <div class="text-left">
            <a href="{{ route('siveInicio.show') }}"
                class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
            </a>
        </div>
    </div>
    <div class="pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                    <!--Seccion de información de usuario -->
                    <div class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-t-xl mx-10 mt-5">
                        <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Información del solicitante</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mb-5 mx-10 px-10 py-10 rounded-b-xl bg-gray-100">
                        <!-- RPE-->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">RPE:</label>
                             <h2 class="inf">{{$rpe}}</h2>
                        </div>
                        <!--Sub area -->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">Subárea:</label>
                            <h2 class="inf uppercase">{{$solicitudes->datosUser->subarea}}</h2>
                        </div>
                        <!--Division -->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">División:</label>
                            <h2 class="inf uppercase">{{$solicitudes->datosUser->division}}</h2>
                        </div>
                        <!-- Nombre del que registra-->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">Nombre:</label>
                            <h2 class="inf uppercase">{{$solicitudes->datosUser->nombre}}</h2>
                        </div>
                        <!--Area -->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">Área:</label>
                            <h2 class="inf uppercase">{{$solicitudes->datosUser->area}}</h2>
                        </div>
                        <!--correo -->
                        <div class="grid cols-1">
                            <label class="lbl md:text-sm">Correo:</label>
                            <h2 class="inf uppercase">{{$correo}}</h2>
                        </div>
                    </div>
                <!--Información del vehiculo -->
                <div class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-t-xl mx-10">
                    <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Información del vehiculo</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-10 px-10 py-10 rounded-b-xl bg-gray-100 mb-5">
                    <!-- Numero de activo-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">No. Economico:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Economico}}</h2>
                    </div>
                    <!-- Status-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Status:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Clasificacion}}</h2>
                    </div>
                    <!--Placa-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Placa:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Placa}}</h2>
                    </div>
                    <!--Marca-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Marca:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Marca}}</h2>
                    </div>
                    <!--Modelo-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Modelo:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Modelo}}</h2>
                    </div>
                    <!-- Zona-->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Zona:</label>
                        <h2 class="inf">{{$solicitudes->vehiculo->Zona}}</h2>
                    </div>
                     <!--Numero de serie -->
                     <div class="grid cols-1">
                        <label class="lbl md:text-sm">No. SERIE:</label>
                        <h2 class="inf uppercase">{{$solicitudes->vehiculo->No_Serie}}</h2>
                    </div>
                </div>
                <!--registro Info-->
                <div class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-t-xl mx-10">
                    <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Información solicitud</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-10 px-10 py-10 rounded-b-xl bg-gray-100">
                    <!-- Fecha -->
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Fecha del registro   :</label>
                        <h2 class="inf">{{$solicitudes->created_at}}</h2>
                    </div>
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Fecha de inicio   :</label>
                        <h2 class="inf">{{$solicitudes->fecha_inicio}}</h2>
                    </div>
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Fecha de fin   :</label>
                        <h2 class="inf">{{$solicitudes->fecha_fin}}</h2>
                    </div>
                    
                    <!-- Estatus de solicitud-->
                    <div class="grid cols-1 ">
                        <label class="lbl md:text-sm">Estatus de la solicitud</label>
                        <h2 class="inf">{{$solicitudes->Estatus}}</h2>
                    </div>  
                    <!-- Motivo de prestamo-->
                    <div class="grid cols-1 ">
                        <label class="lbl md:text-sm">Motivo:</label>
                        <h2 class="inf">{{$solicitudes->motivo}}</h2>
                    </div>            
                </div> 
                <!--Descarga de documentos -->
                <div class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-t-xl mx-10 mt-5">
                    <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Archivos</h2>
                </div>
                {{-- muestra la imagen --}}
                <div class="mx-10 px-10 py-10 mb-10 rounded-b-xl bg-gray-100 flex items-center justify-center">
                    <img class='rounded-md md w-2/3' src="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitudes->Licencia) }}" alt="Imagen de la licencia">
                </div>
                <div class="mx-10 px-10 py-10 mb-10 rounded-b-xl bg-gray-100 flex items-center justify-center">
                    <img class='rounded-md md w-2/3' src="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitudes->Credencial) }}" alt="Imagen de la credencial">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

