<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Registro de Empleado (Modo de Edición)") }}
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
                <a href="{{ route('mostrarBajas.show') }}"
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
                <form id="formulario" action={{ route("editarBaja.store",$empleado->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                            <p>
                                Datos del Empleado (Modo de Edición)
                            </p>
                        </div>
                        
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 block uppercase text-gray-800 font-bold">
                                        * Nombre
                                    </label>
                                    <p>
                                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nombre') border-red-800 bg-red-100 @enderror'
                                        required value="{{$empleado->nombre}}">
                                        
                                        @error('nombre')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_nacimiento" class="mb-1 block uppercase text-gray-800 font-bold">* Fecha de Nacimiento</label>
                                    <p>
                                        <input id="fecha_nacimiento" name="fecha_nacimiento" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" required
                                        value="{{$empleado->fecha_nacimiento}}"/>
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="curp" class="mb-1 block uppercase text-gray-800 font-bold">
                                        * Curp
                                    </label>
                                    <p>
                                        <input type="text" name="curp" id="curp" placeholder="Ingresa el CURP del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('curp') border-red-800 bg-red-100 @enderror'
                                        required value="{{$empleado->curp}}">
                                        
                                        @error('curp')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nss" class="mb-1 block uppercase text-gray-800 font-bold">
                                        NSS 
                                    </label>
                                    <p>
                                        <input type="text" name="nss" id="nss" placeholder="Ingresa el NSS del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nss') border-red-800 bg-red-100 @enderror'
                                        value="{{$empleado->nss}}">
                                        
                                        @error('nss')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="num_clinicaSS" class="mb-1 block uppercase text-gray-800 font-bold">
                                        Numero de Clinica del IMSS (si aplicase)
                                    </label>
                                    <p>
                                        <input type="number" name="num_clinicaSS" id="num_clinicaSS" placeholder="Ingresa el número de la clinica del IMSS del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('num_clinicaSS') border-red-800 bg-red-100 @enderror'
                                        value="{{$empleado->num_clinicaSS}}">
                                        
                                        @error('num_clinicaSS')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="telefono" class="mb-1 block uppercase text-gray-800 font-bold">
                                        Telefono
                                    </label>
                                    <p>
                                        <input type="text" name="telefono" id="telefono" placeholder="Ingresa el número de telefono del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('telefono') border-red-800 bg-red-100 @enderror'
                                        value="{{$empleado->telefono}}">
                                        
                                        @error('telefono')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                            <p>
                                Datos de la Vacante (Modo de Edición)
                            </p>
                        </div>
                        
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">  
                                <div class='grid grid-cols-1'>
                                    <label for="puesto" class="mb-1 block uppercase text-gray-800 font-bold">
                                        * Puesto
                                    </label>
                                    <p>
                                        <select id="puesto" name="puesto" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            @foreach($puestos as $puesto)
                                                @if ($empleado->puesto == $puesto)
                                                    <option value="{{$puesto}}" selected>{{$puesto}}</option>
                                                @else
                                                    <option value="{{$puesto}}">{{$puesto}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('puesto')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_ingreso" class="mb-1 block uppercase text-gray-800 font-bold">* Fecha de Ingreso al Empleo </label>
                                    <p>
                                        <input id="ingreso_id" name="fecha_ingreso" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" required
                                        value="{{$empleado->fecha_ingreso}}" onchange="antiguedadFunction()"/>
                                    </p>
                                </div> 
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_baja" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Baja del Empleo </label>
                                    <p>
                                        <input id="baja_id" name="fecha_baja" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" required
                                        value="{{$empleado->fecha_baja}}" onchange="antiguedadFunction()"/>
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="antiguedad" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Antigüedad
                                    </label>
                                    <p>
                                        <input type="text" name="antiguedad" id="antiguedad" placeholder="Ingresa la antiguedad del empleado"
                                        class='focus:outline-none focus:ring-2 mb-1 bg-gray-200 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('antiguedad') border-red-800 bg-red-100 @enderror'
                                        value="{{$empleado->antiguedad}}" readonly>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="anticipacion" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Tiempo de Anticipación
                                    </label>
                                    <p>
                                        <input type="text" name="anticipacion" id="anticipacion" placeholder="Ingrese el tiempo de anticipación antes de la baja"
                                        class='focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('anticipacion') border-red-800 bg-red-100 @enderror'
                                        value="{{$empleado->anticipacion}}" required>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="causa" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Causa de la Baja
                                    </label>
                                    <p>
                                        <textarea id="causa" name="causa"
                                        class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent resize-none"
                                        required placeholder="Ingrese la causa de la baja">{{$empleado->causa}}</textarea>
                                    </p>
                                </div>
                            </div>     
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-3 mx-7"> 
                                <div class='grid grid-cols-1' onclick="openInput()" id="imageContainer1">
                                    <label for="imagen_perfil" class="mb-1 block uppercase text-gray-800 font-bold">
                                        Imagen del Empleado
                                    </label>
                                    @if ($empleado->imagen_perfil != '')                            
                                        <div style="width: 200px; height: 260px;" class='bg-white mt-2 text-center border-yellow-200 overflow-hidden mx-auto focus:outline-none focus:ring-2  focus:border-transparent p-2 w-5/6 rounded-lg border-2'>
                                            <img id="imgPreview1" src="{{ asset('/img/gestion/Empleados/' . $empleado->imagen_perfil) }}" style="width: 180px; height: 240px;">
                                        </div>
                                    @else
                                        <div style="width: 240px; height: 260px;" class='bg-white mt-2 text-center border-yellow-200 overflow-hidden mx-auto focus:outline-none focus:ring-2  focus:border-transparent p-2 w-5/6 rounded-lg border-2'>
                                            <img id="imgPreview1" src="{{ asset('img/gestion/Empleados/noImage.jpg') }}" style="width: 220px; height: 240px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7"> 
                                <div class="input-container">
                                    <input type="file" name="imagen_perfil" id="inputContainer1" class='bg-white  mt-4 border-black p-2 w-5/6 rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview1')">
                                </div>
                            </div>
                        </div>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                            <a href="{{ route('mostrarBajas.show') }}"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                            <button type="submit"
                                class='w-auto bg-green-600 hover:bg-green-700 rounded-lg shadow-xl font-bold text-white px-4 py-2'
                                >Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Agrega este script al final del body o en la sección de scripts de tu vista Blade -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setupImageContainer('imageContainer1','inputContainer1');
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

    function antiguedadFunction() {
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var SITEURL = "{{ url('/') }}";
        
        var baja = document.getElementById('baja_id').value;
        var ingreso = document.getElementById('ingreso_id').value;

        fetch(`${SITEURL}/gestion/bajas/antiguedad/${baja}/${ingreso}`, { method: 'get' })
            .then(response => response.json())
            .then(data => {
                document.getElementById("antiguedad").value = data.antiguedad;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }    

</script>
