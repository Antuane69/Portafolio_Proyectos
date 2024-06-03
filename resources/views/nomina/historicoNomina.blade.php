
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
            {{ __('Registro de Nómina') }}
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
        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
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
                
                <p class="text-center font-bold text-xl text-blue-800 justify-center mt-5 mb-8 ">TOTAL DE NÓMINA: ${{$total}}</p>
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 2em;  padding-bottom: 2em;">
                    <thead>
                        <tr>
                            <th class='text-center'>Nombre</th>
                            <th class='text-center'>Total Horas</th>
                            <th class='text-center'>Total Minutos</th>
                            <th class='text-center'>Total</th>
                            <th class='text-center' style="width: 40%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nominas as $nomina)
                            <tr>  
                                <td align="center" class="font-bold">{{ $nomina->curp }}</td>
                                <td align="center">{{ $nomina->horas }}</td>
                                <td align="center">{{ $nomina->minutos }}</td>
                                <td align="center" class="font-bold">${{ $nomina->total }}</td>
                                <td align="center">
                                    <div class="in-line flex justify-center object-center">
                                        <form class="rounded text-white font-bold py-1 px-2">
                                            @csrf         
                                            <button id="abrirVentana" class="boton-accion border-right bg-gray-600 hover:bg-gray-700 text-white font-bold mr-3 px-2 p-2 rounded-md" data-id="{{ $nomina->id }}">
                                                Generar Nómina en PDF
                                            </button>                        
                                        </form> 
                                        <form action="{{ route('editarNomina.show', $nomina->id) }}" method="GET">
                                            @csrf         
                                            <button class="border-right bg-yellow-500 hover:bg-yellow-700 text-white font-bold p-2 px-3 py-1 mr-3 rounded-md mt-1">
                                                Editar Registro
                                            </button>                        
                                        </form>   
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

            document.addEventListener('DOMContentLoaded',function () {
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
                var nuevaVentanaURL = '{{ route("nomina.datospdf", ":idbtn") }}';
                nuevaVentanaURL = nuevaVentanaURL.replace(':idbtn', idbtn);

                // Abre una nueva ventana
                window.open(nuevaVentanaURL, '_blank');
            }
        </script>
    @endsection
</x-app-layout>