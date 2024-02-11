<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Historico de Solicitudes") }}
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
                <a href="{{ route('mostrarsolicitudes.show') }}"
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
       <div class="alert" id="elementoOculto" style=" display: none; color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; position: relative; padding: 0.75rem 1.25rem; margin-bottom: 1rem; border-radius: 10px; margin: 10px;">
            <p>No hay datos disponibles para mostrar en la tabla.</p>
        </div>
        <!-- Contenedor principal de filtros -->
        <div class="flex flex-wrap justify-center gap-4">

            <!-- Filtro por zona -->
            <div class="text-center p-4">
                <label class="block uppercase md:text-sm text-xs text-gray-500 font-semibold">Área:</label>
                <select id="areaFilter" name="areaFilter"
                    class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="all">Todas las áreas </option>
                    @foreach($Zonas as $zona)
                        <option value="{{ $zona }}">{{ $zona }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro por estatus -->
            <div class="text-center p-4">
                <label class="block uppercase md:text-sm text-xs text-gray-500 font-semibold">Estatus:</label>
                <select id="estatusFilter" name="estatusFilter"
                    class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="all">Estatus </option>
                    @foreach($Estado ?? [] as $estados)
                        <option value="{{ $estados }}">{{ $estados }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Filtrar -->
            <div class="text-center p-4" style="margin-top: 22px;">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <button onClick="filter()" style="text-decoration:none;"
                    class="rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 ml-2">Filtrar</button>
            </div>

        </div>

        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            @if (session()->has('message'))
                <div class="px-2 inline-flex flex-row" id="mssg-status">
                    {{ session()->get('message') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 h-5 w-5 inline-flex" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class='text-center'>Solicitante</th>
                            <th class='text-center'>RPE</th>
                            <th class='text-center'>Numero Economico Vehicular</th>
                            <th style="width:160px" class='text-center'>Credencial CFE</th>
                            <th class='text-center' style="width:160px">Licencia</th>
                            <th class='text-center'>Fecha de Inicio</th>
                            <th class='text-center'>Estatus de la Solicitud</th>
                            <th class='text-center'>Opciones</th>
                            <th class='text-center'>Más Información</th>
                        </tr>
                    </thead>
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
                            <td align="center">{{$solicitud->Estatus}}</td>
                            <td align= "center" style="width:8px">
                                @if($solicitud->Estatus == 'Rechazada')
                                    <button type="button" id="opcionesButton" class="rounded bg-yellow-500 hover:bg-yellow-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}">Comentario</button>       
                                    <form action="{{ route('solicitud.eliminar', $solicitud->id) }}" method="POST" class="mt-2">
                                        @method('DELETE')
                                        @csrf         
                                        <button type="submit" id="eliminarTodo" class="rounded bg-red-600 hover:bg-red-700 ml-2 py-1 text-white font-bold px-2">Eliminar Solicitud</button>       
                                    </form>   
                                @elseif ($solicitud->Estatus == 'Finalizada')
                                    <form action="{{ route('solicitudFinalizada.eliminar', $solicitud->id) }}" method="POST" class="mt-2">
                                        @method('DELETE')
                                        @csrf                             
                                        <button type="submit" id="eliminarTodo" class="rounded bg-red-600 hover:bg-red-700 ml-2 text-white font-bold py-1 mb-2 px-2">Eliminar Solicitud</button>       
                                    </form>   
                                @else
                                    <button type="button" id="opcionesButton" class="rounded bg-gray-800 hover:bg-gray-600 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}">Opciones</button>   
                                @endif
                                <div class="modal fade" id="exampleModal_{{$solicitud->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="width: 450px; height: 210px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="display: block; flex-direction: column; align-items: center;">
                                                    @if ($solicitud->Estatus == 'Aceptada')
                                                        <div class="in-line flex justify-center object-center">
                                                            <div>
                                                                <a href="{{ route('crearformato.create', $solicitud->id) }}" method="GET">
                                                                    <button type="submit" class="rounded bg-green-500 hover:bg-green-700 text-white font-bold px-3 py-2">Llenar Formato</button>
                                                                </a>
                                                                <form action="{{ route('solicitud.eliminar', $solicitud->id) }}" method="POST" class="mt-2">
                                                                    @method('DELETE')
                                                                    @csrf         
                                                                    <button class="bg-red-600 hover:bg-red-800 text-white rounded px-2 py-2 font-bold">
                                                                        Eliminar Solicitud                                     
                                                                    </button>                        
                                                                </form>   
                                                            </div>
                                                            <div class="ml-3">
                                                                {{-- Mostrar más detalles --}}
                                                                <form action="{{route('mostrardetalles.show',['id'=>$solicitud->id])}}" method="GET">
                                                                    <button  class="p-2 border-right  bg-blue-500 hover:bg-blue-700 text-white font-bold px-3 rounded imprimirBtn">
                                                                        Detalles
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @elseif ($solicitud->Estatus == 'Autorizada')
                                                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                                                            <div class="in-line flex justify-center object-center">
                                                                <div>
                                                                    <form action="{{ route('formato.edit', $solicitud->id) }}" method="GET" class="rounded text-white font-bold py-1 px-2">
                                                                        @csrf         
                                                                        <button class="mx-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                                                            Editar Formato
                                                                        </button>                        
                                                                    </form>
                                                                    <form class="rounded text-white font-bold py-1 px-2">
                                                                        @csrf         
                                                                        <button id="abrirVentana" class="boton-accion mx-1 border-right  bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded" data-id="{{ $solicitud->id }}">
                                                                            Descargar PDF
                                                                        </button>                        
                                                                    </form>   
                                                                </div>
                                                                <div>
                                                                    <form action="{{ route('formato.eliminar', $solicitud->id) }}" method="POST" class="mb-2">
                                                                        @method('DELETE')
                                                                        @csrf         
                                                                        <button class="mt-1 border-right  bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                            </svg> --}}
                                                                            Eliminar Formato
                                                                        </button>                        
                                                                    </form>   
                                                                    {{-- Mostrar más detalles --}}
                                                                    <form action="{{route('mostrardetalles.show',['id'=>$solicitud->id])}}" method="GET">
                                                                        <button  class="p-1 border-right  bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 rounded">
                                                                            Detalles
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <form class="rounded text-white font-bold py-1 px-2">
                                                                @csrf         
                                                                <button id="abrirVentana" class="boton-accion mx-1 border-right bg-slate-600 hover:bg-slate-700 text-white font-bold py-1 px-3 rounded" data-id="{{ $solicitud->id }}">
                                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                                    </svg>   --}}
                                                                    Descargar PDF
                                                                </button>                        
                                                            </form>   
                                                            {{-- Mostrar más detalles --}}
                                                            <form action="{{route('mostrardetalles.show',['id'=>$solicitud->id])}}" method="GET">
                                                                <button  class="p-3 border-right  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded imprimirBtn">
                                                                    Detalles
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p @disabled(true)>
                                                                {{$solicitud->Comentario}}
                                                            </p>
                                                        </div>
                                                    @endif     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </td>
                            @if ($solicitud->Estatus === 'Aceptada')
                                <td align= "center" style="width:8px">
                                    <p class="hidden">a</p>
                                </td>
                            @endif
                            @foreach ($formatos as $formato)
                                @if($solicitud->id == $formato->id_solicitud) 
                                    <td align= "center" style="width:8px">
                                        @if($solicitud->Estatus === 'Finalizada')
                                            <button type="button" id="documentosButton" class="rounded bg-blue-500 hover:bg-blue-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}_{{$formato->id}}">Revisar Documentos</button>        
                                        {{-- @elseif ($solicitud->Estatus === 'Aceptada')
                                            <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 ml-2 text-white font-bold py-1 px-2">Comentario</button> --}}
                                        @else
                                            <button type="button" id="evidenciaButton" class="mt-3 rounded bg-purple-500 hover:bg-purple-800 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$formato->id}}_{{$formato->economico}}">Ver Evidencias</button>
                                            <button type="button" id="entregarButton" class="mt-3 rounded bg-green-500 hover:bg-green-700 ml-2 text-white font-bold py-1 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$solicitud->id}}_{{$formato->id}}">Entregar Documentos</button>
                                        @endif
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
                                                            @foreach ($formatos as $formato_2)
                                                                @if ($formato_2->id_solicitud == $solicitud->id)
                                                                    @if ($formato_2->solicitud_pdf != "")
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
                                                                    @if ($formato_2->entrega_pdf != "")
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
                                                                        @if ($formato_2->solicitud_pdf !='')                                                                        
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
                                                            @endforeach   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                             
                                        <div class="modal fade" id="exampleModal_{{$formato->id}}_{{$formato->economico}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" class="text-2xl">Foto de las Evidencias</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7 text-center">
                                                            {{-- @if($formato->economico == '22000076' && $formato->id == '10')
                                                                @dd($formato);
                                                            @endif --}}
                                                            @if($formato->parrilla_evi != '')
                                                                <div class='mb-1 grid grid-cols-1 text-center'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Parrilla</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parrilla_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parrilla_evi) }}" alt="Parrilla Image">
                                                                    </a>   
                                                                </div>
                                                            @endif
                                                            @if($formato->calaveras_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Calaveras</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->calaveras_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->calaveras_evi) }}" alt="Calaveras Image">
                                                                    </a>   
                                                                </div>
                                                            @endif
                                                            @if($formato->parabrisas_evi != '')      
                                                                <div class='mb-1 grid grid-cols-1 text-center'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Parabrisas</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parabrisas_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parabrisas_evi) }}" alt="Parrilla Image">
                                                                    </a>   
                                                                </div>                                                      
                                                            @endif
                                                            @if($formato->cristales_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Cristales</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cristales_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cristales_evi) }}" alt="Cristales Image">
                                                                    </a>   
                                                                </div>
                                                            @endif
                                                            @if($formato->espejos_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Espejos</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->espejos_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->espejos_evi) }}" alt="Espejos Image">
                                                                    </a>   
                                                                </div>
                                                            @endif
                                                            @if($formato->tablero_evi != '')                                                                
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Tablero</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tablero_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tablero_evi) }}" alt="Tablero Image">
                                                                    </a>     
                                                                </div>
                                                            @endif
                                                            @if($formato->aire_evi != '')
                                                                <div class='mb-1 grid grid-cols-1 text-center'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Aire</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->aire_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->aire_evi) }}" alt="Aire Image">
                                                                    </a>  
                                                                </div>
                                                            @endif
                                                            @if($formato->cinturon_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Cinturon</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cinturon_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cinturon_evi) }}" alt="Cinturon Image">
                                                                    </a>  
                                                                </div>
                                                            @endif
                                                            @if($formato->llantas_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Llantas</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantas_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantas_evi) }}" alt="Llantas Image">
                                                                    </a>  
                                                                </div>
                                                            @endif
                                                            @if($formato->tapiceria_evi != '')
                                                                <div class='mb-1 grid grid-cols-1'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">Tapiceria</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tapiceria_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tapiceria_evi) }}" alt="Tapiceria Image">
                                                                    </a>    
                                                                </div>                                                        
                                                            @endif
                                                            @if($formato->llantaref_evi != '')
                                                                <div class='grid grid-cols-1 mb-4'>
                                                                    <p class="text-md font-bold text-center content-center justify-center mr-10">LLantas</p>
                                                                    <a href="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantaref_evi) }}" download>
                                                                        <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantaref_evi) }}" alt="Llantas Image">
                                                                    </a>   
                                                                </div>
                                                            @endif
                                                            <!-- Agrega aquí más bloques de imágenes según sea necesario -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/customDataTables.js') }}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.12.1/filtering/type-based/accent-neutralise.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('#data-table').dataTable();''
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
    </script>
    <script>
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
    </script>

    {{-- Scrip de filtros --}}
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";
    
        function filter() {
            var zonaFilter = document.getElementById('areaFilter').value;
            var estadofilter= document.getElementById('estatusFilter').value;
            fetch(SITEURL + '/filtroHistorico', {
                method: 'POST',
                body: JSON.stringify({
                    zona: zonaFilter,
                    estatus: estadofilter,
                    "_token": "{{ csrf_token() }}"
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
            }).then(response => {
                if (!response.ok) {
                    throw new Error('error');
                } else {
                    return response.json();
                }
            }).then(data => {
                // Obtén la referencia de la tabla
                var dataTable = $('#data-table').DataTable();
    
                // Limpiar la tabla antes de agregar nuevos datos
                dataTable.clear();
    
                if (data.solicitudes.length === 0) {
                    elementoOculto.style.display = "block"; // Mostrar el mensaje
                    setTimeout(function () {
                        elementoOculto.style.display = "none"; // Ocultar el mensaje después de 3 segundos
                    }, 3000);
                } 
    
                // Agregar nuevos datos a la tabla
                data.solicitudes.forEach(solicitud => {
                // Asegúrate de tener los datos correctos de la entidad 'SolicitudVehiculo'
                    dataTable.row.add([
                        solicitud.nombre,
                        solicitud.RPE,
                        solicitud.Economico,
                        '<img src="' + solicitud.rutaImagenLicencia + '" alt="Licencia" style="max-width: 100px; max-height: 100px;">',
                        '<img src="' + solicitud.rutaImagenCredencial + '" alt="Credencial" style="max-width: 100px; max-height: 100px;">',
                        solicitud.fecha_inicio,
                        solicitud.Estatus,
                    ]);
                });

    
                // Dibujar la tabla
                dataTable.draw();
    
                // Centrar elementos en la tabla después de dibujar
                $(document).ready(function() {
                    var dataTable = $('#data-table').DataTable({
                        "columnDefs": [
                            { "targets": [7, 8], "visible": true } // Mostrar las columnas de "Opciones" y "Más información" por defecto
                        ]
                    });

                    $('#filter-button').on('click', function() {
                        var status = $('#status-filter').val();

                        // Si el estatus seleccionado es diferente a 'all', ocultar las columnas de "Opciones" y "Más información"
                        if (status !== 'all') {
                            dataTable.column([7, 8]).visible(false);
                        } else {x
                            // Si el estatus seleccionado es 'all', mostrar las columnas de "Opciones" y "Más información"
                            dataTable.column([7, 8]).visible(true);
                        }
                    });
                });


            });
        }
    </script>
    
    <script>

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
