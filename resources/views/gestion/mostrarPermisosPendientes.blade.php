<style>

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
            {{ __('Registro de Permisos Pendientes') }}
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
                <a href="{{ route('mostrarPermisos.show') }}"
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

            <div class="text-right">
                <a href="{{ route('mostrarPermisos.show') }}" class='w-auto mb-10 mr-20 bg-blue-500 hover:bg-blue-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Histórico de Solicitudes de Permisos
                </a>
            </div>

        </div>
        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <p class="text-center content-center items-center text-xl mt-3 font-bold my-3">Solicitudes Pendientes de Permisos</p>
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
                                <td align="center" class="font-bold">{{ $permiso->empleado->nombre }}</td>
                                <td align="center">{{ $permiso->solicitud }}</td>
                                <td align="center">{{ $permiso->inicio }}</td>
                                <td align="center">{{ $permiso->regreso }}</td>
                                <td align="center">{{ $permiso->dias_totales }}</td>
                                <td align="center">{{ $permiso->anterior }}</td>
                                <td align="center">{{ $permiso->motivo }}</td>
                                <td class=" px-2 py-1">
                                    <div class="flex justify-center rounded-lg text-lg" role="group">
                                        {{-- Boton eliminar permiso --}}
                                        <form action= "button" id="rechazarForm" class="formEliminar rounded bg-red-600 hover:bg-red-700 ml-2 text-center">
                                            @csrf
                                            <button type="button" id="rechazarButton" class="rounded text-white font-bold py-2 px-2 text-center" data-bs-toggle="modal" data-bs-target="#ModalRechazar_{{$permiso->id}}">Rechazar</button>
                                        </form>     
                                        {{-- Boton autorizar permiso --}}
                                        <form action= "button" id="autorizoForm" class="formAutorizar rounded bg-green-600 hover:bg-green-700 ml-2 text-center">
                                            @csrf
                                            <button type="button" id="autorizarButton" class="rounded text-white font-bold py-2 px-2 text-center" data-bs-toggle="modal" data-bs-target="#MyModalAutorizar_{{$permiso->id}}">Autorizar</button>
                                        </form>              
                                        <!-- Modal -->
                                        <div class="modal fade" id="ModalRechazar_{{$permiso->id}}" tabindex="-1" aria-labelledby="RechazarModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 500px; height: 450px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="RechazarModalLabel">Confirmar rechazo de la solicitud de permiso</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: flex; justify-content: center; align-items: center; ">
                                                            <form action="{{ route('rechazarPermiso.reject',['id'=>$permiso->id]) }}" method="POST" id="rechazoForm">
                                                                @csrf 
                                                                <textarea name="comentario" id="comentario" class="rounded" style="resize: none; text-align: center; width: 400px; height: 300px;" placeholder="Escribe por qué se rechaza la vacación" required></textarea>
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
                                        <!-- Modal -->
                                        <div class="modal fade" id="MyModalAutorizar_{{$permiso->id}}" tabindex="-1" aria-labelledby="AutorizarModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 500px; height: 450px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="AutorizarModalLabel">Confirmar autorización de la solicitud de permiso</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="display: flex; justify-content: center; align-items: center; ">
                                                            <form action="{{ route('aceptarPermiso.accept',['id'=>$permiso->id]) }}" method="POST" id="autorizarForm">
                                                                @csrf 
                                                                <textarea name="comentario" id="comentario" class="rounded" style="resize: none; text-align: center; width: 400px; height: 300px;" placeholder="Escriba algún comentario si se quisiese (opcional)."></textarea>
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
    @endsection
</x-app-layout>