<x-app-layout>
    @section('title', 'Little-Tokyo Almacén')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Stock de Uniformes") }}
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
                <form id="formulario" action={{ route('crearStockUniformes.store') }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Stock de Uniformes
                        </p>
                    </div>
                    
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">  
                            <div  class='grid grid-cols-1'>
                                <label for="fecha_solicitud" class="mb-1 bloack uppercase text-gray-800 font-bold">* Fecha de la Solicitud</label>
                                <p>
                                    <input id="fecha" name="fecha_solicitud" class="w-5/6 mb-1 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" type="date" />
                                </p>
                            </div> 
                            <div class='grid grid-cols-1'>
                                <label for="tipo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Tipo de uniforme
                                </label>
                                <p>
                                    <select required id="tipo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' onchange="mostrarInput('tipo')" required>             
                                        <option value="">Seleccione una Opcion</option>
                                        @foreach($opciones2 as $opcion)
                                            <option value="{{$opcion}}">{{$opcion}}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>  
                        </div>
                    </div>
                    <div id="Id_nuevos" hidden>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                            <p>
                                Uniformes Nuevos
                            </p>
                        </div>
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7"> 
                                <div class='grid grid-cols-1'>
                                    <label for="nuevos_existencia" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Cantidad Nuevos
                                    </label>
                                    <p>
                                        <input id="Id_nuevos1" type="number" name="nuevos_existencia" placeholder="Ingresa la cantidad de uniformes nuevo"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        required>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nuevos_codigo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Codigo Nuevos
                                    </label>
                                    <p>
                                        <select required id="Id_nuevos2" name="nuevos_codigo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="">Seleccione una Opcion</option>
                                            @foreach($opciones2 as $opcion)
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>                  
                                <div class='grid grid-cols-1'>
                                    <label for="nuevos_talla" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Talla Nuevos Por Unidad
                                    </label>
                                    <p>
                                        <select required id="Id_nuevos3" name="nuevos_talla" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="">Seleccione una Opcion</option>
                                            @foreach($opciones as $opcion)
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nuevos_precio" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Precio Nuevos
                                    </label>
                                    <p>
                                        <input id="Id_nuevos4" type="number" name="nuevos_precio" placeholder="Ingresa el precio del uniforme nuevo"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                         required>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nuevos_descripcion" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Descripcion Nuevos
                                    </label>
                                    <p>
                                        <input id="Id_nuevos5" type="text" name="nuevos_descripcion" placeholder="Ingresa la descripcion del uniforme"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        required>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Id_usados" hidden>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                            <p>
                                Uniformes Usados
                            </p>
                        </div>
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7"> 
                                <div class='grid grid-cols-1'>
                                    <label for="usados_existencia" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Cantidad Usados
                                    </label>
                                    <p>
                                        <input id="Id_usados1" type="number" name="usados_existencia" placeholder="Ingresa la cantidad de uniformes usados"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        >
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="usados_codigo" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Codigo Usados
                                    </label>
                                    <p>
                                        <select id="Id_usados2" name="usados_codigo" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="">Seleccione una Opcion</option>
                                            @foreach($opciones2 as $opcion)
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>  
                                <div class='grid grid-cols-1'>
                                    <label for="usados_talla" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Talla Usados
                                    </label>
                                    <p>
                                        <select id="Id_usados3" name="usados_talla" id="usados_talla" class='w-5/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="">Seleccione una Opcion</option>
                                            @foreach($opciones as $opcion)
                                                <option value="{{$opcion}}">{{$opcion}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="usados_precio" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Precio Usados Por Unidad
                                    </label>
                                    <p>
                                        <input id="Id_usados4" type="number" name="usados_precio" placeholder="Ingresa el precio del uniforme usado"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        >
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="usados_descripcion" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                        * Descripcion Usados
                                    </label>
                                    <p>
                                        <input id="Id_usados5" type="text" name="usados_descripcion" placeholder="Ingresa la descripcion del uniforme"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href=""
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Registrar Stock de Uniformes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Agrega este script al final del body o en la sección de scripts de tu vista Blade -->
<script>
    function mostrarInput(Id_input){

        var input = document.getElementById(Id_input).value;

        if(input == "Nuevos"){
            document.getElementById('Id_usados').hidden = true; 

            document.getElementById('Id_usados1').required = false; 
            document.getElementById('Id_usados2').required = false; 
            document.getElementById('Id_usados3').required = false; 
            document.getElementById('Id_usados4').required = false; 
            document.getElementById('Id_usados5').required = false; 

            document.getElementById('Id_nuevos').hidden = false; 

            document.getElementById('Id_nuevos1').required = true; 
            document.getElementById('Id_nuevos2').required = true; 
            document.getElementById('Id_nuevos3').required = true; 
            document.getElementById('Id_nuevos4').required = true; 
            document.getElementById('Id_nuevos5').required = true; 

        }else if(input == "Usados"){
            document.getElementById('Id_nuevos').hidden = true; 

            document.getElementById('Id_nuevos1').required = false; 
            document.getElementById('Id_nuevos2').required = false; 
            document.getElementById('Id_nuevos3').required = false; 
            document.getElementById('Id_nuevos4').required = false; 
            document.getElementById('Id_nuevos5').required = false; 

            document.getElementById('Id_usados').hidden = false; 

            document.getElementById('Id_usados1').required = true; 
            document.getElementById('Id_usados2').required = true; 
            document.getElementById('Id_usados3').required = true; 
            document.getElementById('Id_usados4').required = true; 
            document.getElementById('Id_usados5').required = true; 
        }else{
            document.getElementById('Id_nuevos').hidden = false; 

            document.getElementById('Id_nuevos1').required = true; 
            document.getElementById('Id_nuevos2').required = true; 
            document.getElementById('Id_nuevos3').required = true; 
            document.getElementById('Id_nuevos4').required = true; 
            document.getElementById('Id_nuevos5').required = true; 

            document.getElementById('Id_usados').hidden = false; 

            document.getElementById('Id_usados1').required = true; 
            document.getElementById('Id_usados2').required = true; 
            document.getElementById('Id_usados3').required = true; 
            document.getElementById('Id_usados4').required = true; 
            document.getElementById('Id_usados5').required = true; 
        }
    }
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
        $("#fechaA").attr("value", today);
        $("#fechaB").attr("value", today);
        $("#fecha").attr("max", today);
    });

    $("#fecha").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $("#fechaA").datepicker({
        dateFormat: 'dd-mm-yy'
    });
</script>
