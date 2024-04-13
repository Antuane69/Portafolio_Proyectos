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
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Permisos') }}
        </h2>
    </x-slot>

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-10">
        <div class="mb-3 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
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

            @if (auth()->user()->hasRole('admin'))                
                <div class="text-right">
                    <a href="{{ route('permisosPendientes.show') }}" class='w-auto mb-10 bg-blue-500 hover:bg-blue-600 rounded-lg shadow-xl font-medium text-white px-4 py-2 mr-20'>
                        Solicitudes Pendientes de Autorizar
                    </a>
                </div>
            @endif

        </div>
        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <p class="text-center content-center items-center text-xl mt-3 font-bold my-3">Histórico de Solicitudes de Permisos</p>
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class='text-center'>Nombre</th>
                            <th class='text-center'>Fecha de la Solicitud</th>
                            <th class='text-center'>Fecha Inicio del Permiso</th>
                            <th class='text-center'>Fecha Regreso del Permiso</th>
                            <th class='text-center'>Dias Totales</th>
                            <th class='text-center'>Fecha del Anterior Permiso</th>
                            <th class='text-center'>Motivo</th>
                            <th class='text-center'>Autorizado</th>
                            <th class='text-center'>Comentario</th>
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
                        @foreach ($permisos as $permiso)
                            <tr>     
                                @if($permiso->estado == 'Si')
                                    <td align="center" style="background-color:#DCFFCA"  class="font-bold">{{ $permiso->empleado->nombre }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->solicitud }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->inicio }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->regreso }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->dias_totales }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->anterior }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->motivo }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->estado }}</td>
                                    <td align="center" style="background-color:#DCFFCA" >{{ $permiso->comentario }}</td>
                                    <td class=" px-2 py-1" style="background-color:#DCFFCA">
                                        <div class="in-line flex justify-center object-center">
                                            <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$permiso->id}}">Opciones</button>   
                                        </div>
                                        <div class="modal fade" id="exampleModal_{{$permiso->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 450px; height: 200px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: block; flex-direction: column; align-items: center;">
                                                            <div class="in-line flex justify-center object-center">
                                                                <form method="POST" action="{{ route('eliminarPermiso', ['id' => $permiso->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="mt-1 border-right  bg-red-500 hover:bg-red-700 text-white font-bold py-1 p-2 px-3 rounded-md mr-3">
                                                                        Eliminar Registro
                                                                    </button>  
                                                                </form>                   
                                                                <form action="{{ route('editarPermiso.show', $permiso->id) }}" method="GET" class="mb-2">
                                                                    @csrf         
                                                                    <button class="mt-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 p-2 px-3 rounded">
                                                                        Editar Registro
                                                                    </button>                        
                                                                </form>   
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @elseif ($permiso->estado == 'No')
                                    <td align="center" style="background-color:#FFECEC"  class="font-bold">{{ $permiso->empleado->nombre }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->solicitud }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->inicio }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->regreso }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->dias_totales }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->anterior }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->motivo }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->estado }}</td>
                                    <td align="center" style="background-color:#FFECEC" >{{ $permiso->comentario }}</td>   
                                    <td class=" px-2 py-1" style="background-color:#FFECEC">
                                        <div class="in-line flex justify-center object-center">
                                            <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$permiso->id}}">Opciones</button>   
                                        </div>
                                        <div class="modal fade" id="exampleModal_{{$permiso->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 450px; height: 200px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: block; flex-direction: column; align-items: center;">
                                                            <div class="in-line flex justify-center object-center">
                                                                <form method="POST" action="{{ route('eliminarPermiso', ['id' => $permiso->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="mt-1 border-right  bg-red-500 hover:bg-red-700 text-white font-bold py-1 p-2 px-3 rounded-md mr-3">
                                                                        Eliminar Registro
                                                                    </button>  
                                                                </form>                   
                                                                <form action="{{ route('editarPermiso.show', $permiso->id) }}" method="GET" class="mb-2">
                                                                    @csrf         
                                                                    <button class="mt-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 p-2 px-3 rounded">
                                                                        Editar Registro
                                                                    </button>                        
                                                                </form>   
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td align="center" style="background-color:#FFFFE3"  class="font-bold">{{ $permiso->empleado->nombre }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->solicitud }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->inicio }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->regreso }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->dias_totales }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->anterior }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->motivo }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->estado }}</td>
                                    <td align="center" style="background-color:#FFFFE3" >{{ $permiso->comentario }}</td>   
                                    <td class=" px-2 py-1" style="background-color:#FFFFE3">
                                        <div class="in-line flex justify-center object-center">
                                            <button type="button" id="opcionesButton" class="rounded-md bg-gray-800 hover:bg-gray-600 text-white font-bold p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$permiso->id}}">Opciones</button>   
                                        </div>
                                        <div class="modal fade" id="exampleModal_{{$permiso->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 450px; height: 200px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                                        <button type="button" class="rounded bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-1 p-1" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: block; flex-direction: column; align-items: center;">
                                                            <div class="in-line flex justify-center object-center">
                                                                <form method="POST" action="{{ route('eliminarPermiso', ['id' => $permiso->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="mt-1 border-right  bg-red-500 hover:bg-red-700 text-white font-bold py-1 p-2 px-3 rounded-md mr-3">
                                                                        Eliminar Registro
                                                                    </button>  
                                                                </form>                   
                                                                <form action="{{ route('editarPermiso.show', $permiso->id) }}" method="GET" class="mb-2">
                                                                    @csrf         
                                                                    <button class="mt-1 border-right  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 p-2 px-3 rounded">
                                                                        Editar Registro
                                                                    </button>                        
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
    @endsection
</x-app-layout>