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
            {{ __('Histórico de Edición') }}
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

        {{-- <div class="w-full flex justify-center items-center mb-2">
            <div class="text-center">
                @if ($horario != '')
                    <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-2">Fecha del Horario Actual: 
                    {{$horario->registro}}</p>
                    <p id="NombreArea" class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-4">{{$nombreArea}}</p>
                @else
                    <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-2">No hay horarios creados actualmente.</p>                    
                @endif
            </div>           
        </div> --}}
        <div class="alert" id="elementoOculto" style=" display: none; color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; position: relative; padding: 0.75rem 1.25rem; margin-bottom: 1rem; border-radius: 10px; margin: 10px;">
            <p>No hay datos disponibles para mostrar en la tabla.</p>
        </div>
        <div class="mx-auto sm:px-6 lg:px-8" style="width:100 rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 pb-4" style="width:100%;">                
                <div class="w-full flex justify-center items-center mb-2">
                    <div class="text-center">
                        <div class="flex flex-row">
                            <div class="mr-4">
                                <label class="block uppercase md:text-sm text-xs text-gray-500 font-semibold" for="tipo">Tipo:</label>
                                <select id="tipoFiltro" name="tipo"
                                    class="py-2 px-4 rounded-lg border-2 border-green-600 mb-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @foreach($tipos as $tipo)
                                        @if($tipo == 'Empleado')
                                            <option value="{{$tipo}}" selected>{{$tipo}}</option>
                                        @else
                                            <option value="{{$tipo}}">{{$tipo}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-rows-1 place-items-center mt-3">
                                <button onClick="filter()" style="text-decoration:none;"
                                    id="filtro_id" class="rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 mx-2 ml-2">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </div> 
                <table id="data-table" class="stripe hover translate-table data-table pb-3 mb-4"
                    style="width:100%; padding-top: 2em;  padding-bottom: 2em;">
                    <thead class="mt-4">
                        <tr>
                            <th class='text-center'>Nombre</th>
                            <th class='text-center'>Campos Editados</th>
                            <th class='text-center'>Fecha del Cambio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historial as $item)                            
                            <tr>     
                                <td align="center" class="font-bold">{{ $item->nombre_usuario }}</td>
                                <td align="center">{{ $item->campo_real[0] }}</td>
                                <td align="center">{{ $item->fecha }}</td>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    placeholder: 'Selecciona los Encargados',
                    theme: "classic"
                });
            });

            $(document).ready(function() {
                $('#data-table').dataTable();
            });
            
        </script>
        <script>
            function filter() {
                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                var SITEURL = "{{ url('/') }}";

                var tipo = document.getElementById('tipoFiltro').value;

                fetch(SITEURL + '/horario/filtro/editarHistorico',{
                    method: 'POST',
                    body: JSON.stringify({
                        tipo: tipo,
                        "_token": "{{ csrf_token() }}"
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    },
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('error');
                    } else
                        return response.json()
                }).then(data => {
                    // Obtén la referencia de la tabla
                    var dataTable = $('#data-table').DataTable();
                    // Limpiar la tabla antes de agregar nuevos datos
                    dataTable.clear();

                    if (data.success == false) {
                        elementoOculto.style.display = "block"; // Mostrar el mensaje
                        setTimeout(function () {
                            elementoOculto.style.display = "none"; // Ocultar el mensaje después de 3 segundos
                        }, 3000);

                        // Dibujar la tabla
                        dataTable.draw();

                    }else{
                        data.historial.forEach(item => {
                            dataTable.row.add([
                                item.nombre_usuario,
                                item.campo_real,
                                item.fecha_cambio
                            ]);
                        });
                        // Dibujar la tabla
                        dataTable.draw();
                        // Centrar elementos en la tabla después de dibujar
                        $(document).ready(function() {
                            // Aplicar clases de estilo para centrar
                            $('#data-table').addClass('text-center').addClass('align-middle');
                        });
                    } 
                });
            }
        </script>
    @endsection
</x-horarios>