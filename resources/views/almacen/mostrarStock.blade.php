<x-app-layout>
    @section('title', 'Little-Tokyo Almacén')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Stock de Uniformes') }}
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
                            <th class='text-center'>Fecha de la Solicitud</th>
                            <th class='text-center'>Nuevos Codigo</th>
                            <th class='text-center'>Nuevos Existencia</th>
                            <th class='text-center'>Nuevos Tallas</th>
                            <th class='text-center'>Nuevos Precio</th>
                            <th class='text-center'>Nuevos Descripcion</th>

                            <th class='text-center'>Usados Codigo</th>
                            <th class='text-center'>Usados Existencia</th>
                            <th class='text-center'>Usados Tallas</th>
                            <th class='text-center'>Usados Precio</th>
                            <th class='text-center'>Usados Descripcion</th>
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
                        @foreach ($uniformes as $uniforme)
                            <tr>                                    
                                <td align="center">{{ $uniforme->fecha_solicitud }}</td>
                                <td align="center">{{ $uniforme->nuevos_codigo }}</td>
                                <td align="center">{{ $uniforme->nuevos_existencia }}</td>
                                <td align="center">{{ $uniforme->nuevos_talla }}</td>
                                <td align="center">{{ $uniforme->nuevos_precio }}</td>
                                <td align="center">{{ $uniforme->nuevos_descripcion }}</td>
                                <td align="center">{{ $uniforme->usados_codigo }}</td>
                                <td align="center">{{ $uniforme->usados_existencia }}</td>
                                <td align="center">{{ $uniforme->usados_talla }}</td>
                                <td align="center">{{ $uniforme->usados_precio }}</td>
                                <td align="center">{{ $uniforme->usados_descripcion }}</td>
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