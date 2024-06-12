<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Datos para el Contrato")}}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('mostrarEmpleado.show') }}"
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
                <form id="formulario" action={{ route('empleados.datospdf', $empleado->id) }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Datos para el Contrato
                        </p>
                    </div>
                    
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                            <div class='grid grid-cols-1'>
                                <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Empleado
                                </label>
                                <p>
                                    <input type="text" name="nombre" id="nombre"
                                    class='bg-gray-200 focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('nombre') border-red-800 bg-red-100 @enderror'
                                    required readonly value="{{$empleado->nombre}}">
                                    
                                    @error('empleado')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="estadocivil" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Estado Civil
                                </label>
                                <p>
                                    <select id="estadocivil" name="civil" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                        @if ($empleado->civil == '')
                                            <option value="" disabled selected>Seleccione una Opcion</option>
                                        @endif
                                        @foreach($opciones2 as $opcion)
                                            @if ($empleado->civil == $opcion)
                                                <option value="{{$opcion}}" selected>{{$opcion}}</option>
                                            @else
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('estadocivil')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="sexo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Sexo
                                </label>
                                <p>
                                    <select id="sexo" name="sexo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                        @if ($empleado->sexo == '')
                                            <option value="" disabled selected>Seleccione una Opcion</option>
                                        @endif
                                        @foreach($opciones3 as $opcion)
                                            @if ($empleado->sexo == $opcion)
                                                <option value="{{$opcion}}" selected>{{$opcion}}</option>
                                            @else
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('sexo')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="descanso" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Día de Descanso
                                </label>
                                <p>
                                    <select id="descanso" name="descanso" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                        @if ($empleado->descanso == '')
                                            <option value="" disabled selected>Seleccione una Opcion</option>
                                        @endif
                                        @foreach($opciones4 as $opcion)
                                            @if ($empleado->descanso == $opcion)
                                                <option value="{{$opcion}}" selected>{{$opcion}}</option>
                                            @else
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('descanso')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="quincena" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Quincena
                                </label>
                                <p>
                                    <input type="number" name="quincena" id="quincena"
                                    class='focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('quincena') border-red-800 bg-red-100 @enderror'
                                    required placeholder="Ingrese la quincena en pesos mexicanos del Empleado" step="0.01" min="0" value="{{$empleado->quincena}}">
                                    
                                    @error('quincena')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="domicilio" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Domicilio
                                </label>
                                <p>
                                    <textarea id="domicilio" name="domicilio_contrato"
                                    class="focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('domicilio') border-red-800 bg-red-100 @enderror"
                                    required placeholder="Ingrese el domicilio del Empleado">{{$empleado->domicilio_contrato}}</textarea>
                                    
                                    @error('domicilio')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="tipo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Tipo de Contrato
                                </label>
                                <p>
                                    <select id="tipo" name="tipo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' onchange="mostrarInput()" required>             
                                        <option value="" disabled selected>Seleccione una Opcion</option>
                                        @foreach($opciones as $opcion)
                                            <option value="{{$opcion}}">{{$opcion}}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>

                            <div  class='grid grid-cols-1' id="fechasHidden" hidden>
                                <label for="fecha_inicio" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de inicio del Contrato</label>
                                <p>
                                    <input id="fecha" name="fecha_inicio"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" 
                                    type="date" required onchange="CambiarFecha()"/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1' id="fechasHidden2" hidden>
                                <label for="fecha_fin" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha Fin del contrato</label>
                                <p>
                                    <input id="fechaA" name="fecha_fin"
                                    class="w-5/6 mb-1 p-2 px-3 bg-gray-200 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" 
                                    value="{{$fechaTermino}}" type="text" required readonly/>
                                </p>
                            </div> 

                            <div  class='grid grid-cols-1' id="fechasHidden3" hidden>
                                <label for="fecha_inicio" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de inicio del Contrato indefinido</label>
                                <p>
                                    <input id="fechaC" name="fecha_indefinida"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" 
                                    type="date" required/>
                                </p>
                            </div> 
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href="{{ route('mostrarEmpleado.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Elaborar Contrato</button>
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
        $("#fechaC").attr("value", today);
    });

    $("#fecha").datepicker({
        dateFormat: 'dd-mm-yy'
    });

    $("#fechaC").datepicker({
        dateFormat: 'dd-mm-yy'
    });

    function mostrarInput(){
        var input = document.getElementById('tipo').value;

        if(input == "Contrato Indefinido"){
            document.getElementById('fechasHidden').hidden = true; 
            document.getElementById('fechasHidden2').hidden = true; 
            document.getElementById('fechasHidden3').hidden = false; 

        }else if(input == "Contrato de 30 Dias"){
            document.getElementById('fechasHidden').hidden = false; 
            document.getElementById('fechasHidden2').hidden = false; 
            document.getElementById('fechasHidden3').hidden = true; 

        }
    }

    // Función para sumar 30 días a una fecha
    function CambiarFecha() {
        var fechaInput = document.getElementById('fecha').value;
        var fechaInicial = new Date(fechaInput);

        var nuevaFecha = fechaInicial.setDate(fechaInicial.getDate() + 31);

        var date = new Date(nuevaFecha);

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + '/' + month + "/" + year;
        
        //$("#fecha").attr("value", today);

        document.getElementById('fechaA').value = today;
    }

</script>