<x-horarios>

    <style>
        /* Agrega bordes a la tabla */
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

        /* Estilos para las filas impares */
        #data-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Cambia el color de fondo para las filas impares */
        }

        /* Estilos para las filas pares */
        #data-table tbody tr:nth-child(even) {
            background-color: #ffffff; /* Cambia el color de fondo para las filas pares */
        }

        #data-table tbody tr td {
            max-width: 150px; /* Ajusta el ancho máximo según sea necesario */
        }
        
    </style>
    
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
            {{ __('Número de Trabajador (Lector de Huella)') }}
        </h2>
    </x-slot>

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection

    <div class="py-10">
        <div class="mb-3 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('dashboard') }}"
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

        <div class="mx-auto sm:px-6 lg:px-8" style="width:100 rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 pb-4" style="width:100%;">                
                <div class="flex justify-end">
                    <button type="button" id="opcionesButton" class="mr-10 rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Crear Registro Nuevo</button>
                </div>
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
                <table id="data-table" class="stripe hover translate-table data-table pb-3 mb-4"
                    style="width:100%; padding-top: 2em;  padding-bottom: 2em;">
                    <thead class="mt-4">
                        <tr>
                            <th class='text-center'>Número</th>
                            <th class='text-center'>Nombre</th>
                            <th class='text-center'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trabajadores as $trabajador)                            
                            <tr>     
                                <td align="center" class="font-bold">{{ $trabajador->numero }}</td>
                                <td align="center">{{ $trabajador->nombre }}</td>
                                <td align="center">
                                    <div class="in-line flex justify-center object-center">
                                        <form action="{{ route('nomina.numerotrabajador.delete', $trabajador->id) }}" method="POST">
                                            @csrf         
                                            @method('DELETE')
                                            <button class="border-right bg-red-800 hover:bg-red-600 text-white font-bold p-2 px-3 py-1 mr-3 rounded-md mt-1">
                                                Eliminar Registro
                                            </button>                        
                                        </form>   
                                        <button type="button" id="editarButton" class="mr-10 rounded-md bg-yellow-500 hover:bg-yellow-700 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$trabajador->id}}">Editar Registro</button>
                                    </div>
                                </td>
                            </tr> 
                            <div class="modal fade" id="exampleModal_{{$trabajador->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$trabajador->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 600px; height: 360px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel_{{$trabajador->id}}">{{ $trabajador->id != 1 ? 'Editar Registro' : 'Crear Registro' }}</h5>
                                            <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="display: block; flex-direction: column; align-items: center;">
                                                <div class="in-line flex justify-center object-center">                                                   
                                                    <form @if($trabajador->id != 1) action="{{ route('nomina.numerotrabajador.editshow',$trabajador->id) }}" @else action="{{ route('nomina.numerotrabajador.store') }}" @endif method="POST" class="mb-2">
                                                        @csrf         
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7 mt-4"> 
                                                            <div class='grid grid-cols-1 mt-5'>
                                                                <label for="numero" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                                                    Número de Trabajador
                                                                </label>
                                                                <p>
                                                                    <input type="number" name="numero" id="numero_id_{{$trabajador->id}}" placeholder="Ingresa el número para identificar al empleado"
                                                                    class='focus:outline-none focus:ring-2 mb-1 numero-var focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('numero') border-red-800 bg-red-100 @enderror'
                                                                    required @if($trabajador->id != 1) value="{{$trabajador->numero}}" @endif>
                                                                </p>
                                                            </div> 
                                                            <div class='grid grid-cols-1'>
                                                                <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                                                    Nombre (lo más cercano a base de datos de empleados)
                                                                </label>
                                                                <p>
                                                                    <input type="text" name="nombre" id="nombre_id_{{$trabajador->id}}" placeholder="Ingresa el nombre del empleado"
                                                                    class='focus:outline-none focus:ring-2 mb-1 nombre-var focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nombre') border-red-800 bg-red-100 @enderror'
                                                                    required @if($trabajador->id != 1) value="{{$trabajador->nombre}}" @endif>
                                                                </p>
                                                            </div>
                                                            <div class="md:col-span-2 flex justify-center">
                                                                <button type="submit" id="button_id_{{$trabajador->id}}" class="button_var border-right bg-green-600 hover:bg-green-700 text-white font-bold p-2 px-3 py-1 rounded-md mt-1">
                                                                    Guardar Registro
                                                                </button>   
                                                                <p id="message_id_{{$trabajador->id}}" class="text-red-800 font-bold mt-1 message_var" hidden>
                                                                    Registro duplicado en base de datos, intente otro número o nombre
                                                                </p>   
                                                            </div>                         
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#data-table').dataTable();
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Agregar evento al botón de opciones al cargar la página
                document.querySelectorAll('#opcionesButton, [id^="editarButton"]').forEach(button => {
                    button.addEventListener('click', handleModalOpen);
                });

                function handleModalOpen(event) {
                    // Obtener el modal específico al que se hizo clic
                    const modal = document.querySelector(event.target.getAttribute('data-bs-target'));
                    
                    if (modal) {
                        // Seleccionar elementos dentro del modal
                        const numero_var = modal.querySelector('.numero-var');
                        const nombre_var = modal.querySelector('.nombre-var');
                        const button_var = modal.querySelector('.button_var');
                        const message_var = modal.querySelector('.message_var');
                        
                        if (numero_var && nombre_var) {
                            numero_var.addEventListener("input", function() {
                                totalFunction(numero_var, nombre_var, button_var, message_var);
                            });

                            nombre_var.addEventListener("input", function() {
                                totalFunction(numero_var, nombre_var, button_var, message_var);
                            });
                        }
                    }
                }

                function totalFunction(numero_var, nombre_var, button_var, message_var) {
                    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                    var SITEURL = "{{ url('/') }}";

                    var numero = numero_var.value;
                    var nombre = nombre_var.value;

                    fetch(SITEURL + `/nomina/buscar/numeroTrabajadores?numero=${numero}&nombre=${nombre}`, { method: 'get' })
                        .then(response => response.json())
                        .then(data => {
                            if (data.existe == true) {
                                button_var.hidden = true;
                                message_var.hidden = false;
                            } else {
                                message_var.hidden = true;
                                button_var.hidden = false;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });

        </script>
    @endsection
</x-horarios>
