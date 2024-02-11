<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consulta de Vehículos') }}
        </h2>
    </x-slot>

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-10">
        <div class="px-10 py-3 ml-11 leading-normal text-green-500 rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('dashboard') }}"
                    class='w-auto bg-green-500 hover-bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    Regresar
                </a>
            </div>
        </div>
        <div class="alert" id="elementoOculto" style=" display: none; color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; position: relative; padding: 0.75rem 1.25rem; margin-bottom: 1rem; border-radius: 10px; margin: 10px;">
            <p>No hay datos disponibles para mostrar en la tabla.</p>
        </div>
        <div class="w-full flex justify-center items-center ">
            <div class="text-center p-4">
                <div class="flex flex-row mb-3">
                    <div class="mr-4">
                        <label class="block uppercase md:text-sm text-xs text-gray-500 font-semibold">Área:</label>
                        <select id="areaFilter" name="areaFilter"
                            class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="all">Todas las áreas</option>
                            @foreach($areas as $area)
                                @if ($area->division_id === 'DX' && $area->area_clave !== 'DXSU')
                                    <option value="{{ $area->area_clave }}">{{ $area->area_nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1 place-items-center mt-3">
                        <!-- botón Filtrar -->
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <button onClick="filter()" style="text-decoration:none;"
                            class="rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 mx-2 ml-2">Filtrar</button>
                    </div>
                </div>
            </div>           
        </div>
        <div class="mx-auto sm:px-6 lg:px-8" style="width:80rem;">
            @if (session()->has('message'))
                <div class="px-2 inline-flex flex-row" id="mssg-status">
                    {{ session()->get('message') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 h-5 w-5 inline-flex"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6" style="width:100%;">
                <table id="data-table" class="stripe hover translate-table"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Economico</th>
                            <th>Placa</th>
                            <th>No. De serie</th>
                            <th>TipoVehiculo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Zona - Proceso</th>
                            <th>Clasificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehi as $vehiculos)
                            <tr>
                                <td align="center">{{ $vehiculos->id}}</td>
                                <td align="center">{{ $vehiculos->Economico }}</td>
                                <td align="center">{{ $vehiculos->Placa }}</td>
                                <td align="center">{{ $vehiculos->No_Serie }}</td>
                                <td align="center">{{ $vehiculos->TipoVehiculo }}</td>
                                <td align="center">{{ $vehiculos->Marca }}</td>
                                <td align="center">{{ $vehiculos->Modelo }}</td>
                                <td align="center">{{ $vehiculos->Anio }}</td>
                                <td align="center">{{ $vehiculos->Zona }}</td>
                                <td align="center">{{ $vehiculos->Clasificacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @section('js')
        <script src="{{ asset('plugins/jquery/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/dataTables/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('js/customDataTables.js') }}"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.12.1/filtering/type-based/accent-neutralise.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#data-table').dataTable();
            });
        </script>
    @endsection
</x-app-layout>

<script>
    (function() {
        'use strict'
        //debemos crear la clase formEliminar dentro del form del boton borrar
        //recordar que cada registro a eliminar esta contenido en un form
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Confirma la eliminación del registro?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡Eliminado!',
                                'El registro ha sido eliminado exitosamente.', 'success');
                        }
                    })
                }, false)
            })
    })()
</script>

{{-- Script para actualizar las subareas dependeiendo la area seleccionada --}}
{{-- <script>
    //Actualizar subareas select dependiendo el area
    document.getElementById('areaFilter').addEventListener('change', (e) => {
        fetch(SITEURL + '/subareas', {
            method: 'POST',
            body: JSON.stringify({
                area: e.target.value,
                "_token": "{{ csrf_token() }}"
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            },
        }).then(response => {
            return response.json()
        }).then(data => {
            var opciones = "<option value='all' style='color: blue;'>Todas las subáreas</option>";
            for (let i in data.lsubarea) {
                opciones += '<option value="' + data.lsubarea[i].subarea_clave + '">' + data.lsubarea[i]
                    .subarea_nombre + '</option>';
            }
            document.getElementById("subareaFilter").innerHTML = opciones;
        }).catch(error => alert(error));
    })
</script> --}}


{{-- Scrip de filtros --}}
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    var SITEURL = "{{ url('/') }}";
    function filter() {
        var division = 'DX';
        var areaFilter = document.getElementById('areaFilter').value;
        // var subareaFilter = document.getElementById('subareaFilter').value;
        fetch(SITEURL + '/filtroVehiculos',{
            method: 'POST',
            body: JSON.stringify({
                division: division,
                area: areaFilter,
                // subarea: subareaFilter,
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
            if (data.vehiculos.length === 0) {
                elementoOculto.style.display = "block"; // Mostrar el mensaje
                setTimeout(function () {
                    elementoOculto.style.display = "none"; // Ocultar el mensaje después de 3 segundos
                }, 3000);
            } 
            // Agregar nuevos datos a la tabla
            data.vehiculos.forEach(vehiculo => {
                dataTable.row.add([
                    vehiculo.id,
                    vehiculo.Economico,
                    vehiculo.Placa,
                    vehiculo.No_Serie,
                    vehiculo.TipoVehiculo,
                    vehiculo.Marca,
                    vehiculo.Modelo,
                    vehiculo.Anio,
                    vehiculo.Zona,
                    vehiculo.Clasificacion,
                ]);
            });
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
