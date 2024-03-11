<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Datos para la " . $titulo) }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('mostrarFaltas.show') }}"
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
                <form id="formulario" action={{ route('faltas.datospdf', $falta->id) }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Datos para la {{$titulo}}
                        </p>
                    </div>
                    
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                            <div class='grid grid-cols-1'>
                                <label for="nombre" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Testigos (3 en total)
                                </label>
                                <select name="nombresreg[]" class='form-control js-example-basic-multiple js-states' multiple="multiple" required>             
                                    @foreach($nombres as $nombre)
                                        <option value="{{$nombre}}">{{$nombre}}</option>
                                    @endforeach
                                </select>
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
                                <label for="falta" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Tipo de Falta al Reglamento
                                </label>
                                <p>
                                    <input type="text" name="falta" id="falta"
                                    class='bg-gray-200 focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('falta') border-red-800 bg-red-100 @enderror'
                                    required readonly value="{{$falta->falta_cometida}}">
                                    
                                    @error('falta')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            {{-- <div class='grid grid-cols-1'>
                                <label for="horario" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Horario al que Faltó
                                </label>
                                <p>
                                    <input type="text" name="horario" id="horario" placeholder="Ejemplo: 15:00 a 23:00"
                                    class=' focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('horario') border-red-800 bg-red-100 @enderror'
                                    required>
                                    
                                    @error('horario')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div> --}}
                            <div class='grid grid-cols-1'>
                                <label for="hechos" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Declaración de los Hechos
                                </label>
                                <p>
                                    <textarea id="hechos" name="hechos"
                                    class=" focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('hechos') border-red-800 bg-red-100 @enderror"
                                    required placeholder="Escriba lo que sucedió">{{ old('hechos') }}</textarea>
                                    
                                    @error('hechos')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_inicio" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de Aplicación de la Sanción</label>
                                <p>
                                    <input id="fecha" name="fecha_inicio"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" required/>
                                </p>
                            </div> 
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_fin" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha Fin de la Sanción</label>
                                <p>
                                    <input id="fechaA" name="fecha_fin"
                                    class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent" type="date" required/>
                                </p>
                            </div> 
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href="{{ route('mostrarFaltas.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Elaborar Acta</button>
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
        $("#fechaA").attr("value", today);
    });

    $("#fecha").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $("#fechaA").datepicker({
        dateFormat: 'dd-mm-yy'
    });

</script>