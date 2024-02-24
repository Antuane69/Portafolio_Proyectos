<x-app-layout>
    @section('title', 'Little-Tokyo Almacén')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Crear Registro de Herramienta") }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <form id="formulario" action={{ route('crearHerramientas.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Registro de Herramientas
                        </p>
                    </div>                    
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7"> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_registro" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de la Solicitud</label>
                                <p>
                                    <input id="fecha" name="fecha_registro" class="w-5/6 mb-1 px-3 rounded-lg mt-3 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                                </p>
                            </div>                    
                            <div class='grid grid-cols-1'>
                                <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Encargados
                                </label>
                                <select name="nombresreg[]" class='form-control js-example-basic-multiple js-states' multiple="multiple">             
                                    @foreach($nombres as $nombre)
                                        <option value="{{$nombre}}">{{$nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mx-10 mb-5 pb-10 text-center rounded-b-xl rounded-l-xl rounded-r-xl bg-gray-100">
                        <div class='flex w-full md:gap-8 pt-3 pb-2 font-bold text-3xl text-slate-700 mt-5 rounded-l-xl rounded-r-xl' style="background-color: #FFFF7B">
                            <p>
                                <p>

                                </p>
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7 mt-5"> 
                            <div class='grid grid-cols-1'>
                                <div class='grid grid-cols-1' onclick="openInput()" id="imageContainer1">
                                    <label for="imagen" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        Imagen de la Herramienta
                                    </label>
                                    <div style="width: 220px; height: 180px;" class='bg-white mt-2 text-center border-yellow-200 overflow-hidden mx-auto focus:outline-none focus:ring-2  focus:border-transparent p-2 w-5/6 rounded-lg border-2'>
                                        <img id="imgPreview1" style="width: 200px; height: 160px;">
                                    </div>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <div class="input-container mb-4">
                                        <input type="file" name="imagen" id="inputContainer1" class='bg-white  mt-4  p-2 w-5/6 rounded-lg border-2' style="border-color: #6E6E6E" accept="image/*" onchange="previewImage(event, '#imgPreview1')">
                                    </div>
                                </div>
                            </div>
                            <div  class='grid grid-cols-1'>
                                {{-- <label for="motivo" class="bloack uppercase text-gray-800 font-bold">* Motivo</label> --}}
                                <p class="bloack uppercase text-gray-800 font-bold mb-6">
                                    * Código y Descripción
                                    <textarea id="descripcion" name="descripcion"
                                        class="w-5/6 h-5/6 p-2 px-3 rounded-lg border-2 mt-4 mb-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                                        required placeholder="Ingrese el código y la descripción de la herramienta">{{ old('descripcion') }}</textarea>

                                    @error('descripcion')
                                        <span style="font-size: 10pt;color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div> 
                            <div class='grid grid-cols-1'>
                                <label for="area" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Area
                                </label>
                                <p>
                                    <select id="area" name="area" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                        <option value="" disabled selected>Seleccione una Opcion</option>
                                        @foreach($opciones as $opcion)
                                            <option value="{{$opcion}}">{{$opcion}}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="precio" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Precio por Unidad
                                </label>
                                <p>
                                    <input type="number" id="precio" name="precio" placeholder="0"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('precio') border-red-800 bg-red-100 @enderror'
                                    required oninput="validarCantidad()">
                                    
                                    @error('precio')
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
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5 mt-5'>
                        <a href=""
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Registrar Herramienta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Agrega este script al final del body o en la sección de scripts de tu vista Blade -->

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Selecciona los Encargados',
            theme: "classic"
        });
    });
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
    document.addEventListener('DOMContentLoaded', function () {
        setupImageContainer('imageContainer1','inputContainer1');
        // Puedes agregar más llamadas a setupImageContainer para otros divs
    });

    function setupImageContainer(containerId,inputID) {
        var imageContainer = document.getElementById(containerId);
        var fileInput = document.getElementById(inputID);

        imageContainer.addEventListener('click', function () {
            fileInput.click(); // Simula un clic en el input de tipo file
        });
    }

    function previewImage(event, querySelector){

        //Recuperamos el input que desencadeno la acción
        const input = event.target;

        //Recuperamos la etiqueta img donde cargaremos la imagen
        $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if(!input.files.length) return

        //Recuperamos el archivo subido
        file = input.files[0];

        //Creamos la url
        objectURL = URL.createObjectURL(file);

        //Modificamos el atributo src de la etiqueta img
        $imgPreview.src = objectURL;
                
    }
</script>

<script>

    function validarCantidad() {
        //var existencia = parseInt(document.getElementById('existencia').value);
        var cantidadInput = document.getElementById('cantidad');
        var precioInput = document.getElementById('precio');
        var cantidad = parseInt(cantidadInput.value);
        var precio = parseInt(precioInput.value);

        if (isNaN(precio) || precio < 1) {
            // La cantidad no es un número válido
            precioInput.setCustomValidity('Ingresa una cantidad válida.');
            document.getElementById('total').value = 0;
        } else {
            // La cantidad es válida
            precioInput.setCustomValidity('');
            if (isNaN(cantidad) || cantidad < 1) {
                // La cantidad no es un número válido
                cantidadInput.setCustomValidity('Ingresa una cantidad válida.');
                document.getElementById('total').value = 0;
            } else {
                // La cantidad es válida
                cantidadInput.setCustomValidity('');
                document.getElementById('total').value = precio * cantidad;
            }
        }
    }

</script>
