<x-app-layout>
    @section('title', 'Little-Tokyo Almacén')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Crear Registro de Uniformes") }}
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
                <form id="formulario" action={{ route('crearUniformes.store') }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Registro de Uniformes
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
                                <label for="fecha_solicitud" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Solicitud</label>
                                <p>
                                    <input name="fecha_solicitud" id="fecha"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" required/>
                                </p>
                            </div> 
                            <div class='grid grid-cols-1'>
                                <label for="tipo_uniforme" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Tipo de Uniforme
                                </label>
                                <p>
                                    <select id="tipo" name="tipo_uniforme" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' onchange="CargarCodigos()" required>             
                                        <option value="">Seleccione una Opcion</option>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="Usado">Usado</option>
                                    </select>
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="codigo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Codigo
                                </label>
                                <p>
                                    <select name="codigo" id="codigo_opciones" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' onchange="tallas()" required>
                                        <option value="" selected disabled>Selecciona Primero un Tipo de Uniforme</option>
                                    </select>
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="talla" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Talla
                                </label>
                                <p>
                                    <select name="talla" id="tallas_opciones" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' onchange="ObtenerCantidad()" required>
                                        <option value="" selected disabled>Selecciona Primero un Codigo de Uniforme</option>
                                    </select>
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="existencia" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Existencia
                                </label>
                                <p>
                                    <input type="number" id="existencia" name="existencia" placeholder="0"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 bg-gray-200 rounded-lg w-5/6 @error('existencia') border-red-800 bg-red-100 @enderror'
                                    required readonly>
                                    
                                    @error('existencia')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="cantidad" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Cantidad
                                </label>
                                <p>
                                    <input type="number" id="cantidad" name="cantidad" placeholder="0"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('cantidad') border-red-800 bg-red-100 @enderror'
                                    required oninput="validarCantidad()">
                                    
                                    @error('cantidad')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="total" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Total
                                </label>
                                <p>
                                    <input type="number" id="total" name="total" placeholder="0"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 bg-gray-200 rounded-lg w-5/6 @error('total') border-red-800 bg-red-100 @enderror'
                                    required readonly>
                                    
                                    @error('total')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href=""
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Asignar Uniformes</button>
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

    function busquedaRPE() {
        var inputValue = nombreInput.value;
        buscarRPE(inputValue);
    }

    nombreInput.addEventListener("input", busquedaRPE);

    buscarRPE(nombreInput.value);

    function buscarRPE(nombre) {
        if (nombre.length > 1) {
            fetch(`${SITEURL}/almacen/registrarUniformes/buscar?nombre=${nombre}`, { method: 'get' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("curp-input").value = data.empleado.curp;
                })
                .catch(error => {
                    console.error('Error:', error);
                    curpInput.value = "";
                });
        } else {
            // Si el nombre está vacío, borrar la información de curp y fecha de ingreso
            curpInput.value = "";
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
</script>

<script>

    function CargarCodigos(){

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";

        var tipo = document.getElementById('tipo').value;

        fetch(SITEURL+ `/almacen/registrarUniformes/buscar/codigo?tipo=${tipo}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                var opciones = '<option value="" disabled selected hidden>Selecciona un codigo</option>';
                var opciones2 = '<option value="" disabled selected hidden>Selecciona una talla</option>';
                document.getElementById("cantidad").value = 0;
                document.getElementById("tallas_opciones").innerHTML = opciones2;
                if (data.lcodigos.length > 0) {
                    for (let codigo of data.lcodigos) {
                        if(codigo != null){
                            opciones += `<option value="${codigo}">${codigo}</option>`;
                        }
                    }
                } else {
                    opciones += '<option value="" disabled>No hay codigos disponibles</option>';
                }
                document.getElementById("codigo_opciones").innerHTML = opciones;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    function tallas() {

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";
    
        var codigo = document.getElementById('codigo_opciones').value;
        var tipo = document.getElementById('tipo').value;
    
        fetch(SITEURL+ `/almacen/registrarUniformes/buscar/opciones?codigo=${codigo}&tipo=${tipo}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                var opciones = '<option value="" disabled selected hidden>Selecciona una talla</option>';
                document.getElementById("cantidad").value = 0;
                if (data.ltallas.length > 0) {
                    for (let talla of data.ltallas) {
                        if(talla != null){
                            opciones += `<option value="${talla}">${talla}</option>`;
                        }
                    }
                } else {
                    opciones += '<option value="" disabled>No hay tallas disponibles</option>';
                }
                document.getElementById("tallas_opciones").innerHTML = opciones;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    function ObtenerCantidad() {

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";

        var codigo = document.getElementById('codigo_opciones').value;
        var tipo = document.getElementById('tipo').value;
        var talla = document.getElementById('tallas_opciones').value;

        fetch(SITEURL+ `/almacen/registrarUniformes/buscar/cantidad?codigo=${codigo}&tipo=${tipo}&talla=${talla}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                document.getElementById('existencia').value = data.cantidad;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    function validarCantidad() {
        var existencia = parseInt(document.getElementById('existencia').value);
        var cantidadInput = document.getElementById('cantidad');
        var cantidad = parseInt(cantidadInput.value);

        if (isNaN(cantidad) || cantidad < 1) {
            // La cantidad no es un número válido
            cantidadInput.setCustomValidity('Ingresa una cantidad válida.');
            document.getElementById('total').value = 0;
        } else if (cantidad > existencia) {
            // La cantidad es mayor que la existencia
            cantidadInput.setCustomValidity('La cantidad no puede ser mayor que la existencia.');
            document.getElementById('total').value = 0;
        } else {
            // La cantidad es válida
            cantidadInput.setCustomValidity('');
            ObtenerTotal();
        }
    }

    function ObtenerTotal() {

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";

        var tipo = document.getElementById('tipo').value;
        var codigo = document.getElementById('codigo_opciones').value;
        var talla = document.getElementById('tallas_opciones').value;
        var cantidad = document.getElementById('cantidad').value;

        fetch(SITEURL+ `/almacen/registrarUniformes/buscar/total?codigo=${codigo}&tipo=${tipo}&talla=${talla}&cantidad=${cantidad}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                document.getElementById('total').value = data.total;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

</script>
