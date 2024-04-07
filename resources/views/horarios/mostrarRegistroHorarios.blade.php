<x-horarios>

    <style>
        /* Agrega bordes a la tabla */
        #data-table1 {
            border-collapse: collapse;
            width: 100%;
        }
        #data-table1 th, #data-table1 td {
            padding: 8px;
            text-align: center;
            border-left: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
        #data-table1 tr td {
            border-bottom: 1px solid #000000;
        }
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
                                        <option value="{{$area}}">{{$area}}</option>
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

                <table id="data-table" class="stripe hover translate-table data-table pb-2 pt-2"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class='text-center font-bold'>Turno</th>
                            <th class='text-center font-bold'>Lunes</th>
                            <th class='text-center font-bold'>Martes</th>
                            <th class='text-center font-bold'>Miércoles</th>
                            <th class='text-center font-bold'>Jueves</th>
                            <th class='text-center font-bold'>Viernes</th>
                            <th class='text-center font-bold'>Sábado</th>
                            <th class='text-center font-bold'>Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($k = 0;$k<3;$k++)
                            <tr>     
                                <td align="center" class="font-bold">{{ $horario->turno[$k] }}</td>
                                <td align="center">{{ $horario->clunes[$k] }}</td>
                                <td align="center">{{ $horario->cmartes[$k] }}</td>
                                <td align="center">{{ $horario->cmiercoles[$k] }}</td>
                                <td align="center">{{ $horario->cjueves[$k] }}</td>
                                <td align="center">{{ $horario->cviernes[$k] }}</td>
                                <td align="center">{{ $horario->csabado[$k] }}</td>
                                <td align="center">{{ $horario->cdomingo[$k] }}</td>
                            </tr> 
                        @endfor
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
                    // Obtén la referencia de la tabla
                    var dataTable = $('#data-table').DataTable();
                    // Limpiar la tabla antes de agregar nuevos datos
                    dataTable.clear();

                    if (data.horario.length == 0) {
                        elementoOculto.style.display = "block"; // Mostrar el mensaje
                        setTimeout(function () {
                            elementoOculto.style.display = "none"; // Ocultar el mensaje después de 3 segundos
                        }, 3000);
                    } 

                    // Agregar nuevos datos a la tabla
                    for (let k = 0; k < 3; k++){
                        var turno = '<p class=" font-bold "> :turno </p>';
                        turno = turno.replace(':turno',data.horario.turno[k]);

                        dataTable.row.add([
                            // data.horario.turno[k],
                            `<td>
                                    ${turno}
                            </td>`,
                            data.horario.lunes[k],
                            data.horario.martes[k],
                            data.horario.miercoles[k],
                            data.horario.jueves[k],
                            data.horario.viernes[k],
                            data.horario.sabado[k],
                            data.horario.domingo[k]
                        ]);
                    }

                    document.getElementById('NombreArea').innerText = area;

                    // Dibujar la tabla
                    dataTable.draw();
                    // Centrar elementos en la tabla después de dibujar
                    $(document).ready(function() {
                        // Aplicar clases de estilo para centrar
                        $('#data-table').addClass('text-center').addClass('align-middle');
                    });
                });
            }
        </script>
    @endsection
</x-horarios>