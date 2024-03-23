<x-app-layout>
    @section('title', 'Little-Tokyo PDFs')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registros de PDF de Herramientas Subidos') }}
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
                <a href="{{ route('pdfInicio.show') }}"
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class='text-center'>ID</th>
                            <th class='text-center'>Nombre(s)</th>
                            <th class='text-center'>Imagen</th>
                            <th class='text-center'>Descripción</th>
                            <th class='text-center'>Fecha de Subida al Sistema</th>
                            <th class='text-center'>Reporte de Herramienta Firmado</th>
                            <th class='text-center'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($herramientas as $herramienta)
                            <tr>                                    
                                <td align="center" class="font-bold">{{ $herramienta->id }}</td>
                                <td align="center" class="font-bold">{{ $herramienta->nombre_real }}</td>
                                <td align="center" style="width:10px">
                                    <div style="width: 140px; height: 100px;">
                                        <a href="{{ asset('img/almacen/Herramientas/' . $herramienta->imagen) }}" download>
                                            <img class='rounded-md md w-2/3 hover:w-10 transition-shadow' src="{{ asset('img/almacen/Herramientas/' . $herramienta->imagen) }}" style="width: 120px; height: 80px;">
                                        </a>                                    
                                    </div>
                                </td>
                                <td align="center">{{ $herramienta->descripcion }}</td>
                                <td align="center">{{ $herramienta->solicitud }}</td>
                                <td align="center">
                                    <a href="{{ route('herramientas.verpdf',$herramienta->id) }}" target="_blank">{{ $herramienta->reporte_pdf }}</a>
                                </td>
                                <td align="center" class="px-2 py-1">
                                    <div class="in-line flex justify-center object-center">
                                        <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$herramienta->id}}">Opciones</button>   
                                    </div>
                                    <div class="modal fade" id="exampleModal_{{$herramienta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width: 450px; height: 350px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                    <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="display: block; flex-direction: column; align-items: center;">
                                                        <div class="in-line flex justify-center object-center">
                                                            <div>
                                                                <form method="POST" action="{{ route('eliminarHerramientas', ['id' => $herramienta->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="mt-1 border-right bg-red-500 hover:bg-red-700 text-white font-bold py-1 p-2 px-3 rounded-md">
                                                                        Eliminar Registro
                                                                    </button>  
                                                                </form>                   
                                                                <button class="mt-3 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 p-2 px-3 rounded"
                                                                onclick="mostrarInput('contenedorInput_{{$herramienta->id}}','requiredSolicitud_{{$herramienta->id}}')">
                                                                    Modificar Archivo
                                                                </button>
                                                            </div>
                                                            <div>
                                                                <form method="POST" action="{{ route('eliminarHerramientas.pdf', ['id' => $herramienta->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="mt-1 ml-3 border-right  bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 p-2 px-3 rounded-md mr-3">
                                                                        Eliminar Archivo PDF
                                                                    </button>  
                                                                </form>   
                                                            </div>
                                                        </div> 
                                                        <div id="contenedorInput_{{$herramienta->id}}" hidden class="mt-2 content-center object-center">
                                                            <form method="POST" action="{{ route('herramientas.subirpdf', $herramienta->id) }}" enctype="multipart/form-data" >
                                                                @csrf
                                                                <input type="file" name="herramienta_PDF" id='requiredSolicitud_{{$herramienta->id}}' accept=".pdf" class="mt-4">
                                                                <button type="submit" class="text-m text-white bg-green-600 hover:bg-green-800 font-bold mt-6 p-2 rounded-md">Enviar PDF</button>
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