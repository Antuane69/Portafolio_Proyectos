<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Crear Solicitud Vehicular") }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('siveInicio.show') }}"
                    class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
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
                <form id="formulario" action={{ route('crearsolicitud.store') }} method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        @csrf
                        <div class='grid grid-cols-1'>
                            <label for="RPE" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                RPE
                            </label>
                            <p>
                                @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))                                   <input type="text" name="RPE" id="RPE" placeholder="Tu RPE"
                                    class='border-green-600 focus:outline-none focus:ring-2 mb-2 focus:ring-green-500 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-full @error(' RPE') border-red-800 bg-red-100 @enderror'
                                    value="{{ auth()->user()->rpe }}">
                                @else
                                    <input type="text" name="RPE" id="RPE" placeholder="Tu RPE"
                                    class='border-green-600 focus:outline-none focus:ring-2 mb-2 focus:ring-green-500 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-full bg-gray-200 @error(' RPE') border-red-800 bg-red-100 @enderror'
                                    value="{{ auth()->user()->rpe }}" readonly>
                                @endif
                                
                                @error('RPE')
                                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Solicitante" class=" mb-2 bloack uppercase text-gray-800 font-bold">
                                Nombre
                            </label>
                            <p>
                                @foreach ($solicitante as $solicita)
                                    <input type="text" name="Solicitante"
                                        value="{{ $solicita->nombre . ' ' . $solicita->paterno . ' ' . $solicita->materno }}"
                                        id="solicitante-input"
                                        class= 'mb-2 px-3 mt-1 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg bg-gray-200'
                                        readonly>
                                @endforeach
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Correo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Correo Electrónico
                            </label>
                            <p>                     
                                <input type="text" name="Correo"id="correo-input" class='border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 px-3 mb-2 mt-1 w-full rounded-lg bg-gray-200' readonly required>
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Zona" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                División
                            </label>
                                <p>
                                    <input type="text" id="Zona" name="Zona"
                                    class="p-2 px-3 mb-2 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent w-full bg-gray-200" value="{{Auth::user()->datos->getDivision->division_nombre}}" readonly>                                    
                                </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Proceso" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Zona
                            </label>
                                <p>
                                    <input id="Proceso" name="Proceso" class="p-2 px-3 mb-2 w-full rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-gray-200" readonly>
                                </p>                            
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Subproceso" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                SubÁrea
                            </label>
                            <p>
                                <input id="Subproceso" name="Subproceso"class="p-2 px-3 w-full rounded-lg border-2 border-green-600 mt-1 mb-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-gray-200"
                                value="{{ Auth::user()->datos->getSubarea->subarea_nombre}}" readonly>
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="Economico" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Económico
                            </label>
                            <p>
                                <select name="Economico" id="Economico" class="w-full mb-2 p-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" required>
                                </select>
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="bloack uppercase text-gray-800 font-bold">Clasificación</label>
                            <p>
                                <input id="clasificacion-input"
                                    class="w-full rounded-lg border-2 border-green-600 mt-1 mb-2 px-3 p-2 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                    placeholder="Clasificación del vehículo" type="text" readonly />
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="bloack uppercase text-gray-800 font-bold">Marca</label>
                            <p>
                                <input id="marca-input"
                                    class="w-full rounded-lg border-2 border-green-600 mt-1 mb-2 px-3 p-2 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                    placeholder="Marca del vehículo" type="text" readonly />
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">Modelo</label>
                            <p>
                                <input id="modelo-input"
                                    class="px-3 p-2 rounded-lg border-2 border-green-600 mb-2 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200 w-full"
                                    placeholder="Modelo del vehículo" type="text" readonly />
                            </p>
                        </div>
                        <div  class='grid grid-cols-1'>
                            <label for="fecha_inicio" class="mb-2 bloack uppercase text-gray-800 font-bold">Fecha Inicio del prestamo</label>
                            <input id="fecha_inicio" name="fecha_inicio" class="w-full mb-2 p-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                        </div> 
                        <div  class='grid grid-cols-1' > 
                            <label for="fecha_fin" class="mb-2 bloack uppercase text-gray-800 font-bold">Fecha Fin del prestamo</label>
                            <input id="fecha_fin" name="fecha_fin" class="w-full p-2 px-3 mb-2 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                        </div>
                        <div class='grid grid-cols-1' onclick="openInput()" id="imageContainer1">
                            <label for="Credencial" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Credencial de la CFE
                            </label>
                            <div style="width: 300px; height: 200px;" class='bg-white mt-2 text-center border-green-300 overflow-hidden mx-auto focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2'>
                                <img id="imgPreview1" style="width: 280px; height: 180px;">
                            </div>
                        </div>
                        <div class='grid grid-cols-1' onclick="openInput()" id="imageContainer2">
                            <label for="Licencia" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Licencia de Conducir Vigente
                            </label>
                            <div style="width: 300px; height: 200px;" class='bg-white mt-2 text-center border-green-300 overflow-hidden mx-auto focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2'>
                                <img id="imgPreview2" style="width: 280px; height: 180px;">
                            </div>
                        </div>
                        <div class='grid grid-cols-1'>
                            <div class="input-container">
                                <input type="file" name="Credencial" id="inputContainer1" class='bg-white border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview1')" required>
                            </div>
                        </div> 
                        <div class='grid grid-cols-1'>
                            <div class="input-container">
                                <input type="file" name="Licencia" id="inputContainer2" class='bg-white border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview2')" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">motivo:</label>
                            <textarea id="motivo" name="motivo"
                                class="p-2 px-3 mb-2 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent resize-none"
                                required placeholder="Ingrese el motivo del préstamo">{{ old('motivo') }}</textarea>
                            @error('motivo')
                                <span style="font-size: 10pt;color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <a href="{{ route('siveInicio.show') }}"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                            <button type="submit"
                                class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                >Enviar Solicitud</button>
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
        setupImageContainer('imageContainer2','inputContainer2');
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
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    var SITEURL = "{{ url('/') }}";
    var rpeInput = document.getElementById('RPE');
    var economicoInput = document.getElementById('Economico');
    var zonaInput = document.getElementById('Proceso');
    function busquedaRPE() {
        var inputValue = rpeInput.value;
        var inputValue3 = zonaInput.value;
        buscarRPE(inputValue, inputValue3);
    }

    function busquedaEconomico() {
        var inputValue2 = economicoInput.value;
        buscarEconomico(inputValue2);
    }

    rpeInput.addEventListener("input", busquedaRPE);
    economicoInput.addEventListener("input", busquedaEconomico);

    buscarRPE(rpeInput.value, zonaInput.value);
    buscarEconomico(economicoInput.value);

    function buscarRPE(rpe, zona) {
        console.log(zona);
        if (rpe.length == 5) {
            fetch(`${SITEURL}/solicitudes/crearsolicitudes/buscar?RPE=${rpe}&zona=${zona}`, { method: 'get' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("solicitante-input").value = data.solicitante.nombreCompleto;
                    document.getElementById("correo-input").value = data.solicitante.email;
                    document.getElementById("Zona").value = data.solicitante.nombreDivision;
                    document.getElementById("Proceso").value = data.solicitante.nombreArea;
                    document.getElementById("Subproceso").value = data.solicitante.nombreSubarea;
                    var opciones = '<option value="" disabled selected hidden>Selecciona un económico</option>';
                    if (data.leconomicos && data.leconomicos.length > 0) {
                        for (let Economico of data.leconomicos) {
                            opciones += `<option value="${Economico}">${Economico}</option>`;
                        }
                    } else {
                        opciones += '<option value="" disabled>No hay económicos disponibles</option>';
                    }
                    document.getElementById("Economico").innerHTML = opciones;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            document.getElementById("solicitante-input").value = "";
            document.getElementById("correo-input").value = "";
            document.getElementById("Zona").value = "";
            document.getElementById("Proceso").value = "";
            document.getElementById("Subproceso").value = "";
            var economicoSelect = document.getElementById("Economico");
            economicoSelect.innerHTML = '<option value="" disabled selected>Selecciona un económico</option>'
            document.getElementById("marca-input").value = "";
            document.getElementById("modelo-input").value = "";
        }
    }

    function buscarEconomico(Economico) {
        if (Economico.length > 0) {
            fetch(SITEURL+ `/solicitudes/crearsolicitudes/buscarvehiculo?Economico=${Economico}`, { method: 'get' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("marca-input").value = data.vehiculo["marca"];
                    document.getElementById("modelo-input").value = data.vehiculo["modelo"];
                    document.getElementById("clasificacion-input").value = data.vehiculo["clasificacion"];
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            document.getElementById("marca-input").value = "";
            document.getElementById("modelo-input").value = "";
            document.getElementById("clasificacion-input").value = "";
        }
    } 
});
</script>

<script>
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
</script>
