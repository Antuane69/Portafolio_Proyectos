{{-- <style>
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
</style> --}}

<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Empleados') }}
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
                <a href="{{ route('empleadosInicio.show') }}"
                class='w-auto rounded-lg shadow-xl font-medium text-black px-4 py-2'
                style="background:#FFFF7B;text-decoration: none;" onmouseover="this.style.backgroundColor='#FFFF3E'" onmouseout="this.style.backgroundColor='#FFFF7B'">
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
                            <th class='text-center'>Nombre</th>
                            <th class='text-center'>CURP</th>
                            <th class='text-center'>RFC</th>
                            <th class='text-center'>Puesto</th>
                            <th class='text-center'>Fecha de Ingreso</th>
                            <th class='text-center'>Opciones</th>
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
                        @foreach ($empleados as $empleado)
                            <tr>  
                                @if ($empleado->validacionContrato())
                                    <td align="center" class="font-bold" style="background-color:#DCFFCA">{{ $empleado->nombre }}</td>
                                    <td align="center" class="font-bold" style="background-color:#DCFFCA">{{ $empleado->curp }}</td>
                                    <td align="center" style="background-color:#DCFFCA">{{ $empleado->rfc }}</td>
                                    <td align="center" style="background-color:#DCFFCA">{{ $empleado->puesto }}</td>
                                    <td align="center" style="background-color:#DCFFCA">{{ $empleado->fecha }}</td>
                                    <td class="px-2 py-1" style="background-color:#DCFFCA">
                                        <div class="in-line flex justify-center object-center">
                                            <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$empleado->id}}">Opciones</button>   
                                            <form action="{{route('detallesEmpleado.show',['id' => $empleado->id])}}" method="GET">
                                                <button  class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold px-1 rounded-md imprimirBtn">
                                                Más Detalles
                                                </button>
                                            </form>
                                        </div>
                                        <div class="modal fade" id="exampleModal_{{$empleado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 600px; height: 400px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: block; flex-direction: column; align-items: center;">
                                                            <div class="in-line flex justify-center object-center">
                                                                <div>
                                                                    <form method="GET" action="{{ route('crearBajas.create',$empleado->id) }}">
                                                                        @csrf
                                                                        <button class="border-right bg-red-500 hover:bg-red-700 text-white font-bold p-2 px-4 rounded-md mb-3 mr-3 mt-1">
                                                                            Dar de Baja
                                                                        </button>  
                                                                    </form>   
                                                                    <form action="{{ route('editarEmpleado.show', $empleado->id) }}" method="GET" class="mb-2">
                                                                        @csrf         
                                                                        <button class="border-right bg-yellow-500 hover:bg-yellow-700 text-white font-bold p-2 px-3 py-1 mr-3 rounded-md mt-1">
                                                                            Editar Registro
                                                                        </button>                        
                                                                    </form> 
                                                                </div>
                                                                <div>
                                                                    <form class="rounded text-white font-bold py-1 px-2">
                                                                        @csrf         
                                                                        <button id="abrirVentana" class="boton-accion border-right bg-gray-600 hover:bg-gray-700 text-white mb-3 font-bold mr-3 px-2 p-2 rounded-md" data-id="{{ $empleado->id }}">
                                                                            Generar Documentos PDF
                                                                        </button>                        
                                                                    </form>          
                                                                    @if ($empleado->documentacion != "")
                                                                        <button class="border-right bg-purple-700 hover:bg-purple-900 text-white font-bold p-2 px-3 py-3 mr-3 mt-1 rounded-md ml-1"
                                                                        onclick="mostrarInput('contenedorInput_{{$empleado->id}}','requiredSolicitud_{{$empleado->id}}')">
                                                                            Modificar Archivo PDF
                                                                        </button>
                                                                    @else
                                                                        <button class="border-right bg-purple-700 hover:bg-purple-900 text-white font-bold p-2 px-3 py-3 mr-3 rounded-md mt-1 ml-12"
                                                                        onclick="mostrarInput('contenedorInput_{{$empleado->id}}','requiredSolicitud_{{$empleado->id}}')">
                                                                            Subir Acta
                                                                        </button>
                                                                    @endif  
                                                                </div>
                                                                <div>
                                                                    <button onclick="window.open('{{ route('empleados.verpdf', ['documentacion', $empleado->id]) }}', '_blank')" class="border bg-green-700 hover:bg-green-900 text-white font-bold p-2 px-4 rounded-md mb-3 mt-1">Ver Documentación</button>
                                                                </div>
                                                            </div>
                                                            <div id="contenedorInput_{{$empleado->id}}" hidden class="mt-2 content-center object-center">
                                                                <form method="POST" action="{{ route('empleados.subirpdf', $empleado->id) }}" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    <input type="file" name="DocumentacionPDF" id='requiredSolicitud_{{$empleado->id}}' accept=".pdf" class="mt-4" style="margin-left: 120px">
                                                                    <button type="submit" class="text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-4 p-2 rounded-md" style="margin-left: 240px">Enviar PDF</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </td>
                                @else
                                    <td align="center" class="font-bold" style="background-color:#FFECEC">{{ $empleado->nombre }}</td>
                                    <td align="center" class="font-bold" style="background-color:#FFECEC">{{ $empleado->curp }}</td>
                                    <td align="center" style="background-color:#FFECEC">{{ $empleado->rfc }}</td>
                                    <td align="center" style="background-color:#FFECEC">{{ $empleado->puesto }}</td>
                                    <td align="center" style="background-color:#FFECEC">{{ $empleado->fecha }}</td>
                                    <td class="px-2 py-1" style="background-color:#FFECEC">
                                        <div class="in-line flex justify-center object-center">
                                            <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$empleado->id}}">Opciones</button>   
                                            <form action="{{route('detallesEmpleado.show',['id' => $empleado->id])}}" method="GET">
                                                <button  class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold px-1 rounded-md imprimirBtn">
                                                Más Detalles
                                                </button>
                                            </form>
                                        </div>
                                        <div class="modal fade" id="exampleModal_{{$empleado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 600px; height: 400px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: block; flex-direction: column; align-items: center;">
                                                            <div class="in-line flex justify-center object-center">
                                                                <div>
                                                                    <form method="GET" action="{{ route('crearBajas.create',$empleado->id) }}">
                                                                        @csrf
                                                                        <button class="border-right bg-red-500 hover:bg-red-700 text-white font-bold p-2 px-4 rounded-md mb-3 mr-3 mt-1">
                                                                            Dar de Baja
                                                                        </button>  
                                                                    </form>   
                                                                    <form action="{{ route('editarEmpleado.show', $empleado->id) }}" method="GET" class="mb-2">
                                                                        @csrf         
                                                                        <button class="border-right bg-yellow-500 hover:bg-yellow-700 text-white font-bold p-2 px-3 py-1 mr-3 rounded-md mt-1">
                                                                            Editar Registro
                                                                        </button>                        
                                                                    </form> 
                                                                </div>
                                                                <div>
                                                                    <form class="rounded text-white font-bold py-1 px-2">
                                                                        @csrf         
                                                                        <button id="abrirVentana" class="boton-accion border-right bg-gray-600 hover:bg-gray-700 text-white mb-3 font-bold mr-3 px-2 p-2 rounded-md" data-id="{{ $empleado->id }}">
                                                                            Generar Documentos PDF
                                                                        </button>                        
                                                                    </form>          
                                                                    @if ($empleado->documentacion != "")
                                                                        <button class="border-right bg-purple-700 hover:bg-purple-900 text-white font-bold p-2 px-3 py-3 mr-3 mt-1 rounded-md ml-1"
                                                                        onclick="mostrarInput('contenedorInput_{{$empleado->id}}','requiredSolicitud_{{$empleado->id}}')">
                                                                            Modificar Archivo PDF
                                                                        </button>
                                                                    @else
                                                                        <button class="border-right bg-purple-700 hover:bg-purple-900 text-white font-bold p-2 px-3 py-3 mr-3 rounded-md mt-1 ml-12"
                                                                        onclick="mostrarInput('contenedorInput_{{$empleado->id}}','requiredSolicitud_{{$empleado->id}}')">
                                                                            Subir Acta
                                                                        </button>
                                                                    @endif  
                                                                </div>
                                                                <div>
                                                                    <button onclick="window.open('{{ route('empleados.verpdf', ['documentacion', $empleado->id]) }}', '_blank')" class="border bg-green-700 hover:bg-green-900 text-white font-bold p-2 px-4 rounded-md mb-3 mt-1">Ver Documentación</button>
                                                                </div>
                                                            </div>
                                                            <div id="contenedorInput_{{$empleado->id}}" hidden class="mt-2 content-center object-center">
                                                                <form method="POST" action="{{ route('empleados.subirpdf', $empleado->id) }}" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    <input type="file" name="DocumentacionPDF" id='requiredSolicitud_{{$empleado->id}}' accept=".pdf" class="mt-4" style="margin-left: 120px">
                                                                    <button type="submit" class="text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-4 p-2 rounded-md" style="margin-left: 240px">Enviar PDF</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
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
                //document.getElementById('abrirVentana').addEventListener('click',() => console.log('hola'));
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
                var nuevaVentanaURL = '{{ route("empleados.crear_datospdf", ":idbtn") }}';
                nuevaVentanaURL = nuevaVentanaURL.replace(':idbtn', idbtn);

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