<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Crear Falta al Reglamento") }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal rounded-lg" role="alert">
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
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <form id="formulario" action={{ route('crearFaltas.store') }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Registro de Faltas al Reglamento
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
                                    >
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="curp" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Curp
                                </label>
                                <p>
                                    <input type="text" name="curp" id="curp-input" placeholder="No se ha encontrado al empleado"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 bg-gray-200 rounded-lg w-5/6 @error('curp') border-red-800 bg-red-100 @enderror'
                                    readonly required>
                                    
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
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent bg-gray-200" type="text" readonly/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_solicitud" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de la Falta</label>
                                <p>
                                    <input id="fecha" name="fecha_solicitud" placeholder="No se ha encontrado al empleado"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" />
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="falta_cometida" class="mb-2 bloack uppercase text-gray-800 font-bold">* Tipo de Falta</label>
                                <p>
                                    <select name="falta" id="tipo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required onchange="buscar()">             
                                        <option value="" selected disabled>Selecciona el tipo de falta al reglamento cometida</option>
                                        @foreach($opciones as $opcion)
                                            <option value="{{$opcion}}">{{$opcion}}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="falta_cometida" class="mb-1 bloack uppercase text-gray-800 font-bold">* Falta al Reglamento Cometida</label>
                                <p>
                                    <select name="falta_cometida" id="falta_cometida" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>
                                        <option value="" selected disabled>Selecciona Primero el Tipo de Falta al Reglamento</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href="{{ route('empleadosInicio.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-white px-4 py-2'
                            >Registrar Falta al Reglamento</button>
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

    function busquedaRPE() {
        var inputValue = nombreInput.value;
        buscarRPE(inputValue);
    }

    nombreInput.addEventListener("input", busquedaRPE);

    buscarRPE(nombreInput.value);

    function buscarRPE(nombre) {
        if (nombre.length > 1) {
            fetch(`${SITEURL}/gestion/registrarFaltas/buscar?nombre=${nombre}`, { method: 'get' })
                .then(response => response.json())
                .then(data => {
                    console.log(data.empleado.curp);
                    document.getElementById("curp-input").value = data.empleado.curp;
                    document.getElementById("fechaingreso-input").value = data.empleado.fecha_ingreso;
                })
                .catch(error => {
                    console.error('Error:', error);
                    curpInput.value = "";
                    fechaIngresoInput.value = "";
                });
        } else {
            // Si el nombre está vacío, borrar la información de curp y fecha de ingreso
            curpInput.value = "";
            fechaIngresoInput.value = "";
        }
    }
});
</script>

<script>
    //Obtener el día actual. 
    $(document).ready(function() {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        $("#fecha").attr("value", today);
        $("#fecha").attr("max", today);
    });

    $("#fecha").datepicker({
        dateFormat: 'dd-mm-yy'
    });

    function buscar() {

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";

        var tipo = document.getElementById('tipo').value;

        fetch(SITEURL+ `/gestion/registrarFaltas/buscar/faltas?tipo=${tipo}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                var opciones = '<option value="" disabled selected hidden>Selecciona una falta al reglamento</option>';
                if (data.faltas.length > 0) {
                    for (let falta of data.faltas) {
                        opciones += `<option value="${falta}">${falta}</option>`;
                    }
                } else {
                    opciones += '<option value="" disabled>No se encontraron faltas</option>';
                }
                document.getElementById("falta_cometida").innerHTML = opciones;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

</script>
