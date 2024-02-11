<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Solicitud Vehicular - (Modo de Edición)") }}
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
                <a href="{{ route('mostrarsolicitudes.show') }}"
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
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <form action={{ route('solicitud.editshow', $solicitud_id) }} method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        @csrf
                        <div class='mb-1 grid grid-cols-1'>
                            <label for="RPE" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                RPE
                            </label>
                            <p>
                                <input type="text" name="RPE" id="RPE" placeholder="Tu RPE"
                                    class='border-green-600 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 border-2 rounded-lg w-full'
                                    value="{{$solicitudes->RPE}}" readonly>
                            </p>
                        </div>
                        <div class='mb-1 grid grid-cols-1'>
                            <label for="Solicitante" class=" mb-2 bloack uppercase text-gray-800 font-bold">
                                RPE del Solicitante
                            </label>
                            <p>
                                <input type="text" name="Solicitante" value="{{$solicitudes->nombreCompleto}}" id="solicitante-input" class=' bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Correo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Correo Electrónico
                            </label>
                            <p>     
                                <input type="text" name="Correo" value="{{$solicitudes->email}}" id="correo-input" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>           
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Zona" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Zona
                            </label>
                            <p>
                                <input type="text" name="Zona" value="{{$solicitudes->Zona}}" id="Zona" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Proceso" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Proceso
                            </label>
                            <p>
                                <input type="text" name="Proceso" value="{{$solicitudes->Proceso}}" id="Proceso" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                            </p>
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Subproceso" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                SubProceso
                            </label>
                            <p>
                                <input type="text" name="Subproceso" value="{{$solicitudes->Subproceso}}" id="Subproceso" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="Economico" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Económico
                            </label>
                            <p>
                                <select name="Economico" id="Economico" class="w-full py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" required>
                                </select>
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="bloack uppercase text-gray-800 font-bold">Marca</label>
                            <p>
                            <input id="marca-input"
                                class="w-full rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                placeholder="Marca del vehículo" type="text" readonly />
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">Modelo</label>
                            <input id="modelo-input"
                                class="  py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                placeholder="Modelo del vehículo" type="text" readonly />
                        </div>
                        <div  class='grid grid-cols-1'>
                            <label for="fecha_inicio" class="mb-2 bloack uppercase text-gray-800 font-bold">Fecha Inicio del prestamo</label>
                            <input id="fecha_inicio" name="fecha_inicio" class="w-full py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                        </div> 
                        <div  class='grid grid-cols-1' > 
                            <label for="fecha_fin" class="mb-2 bloack uppercase text-gray-800 font-bold">Fecha Fin del prestamo</label>
                            <input id="fecha_fin" name="fecha_fin" class="w-full py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">motivo:</label>
                            <textarea id="motivo" name="motivo"
                                class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent resize-none"
                                required placeholder="Ingrese el motivo del préstamo">{{ old('motivo') }}</textarea>
                            @error('motivo')
                                <span style="font-size: 10pt;color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class='grid grid-cols-1'>
                            <label for="Licencia" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Licencia de Conducir Vigente
                            </label>
                            <input type="file" name="Licencia" id="Licencia" class='bg-white border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-4 w-full rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg">
                        </div>
                        <div class='grid grid-cols-1'>
                            <label for="Credencial" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Credencial de la CFE
                            </label>
                            <input type="file" name="Credencial" id="Credencial" class='bg-white border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-4 w-full rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg">
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <a href="{{ route('mostrarsolicitudes.show') }}"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                            <button type="submit"
                                class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                >Guardar Cambios</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</x-app-layout>

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
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                document.getElementById("marca-input").value = "";
                document.getElementById("modelo-input").value = "";
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
