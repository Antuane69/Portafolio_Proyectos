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
    @section('title', 'Little-Tokyo Administración')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información del Empleado') }}
        </h2>
    </x-slot>
    <div class="mt-4 px-4 py-3 ml-11 leading-normal text-green-500 rounded-lg" role="alert">
        <div class="text-left">
            <a href="{{ route('mostrarBajas.show') }}"
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
                        <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Información del Empleado</h2>
                    </div>
                    <div class="grid grid-cols-2 md:flex md:flex-col gap-5 md:gap-8 mb-5 mx-10 px-10 py-10 rounded-b-xl bg-gray-100">
                        @if ($empleado->imagen_perfil)                            
                            <div class="w-2/5 mb-5 md:mb-0 ml-20">
                                <label class="lbl md:text-sm">Foto del Empleado:</label>
                                <img class='rounded-md md:w-full mt-4' src="{{ asset('img/gestion/Empleados/' . $empleado->imagen_perfil) }}" alt="Imagen del empleado">
                            </div>
                        @else
                            <div class="w-2/5 mb-5 md:mb-0 ml-20">
                                <label class="lbl md:text-sm">Foto del Empleado:</label>
                                <img class='rounded-md md:w-full mt-4' src="{{ asset('img/gestion/Empleados/noImage.jpg') }}" alt="Imagen del empleado">
                            </div>
                        @endif
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="lbl md:text-sm">Nombre:</label>
                                <h2 class="inf">{{$empleado->nombre}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">Fecha de Nacimiento:</label>
                                <h2 class="inf">{{$empleado->fecha_nacimiento}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">CURP:</label>
                                <h2 class="inf">{{$empleado->curp}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">RFC:</label>
                                <h2 class="inf">{{$empleado->rfc}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">NSS:</label>
                                <h2 class="inf">{{$empleado->nss}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">Número de Clínica del IMSS:</label>
                                <h2 class="inf">{{$empleado->num_clinicaSS}}</h2>
                            </div>
                            <div>
                                <label class="lbl md:text-sm">Teléfono:</label>
                                <h2 class="inf">{{$empleado->telefono}}</h2>
                            </div>
                        </div>
                    </div>                    
                <!--Información de la Vacante -->
                <div class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-t-xl mx-10">
                    <h2 class="font-semibold text-xl text-white justify-self-center mt-2 mb-2">Información Laboral</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-10 px-10 py-10 rounded-b-xl bg-gray-100 mb-5">
                    <div class="grid cols-1 ml-20">
                        <label class="lbl md:text-sm">Fecha de Ingreso:</label>
                         <h2 class="inf">{{$empleado->fecha_ingreso}}</h2>
                    </div>
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Puesto:</label>
                         <h2 class="inf">{{$empleado->puesto}}</h2>
                    </div>
                    {{-- <div class="grid cols-1">
                        <label class="lbl md:text-sm">Salario por Día:</label>
                         <h2 class="inf">{{$empleado->salario_dia}}</h2>
                    </div> --}}
                    <div class="grid cols-1 ml-20">
                        <label class="lbl md:text-sm">Fecha de Baja:</label>
                         <h2 class="inf">{{$empleado->fecha_baja}}</h2>
                    </div>
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Antigüedad:</label>
                         <h2 class="inf">{{$empleado->antiguedad}}</h2>
                    </div>
                    <div class="grid cols-1 ml-20">
                        <label class="lbl md:text-sm">Tiempo de Anticipación:</label>
                         <h2 class="inf">{{$empleado->tiempo_anticipacion}}</h2>
                    </div>
                    <div class="grid cols-1">
                        <label class="lbl md:text-sm">Causa de la Baja:</label>
                         <h2 class="inf">{{$empleado->causa_baja}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>