<style>
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #636363;
        width: 400px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }

    .modal-confirm .modal-footer a {
        color: #999;
    }

    .modal-confirm .icon-box {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        z-index: 9;
        text-align: center;
        border: 3px solid #f15e5e;
    }

    .modal-confirm .icon-box i {
        color: #f15e5e;
        font-size: 46px;
        display: inline-block;
        margin-top: 13px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
    }

    .modal-confirm .btn-secondary {
        background: #c1c1c1;
    }

    .modal-confirm .btn-secondary:hover,
    .modal-confirm .btn-secondary:focus {
        background: #a8a8a8;
    }

    .modal-confirm .btn-danger {
        background: #f15e5e;
    }

    .modal-confirm .btn-danger:hover,
    .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>

<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consulta de solicitudes') }}
        </h2>
    </x-slot>

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-10">
        <div class="mb-10 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
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
        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            @if (session()->has('message'))
                <div class="px-2 inline-flex flex-row" id="mssg-status">
                    @if (session()->has('error'))
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-600 h-5 w-5 inline-flex"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                        </svg>
                    @else
                        {{-- Puedes ajustar el color según el tipo de mensaje --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 h-5 w-5 inline-flex"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                        </svg>
                    @endif
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class='text-center'>Solicitante</th>
                            <th class='text-center'>RPE</th>
                            <th class='text-center'>Economico</th>
                            <th style="width:160px" class='text-center'>Credencial CFE</th>
                            <th class='text-center' style="width:160px">Licencia</th>
                            <th class='text-center'>Fecha de Inicio</th>
                            @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                                <th class='text-center'>Estatus del vehículo</th>
                                <th class="text-center">Acciones</th>
                            @else
                                <th class="text-center"style="width:60px">Estatus de la Solicitud</th>
                                <th class="text-center"style="width:60px">Opciones</th>
                                <th class="text-center"style="width:60px">Documentos</th>
                            @endif
                        </tr>
                    </thead>
                    {{--Muestra mensaje de operacion exitosa y desaparece después de 2 segundos--}}
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
                        <div class="alert alert-success auto-fade px-2 inline-flex flex-row text-green-600">
                            {{ session()->get('success') }}
                        </div> 
                    @elseif (session()->has('error'))
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
                        <div class="auto-fade inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr>                                    
                                <td align="center" class="font-bold">{{ $solicitud->nombre }}</td>
                                <td align="center" class="font-bold text-green-700">{{ $solicitud->RPE }}</td>
                                <td align="center">{{ $solicitud->Economico }}</td>
                                <td align="center" style="width:10px">
                                    <div style="width: 120px; height: 100px;">
                                        <a href="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitud->Credencial) }}" download>
                                            <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitud->Credencial) }}" style="width: 120px; height: 100px;" alt="Llantas Image">
                                        </a>                                    
                                    </div>
                                </td>
                                <td align="center" style="width:10px">
                                    <div style="width: 120px; height: 100px;">                                   
                                        <a href="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitud->Licencia) }}" download>
                                            <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/' . $solicitud->Licencia) }}" alt="Llantas Image" style="width: 120px; height: 100px;">
                                        </a>                                                            
                                    </div>
                                </td>
                                <td align="center">{{$solicitud->fecha_inicio}}</td>
                                @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                                    <td align="center">{{$solicitud->vehiculo->Clasificacion}}</td>
                                    <td class=" px-2 py-1">
                                        <div class="flex justify-center rounded-lg text-lg" role="group">
                                            {{-- Boton eliminar solicitud --}}
                                            <form action= "button" id="rechazarForm" class="formEliminar rounded bg-red-600 hover:bg-red-700 ml-2 text-center">
                                                @csrf
                                                <button type="button" id="rechazarButton" class="rounded text-white font-bold py-2 px-2 text-center" data-bs-toggle="modal" data-bs-target="#ModalRechazar_{{$solicitud->id}}">Rechazar</button>
                                            </form>               
                                            <!-- Modal -->
                                            <div class="modal fade" id="ModalRechazar_{{$solicitud->id}}" tabindex="-1" aria-labelledby="RechazarModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 500px; height: 450px;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="RechazarModalLabel">Confirmar rechazo de solicitud</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="display: flex; justify-content: center; align-items: center; ">
                                                                <form action="{{ route('rechazarsolicitud.reject',['id'=>$solicitud->id]) }}" method="POST" id="rechazoForm">
                                                                    @csrf 
                                                                    <textarea name="comentario" id="comentario" class="rounded" style="resize: none; text-align: center; width: 400px; height: 300px;" placeholder="Escribe por qué se rechaza la solicitud" required></textarea>
                                                                    <style>
                                                                        #comentario::placeholder {
                                                                            text-align: center; 
                                                                            line-height: 300px;
                                                                        }
                                                                    </style>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="rounded bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2" data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="rounded bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-2">Confirmar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- botón Autorizar -->
                                            <form action="{{ route('aceptarsolicitud.accept',['id'=>$solicitud->id]) }}"
                                                method="POST"
                                                class="rounded bg-green-600 hover:bg-green-700 ml-2" id="aceptarModal">
                                                @csrf
                                                <button type="button"
                                                    class="rounded text-white font-bold py-2 px-2" data-bs-toggle="modal" tabindex="-1" data-bs-target="#myModalAutorizar_{{$solicitud->id}}">Autorizar</button>
                                                <!-- Modal -->
                                                <div id="myModalAutorizar_{{$solicitud->id}}" class="modal fade">
                                                    <div class="modal-dialog modal-confirm">
                                                        <div class="modal-content">
                                                            <div class="modal-header flex-column">
                                                                {{-- <div class="icon-box">
                                                                    <i class="material-icons">&#xE5CD;</i>
                                                                </div> --}}                                                     
                                                                <h4 class="modal-title w-100">¿Estás seguro de aceptar esta solicitud?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <button type="button" class="rounded bg-red-600 hover:bg-red-700  text-white font-bold py-1 px-2 text-lg"  data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="rounded bg-green-600 hover:bg-green-700  text-white font-bold py-1 px-2 text-lg">Confirmar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            {{-- Mostrar más detalles --}}
                                            <form action="{{route('mostrardetalles.show',['id'=>$solicitud->id])}}" method="GET">
                                                <button  class="mx-2 border-right  bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded imprimirBtn">
                                                    Detalles
                                                </button>
                                            </form>
                                        </div>
                                    </td>  
                                @else
                                    <td align="center">
                                        {{$solicitud->Estatus}}
                                    </td>
                                    <td align="center">
                                    @if ($solicitud->Estatus == 'Aceptada')
                                        <a href="{{ route('crearformato.create', $solicitud->id) }}" method="GET">
                                            <button type="submit" class="rounded bg-green-500 hover:bg-green-700 text-white p-1 mt-2 border-right font-bold py-1 px-1 imprimirBtn">Llenar Formato</button>
                                        </a>
                                    @elseif ($solicitud->Estatus == 'Pendiente')
                                        <form action="{{ route('solicitud.edit', $solicitud->id) }}" method="GET" class="rounded text-white font-bold py-1 px-2">
                                            @csrf         
                                            <button class="mx-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                                Editar Solicitud
                                            </button>                          
                                        </form>
                                    @elseif ($solicitud->Estatus == 'Autorizada')
                                        <form class="rounded text-white font-bold py-1 px-2">
                                            @csrf         
                                            <button id="abrirVentana" class="boton-accion mx-1 border-right bg-green-700 hover:bg-green-800 text-white font-bold py-1 px-3 rounded" data-id="{{ $solicitud->id }}">
                                                Descargar PDF
                                            </button>                        
                                        </form>   
                                        <form action="{{ route('formato.edit', $solicitud->id) }}" method="GET" class="rounded text-white font-bold py-1 px-2">
                                            @csrf         
                                            <button class="mx-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                                Editar Formato
                                            </button>                        
                                        </form>
                                    @elseif ($solicitud->Estatus == 'Rechazada')
                                        {{-- Boton ver comentario --}}
                                        <button type="button" id="comentarioButton" class="rounded bg-blue-500 hover:bg-blue-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}">Comentario</button>
                                    @endif
                                    {{-- Mostrar más detalles --}}
                                    <form action="{{route('mostrardetalles.show',['id'=>$solicitud->id])}}" method="GET">
                                        <button  class="p-2 border-right  bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-4 mt-1 rounded imprimirBtn">
                                            Detalles
                                        </button>
                                    </form>
                                    </td>
                                    <td align= "center">
                                        @foreach ($formatos as $formato) 
                                            @if ($formato->id_solicitud == $solicitud->id)                                                
                                                @if($solicitud->Estatus == 'Finalizada')
                                                    <button type="button" id="documentosButton" class="rounded bg-blue-500 hover:bg-blue-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}_{{$formato->id}}">Revisar Documentos</button>        
                                                {{-- @elseif ($solicitud->Estatus === 'Aceptada')
                                                    <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 ml-2 text-white font-bold py-1 px-2">Comentario</button> --}}
                                                @elseif ($solicitud->Estatus == 'Autorizada')
                                                    <button type="button" id="entregarButton" class="mt-3 rounded bg-green-500 hover:bg-green-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}_{{$formato->id}}">Entregar Documentos</button>
                                                @endif
                                            @endif                                           
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{$solicitud->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 300px; height: 300px;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="display: flex; flex-direction: column; align-items: center; ">
                                                                <textarea name="comentario" id="comentario" class="rounded mb-3" style="resize: none; text-align: center; width: 200px; height: 150px;" disabled>
                                                                    {{$solicitud->Comentario}}
                                                                </textarea>
                                                                <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal de Entrega de Documentos-->
                                            <div class="modal fade" id="exampleModal_{{$solicitud->id}}_{{$formato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 500px; height: 550px;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Entrega de Documentos</h5>
                                                            <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="display: block; flex-direction: column; align-items: center;">
                                                                {{-- @foreach ($formatos as $formato_2) --}}
                                                                    @if ($formato->id_solicitud == $solicitud->id)
                                                                        @if ($formato->solicitud_pdf != "")
                                                                            <div class="mt-6 mb-1">
                                                                                <p class="font-bold text-black text-xl">PDF de Solicitud Vehicular Firmado</p>   
                                                                                <p class="font-bold text-blue-800 text-m -mt-5">PDF entregado correctamente.</p>    
                                                                            </div>
                                                                            <div class="in-line">
                                                                                <button type="submit" id="abrirPDF" data-id="{{ json_encode(['id' => $solicitud->id, 'tipo' => 'Solicitud']) }}"  class="boton-pdf ml-3 text-m text-white bg-blue-600 hover:bg-blue-800 font-bold -mt-10 p-1 rounded-md">Ver PDF</button>
                                                                                <button id="mostrarInput" onclick="mostrarInput('contenedorInput_{{$solicitud->id}}','requiredSolicitud_{{$solicitud->id}}')" class="ml-3 text-m text-white bg-red-600 hover:bg-red-800 font-bold p-1 rounded-md">Modificar Archivo</button>
                                                                                <div id="contenedorInput_{{$solicitud->id}}" hidden>
                                                                                    <form method="POST" action="{{ route('formato.solicitudpdf', $solicitud->id) }}" enctype="multipart/form-data" >
                                                                                        @csrf
                                                                                        <input type="file" name="solicitud_PDF" id='requiredSolicitud_{{$solicitud->id}}' accept=".pdf" class="mt-4">
                                                                                        <button type="submit" class="ml-3 text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-2 p-1 rounded-md">Subir Nuevo PDF</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="mt-6">
                                                                                <p class="font-bold text-black text-xl">PDF de Solicitud Vehicular Firmado</p>
                                                                                <form method="POST" action="{{ route('formato.solicitudpdf', $solicitud->id) }}" enctype="multipart/form-data" >
                                                                                    @csrf
                                                                                    <input type="file" name="solicitud_PDF" id="solicitud_PDF" accept=".pdf" required>
                                                                                    <button type="submit" class="ml-3 text-m text-white bg-green-600 hover:bg-green-800 font-bold p-1 rounded-md">Subir PDF</button>
                                                                                </form>
                                                                            </div>
                                                                        @endif
                                                                        @if ($formato->entrega_pdf != "")
                                                                            <div class="mt-6">
                                                                                <p class="font-bold text-black text-xl">PDF de Entrega Vehicular Firmado</p>   
                                                                                <p class="font-bold text-blue-800 text-m -mt-5">PDF entregado correctamente.</p>
                                                                            </div>
                                                                            <div class="in-line">
                                                                                <button type="submit" id="abrirPDF" data-id="{{ json_encode(['id' => $solicitud->id, 'tipo' => 'Entrega']) }}" class="boton-pdf ml-3 text-m text-white bg-blue-600 hover:bg-blue-800 font-bold p-1 -mt-10 rounded-md">Ver PDF</button>
                                                                                <button id="mostrarInput" onclick="mostrarInput('contenedorEntrega_{{$solicitud->id}}','requiredEntrega_{{$solicitud->id}}')" class="ml-3 text-m text-white bg-red-600 hover:bg-red-800 font-bold p-1 rounded-md">Modificar Archivo</button>
                                                                                <div id="contenedorEntrega_{{$solicitud->id}}" hidden>
                                                                                    <form method="POST" action="{{ route('formato.entregapdf', $solicitud->id) }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="file" name="entrega_PDF" id='requiredEntrega_{{$solicitud->id}}' accept=".pdf" class="mt-4">
                                                                                        <button type="submit" class="ml-3 text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-2 p-1 rounded-md">Subir Nuevo PDF</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @if ($formato->solicitud_pdf !='')                                                                        
                                                                                <div class="mt-10">
                                                                                    <p class="font-bold text-black text-xl">PDF de Entrega Vehicular Firmado</p>
                                                                                    <form method="POST" action="{{ route('formato.entregapdf', $solicitud->id) }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="file" name="entrega_PDF" id="entrega_PDF" accept=".pdf" required>
                                                                                        <button type="submit" class="ml-3 text-m text-white bg-green-600 hover:bg-green-800 font-bold p-1 rounded-md">Subir PDF</button>
                                                                                    </form>
                                                                                </div>
                                                                            @else
                                                                                <div class="mt-10">
                                                                                    <p class="font-bold text-black text-xl">PDF de Entrega Vehicular Firmado</p>   
                                                                                    <p class="font-bold text-red-800 text-m">Es necesario entregar primero la solicitud vehicular firmada.</p>
                                                                                </div>
                                                                            @endif
                                                                        @endif     
                                                                    @endif
                                                                {{-- @endforeach    --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                @endif 
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('plugins/jquery/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/dataTables/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('js/customDataTables.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.12.1/filtering/type-based/accent-neutralise.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#data-table').dataTable();
            });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded',function () {
            document.getElementById('abrirVentana').addEventListener('click',() => console.log('hola'));
            var botonesAccion = document.querySelectorAll('.boton-accion');
            botonesAccion.forEach(function (boton) {
                boton.addEventListener('click', function () {
                    var idbtn = boton.getAttribute('data-id');
                    otrapantalla(idbtn);
                });
            });
        });
        // Definir tu función de JavaScript
        function otrapantalla(idbtn) {
            var nuevaVentanaURL = '{{ route("formato.generarpdf", ":idbtn") }}';
            nuevaVentanaURL = nuevaVentanaURL.replace(':idbtn', idbtn);
    
            // Abre una nueva ventana
            window.open(nuevaVentanaURL, '_blank');
        }

        document.addEventListener('DOMContentLoaded',function () {
            var botonesAccion = document.querySelectorAll('.boton-pdf');
            botonesAccion.forEach(function (boton) {
                boton.addEventListener('click', function () {
                    // var datos = $('#boton-pdf').data('id');
                    var idbtn = boton.getAttribute('data-id');
                    var variables = JSON.parse(idbtn);
                    // Ahora puedes acceder a las variables individualmente
                    var id = variables.id;
                    var tipo = variables.tipo;
                    // const{id,tipo} = variables;
                    // const{id};
                    otrapantallaPDF(id,tipo);
                });
            });
        });
        // Definir tu función de JavaScript
        function otrapantallaPDF(id,tipo) {
            var nuevaVentanaURL = '{{ route("formato.showpdf", [":id", ":tipo"]) }}';
            nuevaVentanaURL = nuevaVentanaURL.replace(':id', id).replace(':tipo', tipo);
            // Abre una nueva ventana
            window.open(nuevaVentanaURL, '_blank');
        }

        function mostrarInput(Id_oculto,Id_required){
            var elementoOculto = document.getElementById(Id_oculto);
            var elementoRequired = document.getElementById(Id_required);

            if (elementoOculto.hidden) {
                // Si está oculto, mostrarlo
                elementoOculto.hidden = false;
                elementoRequired.required = true;
            } else {
                // Si está visible, ocultarlo
                elementoOculto.hidden = true;
                elementoRequired.required = false;
            }
        }
        </script>
    @endsection
</x-app-layout>