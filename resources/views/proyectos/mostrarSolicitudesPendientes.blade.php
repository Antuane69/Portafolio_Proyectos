<style>
    .footer-class{
        cursor: pointer;
        justify-content: space-between;
        margin-right: 16px;
        transition: transform 0.3s ease-in-out;
    }
    .footer-class:hover {
        transform: translateY(-10px); /* Ajusta el valor para cambiar la cantidad de elevación */
    }
    .lineaSep-foot {
        width: 90%;
        margin: 0 auto;
        border-top:2px solid #1C0B49;
    }
    .header-tabla{
        text-align: center;
        align-items: center;
        background-color: #1C0B49;
        color:white;
        height: 90px;
        display: flex;
        justify-content: center;
        border: 0.5px white solid;
        padding-right: 10px;
        padding-left: 10px;
    }
    .body-tabla{
        text-align: center;
        align-items: center;
        font-weight: 900;
        display: flex;
        justify-content: center;
        padding-right: 10px;
        padding-left: 10px;
    }
    .icon-size {
        width: 26px;
        height: 26px;
        color: #000; /* Color negro por defecto */
    }
    .iconos-mov{
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }
    .iconos-mov:hover{
        transform: translateY(-10px); /* Ajusta el valor para cambiar la cantidad de elevación */
    }
</style>

<x-app-layout>
    @section('title', 'Pixel Perfect - Información')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <span class="font-semibold text-md text-gray-800 flex content-center text-center">
            <div class="text-left mt-2">
                <a href='{{ route('dashboard') }}'
                    class='w-auto rounded-lg shadow-xl font-medium text-black px-4 py-2'
                    style="background:#FFFF7B;text-decoration: none;" onmouseover="this.style.backgroundColor='#FFFF3E';this.style.color='#000000';" onmouseout="this.style.backgroundColor='#FFFF7B'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
                </a>
            </div>
            <div class="ml-6 text-xl mt-2">
                {{ __('Solicitudes Pendientes') }}
            </div>
            <div style="margin-left:36%">
                <form action="{{ route('proyectos.mostrarSolicitudes',auth()->user()->nombre_usuario) }}">
                    <button class='w-auto rounded-lg shadow-xl font-bold text-white px-4 py-2'
                    style="background:#253c87;text-decoration: none;" onmouseover="this.style.backgroundColor='#1b2d6a'" onmouseout="this.style.backgroundColor='#253c87'"
                    type="submit">
                        Proyectos en Curso 
                    </button>
                </form>
            </div>
            <div style="margin-left: 1%">
                <form action="{{ route('proyectos.historico',auth()->user()->nombre_usuario) }}">
                    <button class='w-auto rounded-lg shadow-xl font-bold text-white px-4 py-2'
                    style="background:#253c87;text-decoration: none;" onmouseover="this.style.backgroundColor='#1b2d6a'" onmouseout="this.style.backgroundColor='#253c87'"
                    type="submit">
                        Historial de Proyectos
                    </button>
                </form>
            </div>
        </span>
    </x-slot>
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    @endsection
    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session()->has('success'))
                    <style>
                        .auto-fade {
                            animation: fadeOut 2s ease-in-out forwards;
                        }

                        @keyframes fadeOut {
                            0% {
                                opacity: 1;
                            }
                            90% {
                                opacity: 1;
                            }
                            100% {
                                opacity: 0;
                                display: none;
                            }
                        }
                    </style>
                    <div class="alert alert-success auto-fade px-2 inline-flex flex-row w-3/4 my-3 text-green-600">
                        {{ session()->get('success') }}
                    </div> 
                @endif
                <div class="grid-rows content-center text-center justify-center my-8">
                    <div class="inline-flex break-words text-wrap text-center pb-1" style="width: 90%;border-radius:40px">
                        <div style="width: 15%">
                            <span class="header-tabla">
                                <strong>Nombre</strong>
                            </span>
                        </div>
                        <div style="width: 30%">
                            <span class="header-tabla">
                                <strong>Requerimientos</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>Diseño Adaptable</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>Manejo de Archivos</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>E-Commerce</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>Incluye Pagos</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>Gestión del Servidor</strong>
                            </span>
                        </div>
                        <div style="width: 10%">
                            <span class="header-tabla">
                                <strong>Usuarios (Aprox)</strong>
                            </span>
                        </div>
                        <div style="width: 15%">
                            <span class="header-tabla">
                                <strong>Opciones</strong>
                            </span>
                        </div>
                    </div>
                    @foreach ($solicitudes as $solicitud)                        
                        <div class="inline-flex break-words text-wrap text-center pb-1" style="width: 90%;margin-bottom:30px;margin-top:30px;">
                            <div style="width: 15%" class="body-tabla">
                                <span>
                                    {{$solicitud->nombre}}
                                </span>
                            </div>
                            <div style="width: 25%" class="body-tabla">
                                <span style="width: 80%;margin-right:4%">
                                    {{$solicitud->requerimientos}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->adaptable}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->archivos}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->commerce}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->pagos}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->servidor}}
                                </span>
                            </div>
                            <div style="width: 10%" class="body-tabla">
                                <span>
                                    {{$solicitud->usuarios}}
                                </span>
                            </div>
                            <div style="width: 15%" class="body-tabla">
                                <div class="inline-flex">
                                    <div class="iconos-mov">
                                        <a href="{{ route('proyectos.crear_solicitud',$solicitud->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:3px" class="icon-size" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487L18.55 2.8a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931ZM16.862 4.487L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>                                        
                                        </a>
                                    </div>
                                    <div class="iconos-mov">
                                        <form action="{{ route('proyectos.eliminar_solicitud',$solicitud->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:3px" class="icon-size" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9L14.394 18m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-1">
                            <div class="lineaSep-foot"></div>
                        </div>
                    @endforeach
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>