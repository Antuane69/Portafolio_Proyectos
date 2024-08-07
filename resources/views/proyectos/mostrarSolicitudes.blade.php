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
        word-break: break-word;
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
                {{ __('Proyectos En Curso') }}
            </div>
            <div style="margin-left:36%">
                <form action="{{ route('proyectos.mostrarSolicitudesPendientes',auth()->user()->nombre_usuario) }}">
                    <button class='w-auto rounded-lg shadow-xl font-bold text-white px-4 py-2'
                    style="background:#253c87;text-decoration: none;" onmouseover="this.style.backgroundColor='#1b2d6a'" onmouseout="this.style.backgroundColor='#253c87'"
                    type="submit">
                        Solicitudes Pendientes 
                    </button>
                </form>
            </div>
            <div style="margin-left: 1%">
                <form action="{{ route('proyectos.historico',auth()->user()->nombre_usuario) }}">
                    <button class='w-auto rounded-lg shadow-xl font-bold text-white px-4 py-2'
                    style="background:#581845;text-decoration: none;" onmouseover="this.style.backgroundColor='#802063'" onmouseout="this.style.backgroundColor='#581845'"
                    type="submit">
                        Historial de Proyectos
                    </button>
                </form>
            </div>
        </span>
    </x-slot>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
                    <div class="alert alert-success auto-fade px-2 inline-flex flex-row w-3/4 mb-2 mt-4 text-green-600" style="margin-left:10%">
                        {{ session()->get('success') }}
                    </div> 
                @endif
                <div class="grid-rows content-center text-center justify-center my-8">
                    <div class="inline-flex break-words text-wrap content-center justify-center text-center pb-1" style="width: 90%;border-radius:40px">
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
                        <div class="inline-flex break-words text-wrap content-center justify-center text-center pb-1" style="width: 90%;margin-bottom:30px;margin-top:30px;">
                            <div style="width: 15%" class="body-tabla">
                                <span>
                                    {{$solicitud->nombre}}
                                </span>
                            </div>
                            <div style="width: 25%;margin-left:2%;margin-right:2%" class="body-tabla">
                                <span style="padding-left: 5%;padding-right:5%">
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
                                    <div class="iconos-mov" style="margin-top:1.5%">
                                        <a href="{{ route('proyectos.timeline',[auth()->user()->nombre_usuario,$solicitud->id]) }}" title="Progreso Actual">                                            
                                            <svg class="icon-size" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>                                              
                                        </a>
                                    </div>
                                    <div class="iconos-mov" style="margin-left: 3%;margin-top:1.5%">
                                        <a style="text-decoration:none;cursor: pointer;" title="Archivos Adjuntos" data-bs-toggle="modal" data-bs-target="#exampleModal_evidencias_{{ $solicitud->id }}">                                            
                                            <svg class="icon-size" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>                                                      
                                        </a>
                                    </div>
                                    <div class="iconos-mov" style="margin-left: 3%;margin-top:2%">
                                        <a href="{{ route('mensajes',$solicitud->id) }}" title="Mensajes del Proyecto">
                                            <svg class="icon-size" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                            </svg>                                          
                                        </a>
                                    </div>
                                    @if(auth()->user()->hasRole('admin'))
                                        <div class="iconos-mov">
                                            <form action="{{ route('proyectos.eliminar_solicitud',$solicitud->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" style="margin-left: 4%;" title="Eliminar Solicitud">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:3px" class="icon-size" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9L14.394 18m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="ml-1">
                            <div class="lineaSep-foot"></div>
                        </div>
                        <div class="modal fade" id="exampleModal_evidencias_{{ $solicitud->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content" style="width: 500px; height: 240px; border-radius:50px">
                                    <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Archivos Adjuntos</h5>
                                        <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                                        transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                                        onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                                        >X</button>
                                    </div>
                                    <div class="modal-body" style="background: white;            
                                    border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                        <div class="flex content-center text-center" id="archivos" style="width:90%;margin-top:2%;margin-left:1%;margin-right:1%">
                                            @if (isset($solicitud->Evidencias))                                           
                                                <div id="{{ $solicitud->id ? 'archivos' : '' }}">
                                                    @php $i=1; @endphp
                                                    @foreach($solicitud->Evidencias as $archivo)
                                                        <div class="mx-4 flex-row" style="width:96%">
                                                            <span style="font-weight: 800;font-size:16px;" class="text-center justify-center flex">Archivo {{$i}}: </span>
                                                            <div class="w-full mt-3 mb-5" style="word-break: break-word;width:400">
                                                                <x-file-row url="{{ $archivo->url }}" nombre="{{ $archivo->nombre }}" id="evidencia-{{$archivo->id}}" on-remove="globals.dropzone.removeEvidencia('{{$archivo->id}}', '{{$archivo->remove}}')" />
                                                            </div>                    
                                                        </div>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    @endforeach
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>