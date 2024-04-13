<style>
    #data-table {
        border-collapse: collapse;
        width: 100%;
    }
    #data-table th, #data-table td {
        padding: 8px;
        text-align: center;
        border-left: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
    }
    #data-table tr td {
        border-bottom: 1px solid #000000;
    }
</style>
<x-app-layout>
    @section('title', 'Little-Tokyo Almacén')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Herramientas') }}
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
                <a href="{{ route('almacenInicio.show') }}"
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
                            <th class='text-center'>Nombre(s)</th>
                            <th class='text-center'>Fecha de la Solicitud</th>
                            <th class='text-center'>Imágen</th>
                            <th class='text-center'>Area</th>
                            <th class='text-center'>Precio Unitario</th>
                            <th class='text-center'>Cantidad</th>
                            <th class='text-center'>Total</th>
                            <th class='text-center'>Descripción</th>
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
                        @foreach ($herramientas as $herramienta)
                            <tr>                                    
                                <td align="center" class="font-bold">{{ $herramienta->nombre_real }}</td>
                                <td align="center">{{ $herramienta->registro }}</td>
                                <td align="center" style="width:10px">
                                    <div style="width: 140px; height: 100px;">
                                        <a href="{{ asset('img/almacen/Herramientas/' . $herramienta->imagen) }}" download>
                                            <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/almacen/Herramientas/' . $herramienta->imagen) }}" style="width: 120px; height: 80px;">
                                        </a>                                    
                                    </div>
                                </td>
                                <td align="center">{{ $herramienta->area }}</td>
                                <td align="center">${{ $herramienta->precio }}</td>
                                <td align="center">{{ $herramienta->cantidad }}</td>
                                <td align="center">${{ $herramienta->total }}</td>
                                <td align="center">{{ $herramienta->descripcion }}</td>
                                <td class=" px-2 py-1">
                                    <div style="display: block; flex-direction: column; align-items: center;">
                                        <div class="in-line flex justify-center object-center mt-1 mb-1">   
                                            @if ($herramienta->reporte_pdf != "")                                                    
                                                <div>
                                                    <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 ml-2 text-white font-bold p-1 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$herramienta->id}}">Opciones</button>   
                                                    <button type="submit" id="abrirPDF" data-id="{{ json_encode(['id' => $herramienta->id]) }}"  class="text-m text-black font-bold mt-2 p-1 px-3 rounded-md boton-pdf" style="margin-left:12px;background-color: #FFFF7B">Ver PDF</button>
                                                </div>
                                            @else
                                                <div>
                                                    <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600  text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$herramienta->id}}" style="width: 100%;">Opciones</button>   
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal_{{$herramienta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width: 450px; height: 430px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                    <button type="button" class="rounded-md bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="display: block; flex-direction: column; align-items: center;">
                                                        <div class="in-line flex justify-center object-center">
                                                            <div>
                                                                <form method="GET" action="{{ route('editarHerramientas.show',$herramienta->id) }}" class="rounded text-white font-bold py-1 px-2">
                                                                    @csrf         
                                                                    <button class="mx-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 p-2 rounded-md" style="width:95%">
                                                                        Editar Registro
                                                                    </button>                        
                                                                </form>
                                                                <form class="rounded text-white font-bold py-1 px-2">
                                                                    @csrf         
                                                                    <button id="abrirVentana" class="boton-accion mx-1 border-right  bg-gray-600 hover:bg-gray-700 text-white font-bold px-2 mt-1 rounded-md" data-id="{{ $herramienta->id }}">
                                                                        Generar Recibo en PDF
                                                                    </button>                        
                                                                </form>   
                                                            </div>
                                                            <div>
                                                                <form method="POST" class="mb-2" action="{{ route('eliminarHerramientas',$herramienta->id) }}">
                                                                    @method('DELETE')
                                                                    @csrf         
                                                                    <button class="mt-1 border-right bg-red-500 hover:bg-red-700 text-white font-bold py-1 p-2 ml-2 mr-3 rounded-md">
                                                                        Eliminar Registro
                                                                    </button>                        
                                                                </form>   
                                                                @if ($herramienta->reporte_pdf != "")
                                                                    <form method="POST" action="{{ route('eliminarHerramientas.pdf', ['id' => $herramienta->id]) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="mt-1 ml-2 border-right bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md mr-3" style="padding-left:18px;padding-right:18px">
                                                                            Eliminar Archivo PDF
                                                                        </button>  
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if ($herramienta->reporte_pdf != "")
                                                                    <button class="mt-1 border-right  bg-purple-700 hover:bg-purple-900 text-white font-bold py-1 p-2 px-3 rounded-md"
                                                                    onclick="mostrarInput('contenedorInput_{{$herramienta->id}}','requiredSolicitud_{{$herramienta->id}}')">
                                                                        Modificar Archivo PDF
                                                                    </button>
                                                                @else
                                                                    <button class="mt-1 border-right bg-purple-700 hover:bg-purple-900 text-white font-bold py-2 px-3 ml-1 rounded-md"
                                                                    onclick="mostrarInput('contenedorInput_{{$herramienta->id}}','requiredSolicitud_{{$herramienta->id}}')">
                                                                        Subir Reporte Herramienta
                                                                    </button>
                                                                @endif  
                                                            </div>
                                                        </div> 
                                                        <div id="contenedorInput_{{$herramienta->id}}" hidden class="mt-2 content-center object-center">
                                                            <form method="POST" action="{{ route('herramientas.subirpdf', $herramienta->id) }}" enctype="multipart/form-data" >
                                                                @csrf
                                                                <input type="file" name="herramienta_PDF" id='requiredSolicitud_{{$herramienta->id}}' accept=".pdf" class="mt-4 ml-10">
                                                                <button type="submit" class="text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-4 p-2 rounded-md ml-40">Enviar PDF</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </td>
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
                var nuevaVentanaURL = '{{ route("herramientas.generarpdf", ":idbtn") }}';
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
                        otrapantallaPDF(id);
                    });
                });
            });
            // Definir tu función de JavaScript
            function otrapantallaPDF(id) {
                var nuevaVentanaURL = '{{ route("herramientas.verpdf", [":id"]) }}';
                nuevaVentanaURL = nuevaVentanaURL.replace(':id', id);
                // Abre una nueva ventana
                window.open(nuevaVentanaURL, '_blank');
            }
        </script>
    @endsection
</x-app-layout>