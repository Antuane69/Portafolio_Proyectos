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

        #data-table2 {
            border-collapse: collapse;
            width: 100%;
        }
        #data-table2 th, #data-table2 td {
            padding: 8px;
            text-align: center;
            border-left: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
        #data-table2 tr td {
            border-bottom: 1px solid #000000;
        }

        #data-table3 {
            border-collapse: collapse;
            width: 100%;
        }
        #data-table3 th, #data-table3 td {
            padding: 8px;
            text-align: center;
            border-left: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
        #data-table3 tr td {
            border-bottom: 1px solid #000000;
        }
    </style>
    
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
            {{ __('Asignación de Horario') }}
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
        <div class="mb-10 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('template.crear') }}"
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <form id="formulario" action={{ route('horario.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="tabla1" class="tabla">
                        <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-4">COCINEROS</p>
                        <table id="data-table1" class="stripe hover translate-table data-table"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th class='text-center'></th>
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
                                @for ($k = 0;$k<3;$k++)
                                <tr>     
                                    @if ($k == 0)
                                        <td align="center" class="font-bold">
                                            6:00 AM a 12:00 PM
                                        </td>
                                    @elseif ($k == 1)
                                        <td align="center" class="font-bold">
                                            12:00 PM a 18:00 PM
                                        </td>
                                    @else
                                        <td align="center" class="font-bold">
                                            18:00 PM a 00:00 AM
                                        </td>
                                    @endif
                                    <td align="center" class="font-bold">
                                        <select name="cocinerolunes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['lunes']}}">             
                                            @foreach($nombres as $nombre)
                                                <option value="{{$nombre}}">{{$nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocineromartes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['martes']}}">             
                                            @foreach($nombres as $nombre2)
                                                <option value="{{$nombre2}}">{{$nombre2}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocineromiercoles{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['miercoles']}}">             
                                            @foreach($nombres as $nombre3)
                                                <option value="{{$nombre3}}">{{$nombre3}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocinerojueves{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['jueves']}}">             
                                            @foreach($nombres as $nombre4)
                                                <option value="{{$nombre4}}">{{$nombre4}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocineroviernes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['viernes']}}">             
                                            @foreach($nombres as $nombre5)
                                                <option value="{{$nombre5}}">{{$nombre5}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocinerosabado{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['sabado']}}">             
                                            @foreach($nombres as $nombre6)
                                                <option value="{{$nombre6}}">{{$nombre6}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="cocinerodomingo{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorCocina[$k]['domingo']}}">             
                                            @foreach($nombres as $nombre7)
                                                <option value="{{$nombre7}}">{{$nombre7}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div id="tabla2" class="tabla">
                        <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-4">SERVICIO</p>
                        <table id="data-table2" class="stripe hover translate-table data-table"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th class='text-center'></th>
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
                                @for ($k = 0;$k<3;$k++)
                                <tr>     
                                    @if ($k == 0)
                                        <td align="center" class="font-bold">
                                            6:00 AM a 12:00 PM
                                        </td>
                                    @elseif ($k == 1)
                                        <td align="center" class="font-bold">
                                            12:00 PM a 18:00 PM
                                        </td>
                                    @else
                                        <td align="center" class="font-bold">
                                            18:00 PM a 00:00 AM
                                        </td>
                                    @endif
                                    <td align="center" class="font-bold">
                                        <select name="serviciolunes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['lunes']}}">             
                                            @foreach($nombres_ser as $nombre)
                                                <option value="{{$nombre}}">{{$nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="serviciomartes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['martes']}}">             
                                            @foreach($nombres_ser as $nombre2)
                                                <option value="{{$nombre2}}">{{$nombre2}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="serviciomiercoles{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['miercoles']}}">             
                                            @foreach($nombres_ser as $nombre3)
                                                <option value="{{$nombre3}}">{{$nombre3}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="serviciojueves{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['jueves']}}">             
                                            @foreach($nombres_ser as $nombre4)
                                                <option value="{{$nombre4}}">{{$nombre4}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="servicioviernes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['viernes']}}">             
                                            @foreach($nombres_ser as $nombre5)
                                                <option value="{{$nombre5}}">{{$nombre5}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="serviciosabado{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['sabado']}}">             
                                            @foreach($nombres_ser as $nombre6)
                                                <option value="{{$nombre6}}">{{$nombre6}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="serviciodomingo{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorServicio[$k]['domingo']}}">             
                                            @foreach($nombres_ser as $nombre7)
                                                <option value="{{$nombre7}}">{{$nombre7}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div id="tabla3" class="tabla">
                        <p class="ml-3 font-bold text-xl mt-6 text-center content-center justify-center mb-4">BARISTAS</p>
                        <table id="data-table3" class="stripe hover translate-table data-table"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th class='text-center'></th>
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
                                @for ($k = 0;$k<3;$k++)
                                <tr>     
                                    @if ($k == 0)
                                        <td align="center" class="font-bold">
                                            6:00 AM a 12:00 PM
                                        </td>
                                    @elseif ($k == 1)
                                        <td align="center" class="font-bold">
                                            12:00 PM a 18:00 PM
                                        </td>
                                    @else
                                        <td align="center" class="font-bold">
                                            18:00 PM a 00:00 AM
                                        </td>
                                    @endif
                                    <td align="center" class="font-bold">
                                        <select name="barlunes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['lunes']}}">             
                                            @foreach($nombres_bar as $nombre)
                                                <option value="{{$nombre}}">{{$nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="barmartes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['martes']}}">             
                                            @foreach($nombres_bar as $nombre2)
                                                <option value="{{$nombre2}}">{{$nombre2}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="barmiercoles{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['miercoles']}}">             
                                            @foreach($nombres_bar as $nombre3)
                                                <option value="{{$nombre3}}">{{$nombre3}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="barjueves{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['jueves']}}">             
                                            @foreach($nombres_bar as $nombre4)
                                                <option value="{{$nombre4}}">{{$nombre4}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="barviernes{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['viernes']}}">             
                                            @foreach($nombres_bar as $nombre5)
                                                <option value="{{$nombre5}}">{{$nombre5}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="barsabado{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['sabado']}}">             
                                            @foreach($nombres_bar as $nombre6)
                                                <option value="{{$nombre6}}">{{$nombre6}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center" class="font-bold">
                                        <select name="bardomingo{{$k}}[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required
                                            data-maximum-selection-length="{{$contadorBarra[$k]['domingo']}}">             
                                            @foreach($nombres_bar as $nombre7)
                                                <option value="{{$nombre7}}">{{$nombre7}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <button id="anterior" class="w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-bold text-white px-4 py-2">Anterior</button>
                        <button id="siguiente" class="w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-bold text-white px-4 py-2">Siguiente</button>
                        <button type="submit" id="fin" hidden
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Crear Plantilla</button>
                    </div>
                </form>
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
                var currentTabla = 1;
                var elementoOculto = document.getElementById('fin');
                var siguienteOculto = document.getElementById('siguiente');
        
                function mostrarTabla(tabla) {
                    $('.tabla').hide();
                    $('#tabla' + tabla).show();
                    $('.data-table').DataTable();
                }
        
                $('#anterior').click(function() {
                    currentTabla--;
                    if (currentTabla < 1) {
                        currentTabla = 1;
                        siguienteOculto.hidden = false;
                    }else{
                        siguienteOculto.hidden = false;
                        elementoOculto.hidden = true;
                    }
                    mostrarTabla(currentTabla);
                });
        
                $('#siguiente').click(function() {
                    currentTabla++;
                    if (currentTabla >= 3) {
                        currentTabla = 3;
                        elementoOculto.hidden = false;
                        siguienteOculto.hidden = true;
                    }else{
                        elementoOculto.hidden = true;
                        siguienteOculto.hidden = false;
                    }
                    mostrarTabla(currentTabla);
                });
        
                mostrarTabla(currentTabla);
            });
        </script>
    @endsection
</x-horarios>