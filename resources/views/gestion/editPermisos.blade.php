<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Registro de Permiso (Modo de Edición)") }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route("mostrarPermisos.show") }}"
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
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <form id="formulario" action={{ route("editarPermiso.store",$permiso->id) }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Registro de Permiso (Modo de Edición)
                        </p>
                    </div>
                    
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                            <div class='grid grid-cols-1'>
                                <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Nombre
                                </label>
                                <p>
                                    <input type="text" id="nombre_input" placeholder="Ingresa el nombre del empleado"
                                    class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                    value="{{$permiso->empleado->nombre}}">
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="curp" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Curp
                                </label>
                                <p>
                                    <input type="text" name="curp" id="curp-input" placeholder="No se ha encontrado al empleado"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 bg-gray-200 rounded-lg w-5/6 @error('curp') border-red-800 bg-red-100 @enderror'
                                    readonly required value="{{$permiso->curp}}">
                                    
                                    @error('curp')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_ingreso" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Ingreso</label>
                                <p>
                                    <input id="fechaingreso-input" name="fecha_ingreso" placeholder="No se ha encontrado al empleado"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent bg-gray-200" type="text" readonly
                                    value="{{$permiso->empleado->fecha_ingreso}}"/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_solicitud" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de la Solicitud</label>
                                <p>
                                    <input id="fechaB" name="fecha_solicitud" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" 
                                    value="{{$permiso->fecha_solicitud}}"/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_inicio" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de inicio del permiso</label>
                                <p>
                                    <input id="fecha" name="fecha_inicio"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" 
                                    value="{{$permiso->fecha_inicio}}" onchange="cambiarFecha()"/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_regreso" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de regreso del permiso</label>
                                <p>
                                    <input id="fechaA" name="fecha_regreso"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" readonly
                                    value="{{$permiso->fecha_regreso}}"/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="dias_totales" class="mb-1 bloack uppercase text-gray-800 font-bold">* Dias de Incapacidad</label>
                                <p>
                                    <input id="dias_totales" name="dias_totales"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent bg-gray-200" type="text" 
                                    value="1" readonly/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="motivo" class="mb-2 bloack uppercase text-gray-800 font-bold">* Motivo</label>
                                <p>
                                    <textarea id="motivo" name="motivo"
                                        class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent resize-none"
                                        required placeholder="Ingrese la falta cometida">{{$permiso->motivo}}</textarea>
                                    @error('motivo')
                                        <span style="font-size: 10pt;color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_anteriorPermiso" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha del ultimo permiso (si aplicase)</label>
                                <p>
                                    <input id="fecha_anterior-input" name="fecha_anteriorPermiso" placeholder="No se ha encontrado anterior permiso"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent bg-gray-200" type="text" readonly
                                    value="{{$permiso->fecha_anteriorPermiso}}"/>
                                </p>
                            </div> 
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href="{{ route('mostrarPermisos.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-green-600 hover:bg-green-700 rounded-lg shadow-xl font-bold text-white px-4 py-2'
                            >Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Agrega este script al final del body o en la sección de scripts de tu vista Blade -->

<script>

document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    var SITEURL = "{{ url('/') }}";

    var nombreInput = document.getElementById('nombre_input');
    var curpInput = document.getElementById('curp-input');
    var fechaIngresoInput = document.getElementById('fechaingreso-input');
    var fechaAnteriorInput = document.getElementById('fecha_anterior-input');

    function busquedaRPE() {
        var inputValue = nombreInput.value;
        buscarRPE(inputValue);
    }

    nombreInput.addEventListener("input", busquedaRPE);

    buscarRPE(nombreInput.value);

    function buscarRPE(nombre) {
        if (nombre.length > 1) {
            fetch(`${SITEURL}/gestion/registrarPermisos/buscar?nombre=${nombre}`, { method: 'get' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("curp-input").value = data.empleado.curp;
                    document.getElementById("fechaingreso-input").value = data.empleado.fecha_ingreso;

                    if(data.permiso_anterior == ""){
                        document.getElementById("fecha_anterior-input").value = data.empleado.permisos[0].fecha_anteriorPermiso;
                    }else{
                        document.getElementById("fecha_anterior-input").value = data.permiso_anterior;
                    }
                    
                })
                .catch(error => {
                    console.error('Error:', error);
                    curpInput.value = "";
                    fechaIngresoInput.value = "";
                    fechaAnteriorInput.value = "";
                });
        } else {
            // Si el nombre está vacío, borrar la información de curp y fecha de ingreso
            curpInput.value = "";
            fechaIngresoInput.value = "";
            fechaAnteriorInput.value = "";
        }
    }

    cambiarFecha();
});
</script>

<script>

    function cambiarFecha(){
        // Obtener elementos
        var fechaInput = document.getElementById("fecha");
        var fechaAInput = document.getElementById("fechaA");

        // Función para formatear la fecha
        function formatFecha(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            return year + "-" + month + "-" + day;
        }

        // Función para actualizar la fecha de regreso
        function actualizarFechaA(selectedDate) {
            var tomorrow = new Date(selectedDate);
            tomorrow.setDate(selectedDate.getDate() + 1);
            var test = formatFecha(tomorrow);
            fechaAInput.value = '';
            fechaAInput.value = test;
        }

        // Inicializar el datepicker solo para #fecha
        flatpickr("#fecha", {
            dateFormat: 'Y-m-d',
            onChange: function(selectedDates, dateStr, instance) {
                // Actualizar el valor de #FechaA cuando cambia #fecha
                actualizarFechaA(selectedDates[0]);
            }
        });
    }

</script>