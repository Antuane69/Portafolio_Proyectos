<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Alta de Empleado") }}
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
                <form id="formulario" action={{ route('crearEmpleado.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                            <p>
                                Datos del Empleado
                            </p>
                        </div>
                        
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Nombre
                                    </label>
                                    <p>
                                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nombre') border-red-800 bg-red-100 @enderror'
                                        required>
                                        
                                        @error('nombre')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_nacimiento" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Nacimiento</label>
                                    <p>
                                        <input id="fecha_nacimiento" name="fecha_nacimiento" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" required/>
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="curp" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Curp
                                    </label>
                                    <p>
                                        <input type="text" name="curp" id="curp" placeholder="Ingresa el CURP del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('curp') border-red-800 bg-red-100 @enderror'
                                        required>
                                        
                                        @error('curp')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="rfc" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        RFC
                                    </label>
                                    <p>
                                        <input type="text" name="rfc" id="rfc" placeholder="Ingresa el RFC del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('rfc') border-red-800 bg-red-100 @enderror'
                                        >
                                        
                                        @error('rfc')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nss" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        NSS 
                                    </label>
                                    <p>
                                        <input type="text" name="nss" id="nss" placeholder="Ingresa el NSS del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nss') border-red-800 bg-red-100 @enderror'
                                        >
                                        
                                        @error('nss')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="num_clinicaSS" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        Numero de Clinica del IMSS (si aplicase)
                                    </label>
                                    <p>
                                        <input type="number" name="num_clinicaSS" id="num_clinicaSS" placeholder="Ingresa el número de la clinica del IMSS del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('num_clinicaSS') border-red-800 bg-red-100 @enderror'
                                        >
                                        
                                        @error('num_clinicaSS')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="telefono" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        Telefono
                                    </label>
                                    <p>
                                        <input type="text" name="telefono" id="telefono" placeholder="Ingresa el número de telefono del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('telefono') border-red-800 bg-red-100 @enderror'
                                        >
                                        
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
                                Datos de la Vacante
                            </p>
                        </div>
                        
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">  
                                <div class='grid grid-cols-1'>
                                    <label for="puesto" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Puesto
                                    </label>
                                    <p>
                                        <input type="text" name="puesto" id="puesto" placeholder="Ingresa el puesto de trabajo del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('puesto') border-red-800 bg-red-100 @enderror'
                                        required>
                                        
                                        @error('puesto')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="salario_dia" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Salario Diario
                                    </label>
                                    <p>
                                        <input type="number" name="salario_dia" id="salario_dia" placeholder="Ingresa el salario diario del empleado"
                                        class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('salario_dia') border-red-800 bg-red-100 @enderror'
                                        >
                                        
                                        @error('salario_dia')
                                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </p>
                                </div>
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_ingreso" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Ingreso al Empleo </label>
                                    <p>
                                        <input id="fecha_ingreso" name="fecha_ingreso" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" required/>
                                    </p>
                                </div> 
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_2doContrato" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha del 2do. Contrato</label>
                                    <p>
                                        <input id="fecha_2doContrato" name="fecha_2doContrato" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                                    </p>
                                </div> 
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_3erContrato" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha del 3er. Contrato</label>
                                    <p>
                                        <input id="fecha_3erContrato" name="fecha_3erContrato" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                                    </p>
                                </div> 
                                <div  class='grid grid-cols-1'>
                                    <label for="fecha_indefinido" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha del Contrato Indefinido</label>
                                    <p>
                                        <input id="fecha_indefinido" name="fecha_indefinido" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                                    </p>
                                </div> 
                            </div>     
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-3 mx-7"> 
                                <div class='grid grid-cols-1' onclick="openInput()" id="imageContainer1">
                                    <label for="imagen_perfil" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        Imagen del Empleado
                                    </label>
                                    <div style="width: 200px; height: 260px;" class='bg-white mt-2 text-center border-yellow-200 overflow-hidden mx-auto focus:outline-none focus:ring-2  focus:border-transparent p-2 w-5/6 rounded-lg border-2'>
                                        <img id="imgPreview1" style="width: 180px; height: 240px;">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7"> 
                                <div class="input-container">
                                    <input type="file" name="imagen_perfil" id="inputContainer1" class='bg-white  mt-4 border-black p-2 w-5/6 rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview1')">
                                </div>
                            </div>
                        </div>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                            <a href="{{ route('empleadosInicio.show') }}"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                            <button type="submit"
                                class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                                >Dar de Alta</button>
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

{{-- <script>
    var fechaInicioInput = document.getElementsByName('fecha_inicio')[0];
    var fechaTerminoInput = document.getElementsByName('fecha_fin')[0];
    var fechaActual = new Date(new Date().toUTCString());
    var fechaActualString = fechaActual.toISOString().split('T')[0];
    fechaInicioInput.setAttribute('min', fechaActualString);
    fechaTerminoInput.setAttribute('min', fechaActualString);
    document.getElementById("formulario").addEventListener('submit', function (event){
        event.preventDefault();
        event.stopPropagation();
        var loader  =  document.getElementById("preloader");
        var fechaInicio = document.getElementById('fecha_inicio').value;
        var fechaTermino = document.getElementById('fecha_fin').value;
        if(fechaInicio > fechaTermino){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La fecha de término no puede ser anterior a la fecha de inicio.',
            }).then((result) => {
                if (result.isConfirmed) {
                    loader.style.display = "none";
                }
            });        
        }else {
            this.submit();
        }
    });
</script> --}}