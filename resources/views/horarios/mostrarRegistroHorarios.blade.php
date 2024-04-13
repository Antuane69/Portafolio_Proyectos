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

        /* Estilo para la última columna */
        /* #data-table tbody tr td:last-child {
            background-color: #ffffff; 
        } */
        
    </style>
    
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
            {{ __('Registro de Horario Actual') }}
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

        <div class="w-full flex justify-center items-center mb-2">
            <div class="text-center">
                <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-2">Fecha del Horario Actual: {{$horario->registro}}</p>
                <p id="NombreArea" class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-4">{{$nombreArea}}</p>
            </div>           
        </div>
        <div class="alert" id="elementoOculto" style=" display: none; color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; position: relative; padding: 0.75rem 1.25rem; margin-bottom: 1rem; border-radius: 10px; margin: 10px;">
            <p>No hay datos disponibles para mostrar en la tabla.</p>
        </div>
        <div class="mx-auto sm:px-6 lg:px-8" style="width:100 rem;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 pb-4" style="width:100%;">                
                <div class="w-full flex justify-center items-center mb-2">
                    <div class="text-center">
                        <div class="flex flex-row">
                            <div class="mr-4">
                                <label class="block uppercase md:text-sm text-xs text-gray-500 font-semibold" for="area">Área:</label>
                                <select id="areaFiltro" name="area"
                                    class="py-2 px-4 rounded-lg border-2 border-green-600 mb-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @foreach($areas as $area)
                                        @if($area == $nombreArea)
                                            <option value="{{$area}}" selected>{{$area}}</option>
                                        @else
                                            <option value="{{$area}}">{{$area}}</option>
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
                            <th class='text-center'>Turno</th>
                            <th class='text-center'>Lunes</th>
                            <th class='text-center'>Martes</th>
                            <th class='text-center'>Miércoles</th>
                            <th class='text-center'>Jueves</th>
                            <th class='text-center'>Viernes</th>
                            <th class='text-center'>Sábado</th>
                            <th class='text-center'>Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($nombreArea == 'COCINA')
                            <p class="hidden">{{$aux = 1}}</p>
                            @for ($k = 0;$k<4;$k++)
                                <tr>     
                                    <td align="center" class="font-bold">{{ $horario->turno[$k] }}</td>
                                    <td align="center">{{ $horario->clunes[$k] }}</td>
                                    <td align="center">{{ $horario->cmartes[$k] }}</td>
                                    <td align="center">{{ $horario->cmiercoles[$k] }}</td>
                                    <td align="center">{{ $horario->cjueves[$k] }}</td>
                                    <td align="center">{{ $horario->cviernes[$k] }}</td>
                                    <td align="center">{{ $horario->csabado[$k] }}</td>
                                    @if ($aux == 1)                               
                                        <td align="center" rowspan="3">{{ $horario->cdomingo[$k] }}</td>     
                                        <p class="hidden">{{$aux = 0}}</p>
                                    @elseif ($k == 3)
                                        <td align="center">{{ $horario->cdomingo[$k] }}</td>
                                    @else
                                        <div class="hidden">
                                            <td align="center">{{ $horario->cdomingo[$k] }}</td>
                                        </div>
                                    @endif
                                </tr> 
                            @endfor
                        @elseif ($nombreArea == 'SERVICIO')
                            <p class="hidden">{{$aux = 1}}</p>
                            @for ($k = 0;$k<4;$k++)
                                <tr>     
                                    <td align="center" class="font-bold">{{ $horario->turno[$k] }}</td>
                                    <td align="center">{{ $horario->slunes[$k] }}</td>
                                    <td align="center">{{ $horario->smartes[$k] }}</td>
                                    <td align="center">{{ $horario->smiercoles[$k] }}</td>
                                    <td align="center">{{ $horario->sjueves[$k] }}</td>
                                    <td align="center">{{ $horario->sviernes[$k] }}</td>
                                    <td align="center">{{ $horario->ssabado[$k] }}</td>
                                    @if ($aux == 1)                               
                                        <td align="center" rowspan="3">{{ $horario->sdomingo[$k] }}</td>     
                                        <p class="hidden">{{$aux = 0}}</p>
                                    @elseif ($k == 3)
                                        <td align="center">{{ $horario->sdomingo[$k] }}</td>
                                    @else
                                        <div class="hidden">
                                            <td align="center">{{ $horario->sdomingo[$k] }}</td>
                                        </div>
                                    @endif
                                </tr> 
                            @endfor
                        @else
                            <p class="hidden">{{$aux = 1}}</p>
                            @for ($k = 0;$k<2;$k++)
                                <tr>     
                                    <td align="center" class="font-bold">{{ $horario->turnoBarra[$k] }}</td>
                                    <td align="center">{{ $horario->blunes[$k] }}</td>
                                    <td align="center">{{ $horario->bmartes[$k] }}</td>
                                    <td align="center">{{ $horario->bmiercoles[$k] }}</td>
                                    <td align="center">{{ $horario->bjueves[$k] }}</td>
                                    <td align="center">{{ $horario->bviernes[$k] }}</td>
                                    <td align="center">{{ $horario->bsabado[$k] }}</td>
                                    @if ($aux == 1)                               
                                        <td align="center" rowspan="3">{{ $horario->bdomingo[$k] }}</td>     
                                        <p class="hidden">{{$aux = 0}}</p>
                                    @elseif ($k == 3)
                                        <td align="center">{{ $horario->bdomingo[$k] }}</td>
                                    @else
                                        <div class="hidden">
                                            <td align="center">{{ $horario->bdomingo[$k] }}</td>
                                        </div>
                                    @endif
                                </tr> 
                            @endfor
                        @endif
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

                var area = document.getElementById('areaFiltro').value;

                fetch(SITEURL + '/horario/filtroHorarios',{
                    method: 'POST',
                    body: JSON.stringify({
                        area: area,
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
                    console.log(data.horario);
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
                        // Centrar elementos en la tabla después de dibujar
                        $(document).ready(function() {
                            // Aplicar clases de estilo para centrar
                            $('#data-table').addClass('text-center').addClass('align-middle');
                        });

                    }else{

                       // Limpiar el contenido de la tabla antes de agregar nuevos datos
                       $('#data-table tbody').empty();
                       // Construir el HTML de las filas
                       let tableHtml = '';

                        if(area === 'BARRA'){
                            // Agregar filas al HTML de la tabla
                            for (let k = 0; k < 4; k++) {
                                var turno = '<p class="font-bold">:turno</p>';
                                turno = turno.replace(':turno', data.horario.turno[k]);
    
                                tableHtml += `
                                    <tr>
                                        <td>${turno}</td>
                                        <td>${data.horario.lunes[k]}</td>
                                        <td>${data.horario.martes[k]}</td>
                                        <td>${data.horario.miercoles[k]}</td>
                                        <td>${data.horario.jueves[k]}</td>
                                        <td>${data.horario.viernes[k]}</td>
                                        <td>${data.horario.sabado[k]}</td>
                                        <td>${data.horario.domingo[k]}</td>
                                    </tr>`;
                            }
    
                            // Insertar el HTML de la tabla en el DOM
                            $('#data-table tbody').html(tableHtml);
    
                        }else{

                            // Agregar filas al HTML de la tabla
                            for (let k = 0; k < 4; k++) {
                                var turno = '<p class="font-bold">:turno</p>';
                                turno = turno.replace(':turno', data.horario.turno[k]);
    
                                if (k === 0) {
                                    tableHtml += `
                                        <tr>
                                            <td>${turno}</td>
                                            <td>${data.horario.lunes[k]}</td>
                                            <td>${data.horario.martes[k]}</td>
                                            <td>${data.horario.miercoles[k]}</td>
                                            <td>${data.horario.jueves[k]}</td>
                                            <td>${data.horario.viernes[k]}</td>
                                            <td>${data.horario.sabado[k]}</td>
                                            <td>${data.horario.domingo[k]}</td>
                                        </tr>`;
                                } else {
                                    tableHtml += `
                                        <tr>
                                            <td>${turno}</td>
                                            <td>${data.horario.lunes[k]}</td>
                                            <td>${data.horario.martes[k]}</td>
                                            <td>${data.horario.miercoles[k]}</td>
                                            <td>${data.horario.jueves[k]}</td>
                                            <td>${data.horario.viernes[k]}</td>
                                            <td>${data.horario.sabado[k]}</td>
                                            <td>${k === 3 ? data.horario.domingo[k] : ''}</td>
                                        </tr>`;
                                }
                            }
    
                            // Insertar el HTML de la tabla en el DOM
                            $('#data-table tbody').html(tableHtml);
    
                            // Aplicar rowspan a la primera celda de la columna Domingo
                            $('#data-table tbody tr:eq(0) td:eq(7)').attr('rowspan', '3');
                        }

                        $(document).ready(function() {
                            // Aplicar clases de estilo para centrar
                            $('#data-table').addClass('text-center').addClass('align-middle');
                        });
                    } 
                    document.getElementById('NombreArea').innerText = area;
                });
            }
        </script>
    @endsection
</x-horarios>