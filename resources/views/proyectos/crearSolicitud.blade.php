<style> 
    .lineaSep1 .lineaSep1-foot {
        width: 0%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #3003ab;
    }
    .lineaSep1:hover .lineaSep1-foot{
        width: 80%;
    }
    .lineaSep2 .lineaSep2-foot {
        width: 0%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #3003ab;
    }
    .lineaSep2:hover .lineaSep2-foot{
        width: 24%;
    }
</style>

<x-app-layout>
    @section('title', 'Pixel Perfect - Solicitar un Proyecto')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <span class="font-semibold text-md text-gray-800 flex content-center text-center">
            <div class="text-left">
                <a href='{{ route('dashboard') }}'
                    class='w-auto rounded-lg shadow-xl font-medium text-black px-4 py-2'
                    style="background:#FFFF7B;text-decoration: none;" onmouseover="this.style.backgroundColor='#FFFF3E';this.style.color='#000000';" onmouseout="this.style.backgroundColor='#FFFF7B'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
                </a>
            </div>
            <div class="ml-10 text-xl">
                {{ __('Solicitar Servicio') }}
            </div>
        </span>
    </x-slot>
    
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    @endsection

    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('proyectos.guardar_solicitud') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex content-center text-center justify-center mb-4 mt-4">
                        <div class="mb-5 mt-3 ml-4 lineaSep1" style="width:20%;height:53%;margin-right:3%">
                            <span class="text-blue-700 text-center" style="font-weight:800;font-size:20px;margin-top:1%">Adjuntar Evidencias:</span>
                            <div style="margin-top:2%;margin-bottom:17%">
                                <div class="lineaSep1-foot"></div>
                            </div>
                            <div>
                                <div id="dropzone" class="dropzone rounded-lg focus:outline-none focus:ring-2 mb-1 focus:ring-green-500 border-green-600 focus:border-transparent border-2 mt-2"></div>
                                <div id="archivos" style="width:90%;margin-top:4%;margin-left:4%">
                                    <x-file-row id="spare-file-row" class="hidden" />
                                </div>
                            </div>
                        </div>
                        <div class="text-center break-words lineaSep2 flex-wrap text-wrap mt-3" style="width: 70%">
                            <span class="text-blue-700 text-center" style="margin-right:60px;font-weight:800;font-size:20px;margin-right:64px">Datos de la Solicitud:</span>
                            <div style="margin-right:7%;margin-top:0.5%">
                                <div class="lineaSep2-foot"></div>
                            </div>
                            <div class="justify-between mt-10 grid grid-cols-2 md:grid-cols-3 md:gap-5 mr-10">
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Razón Social del Negocio</label>
                                    <p>
                                        <input type="text" name="nombre" placeholder="Ingrese el nombre deseado de la página"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        required>
    
                                        @error('nombre')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="adaptable" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Con Diseño Adaptable?</label>
                                    <p>
                                        <select id="adaptable" name="adaptable" class='w-6/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($respuestas as $respuesta)
                                                <option value="{{$respuesta}}">{{$respuesta}}</option>
                                            @endforeach
                                        </select>
    
                                        @error('adaptable')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="archivos" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Con Manejo de Archivos?</label>
                                    <p>
                                        <select id="archivos" name="archivos" class='w-6/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($respuestas as $respuesta)
                                                <option value="{{$respuesta}}">{{$respuesta}}</option>
                                            @endforeach
                                        </select>
    
                                        @error('archivos')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="commerce" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Es para un e-commerce?</label>
                                    <p>
                                        <select id="commerce" name="commerce" class='w-6/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($respuestas as $respuesta)
                                                <option value="{{$respuesta}}">{{$respuesta}}</option>
                                            @endforeach
                                        </select>
    
                                        @error('commerce')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="pagos" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Incluye Pagos en Línea?</label>
                                    <p>
                                        <select id="pagos" name="pagos" class='w-6/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($respuestas as $respuesta)
                                                <option value="{{$respuesta}}">{{$respuesta}}</option>
                                            @endforeach
                                        </select>
    
                                        @error('pagos')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="servidor" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Con Nuestro Dominio?</label>
                                    <p>
                                        <select id="servidor" name="servidor" class='w-6/6 mb-1 p-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:border-transparent' required>             
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($respuestas as $respuesta)
                                                <option value="{{$respuesta}}">{{$respuesta}}</option>
                                            @endforeach
                                        </select>
    
                                        @error('servidor')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* ¿Cúantos Usuarios la Usarán (Aproximadamente)?</label>
                                    <p>
                                        <input type="number" name="usuarios" placeholder="Ingrese la cantidad de usuarios (aproximadamente)"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        required>
    
                                        @error('usuarios')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1 col-span-2'>
                                    <label for="requerimientos" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Requerimientos y, o Comentarios Adicionales</label>
                                    <p class="bloack uppercase text-gray-800 font-bold mb-6">
                                        <textarea name="requerimientos"
                                            class="w-5/6 h-5/6 p-2 px-3 rounded-lg border-2 mt-4 mb-3 focus:outline-none focus:ring-2 focus:border-transparent"
                                            placeholder="Ingrese los requerimientos especificos para su proyecto">{{ old('requerimientos') }}</textarea>
    
                                        @error('descripcion')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                            </div>
                            <div class='flex mt-8 mb-2'>
                                <div style="margin-left:57%;margin-right:3%;">
                                    <button type="submit"
                                        class='shadow-xl px-4 py-2'
                                        style="color:#fff;font-weight:600;background-color:#3003ab;transition: color 0.3s ease, background-color 0.3s ease;
                                        border-radius:10px" 
                                        onmouseover="this.style.backgroundColor='#1d0168'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#3003ab'; this.style.color='#ffffff';"
                                        >Enviar Solicitud
                                    </button>
                                </div>
                                <div style="margin-top:1%">
                                    <a href="{{ route('dashboard') }}" class='shadow-xl px-4 py-2'
                                        style="color:#fff;font-weight:600;background-color:#b20000;transition: color 0.3s ease, background-color 0.3s ease;border-radius:10px" 
                                        onmouseover="this.style.backgroundColor='#740202'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#b20000'; this.style.color='#ffffff';">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>          
            </div>
        </div>
    </div>

    <script src="{{ asset('plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/custom-dropzone.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        const globals = {
            dropzone: new CustomDropzone({
                dropzoneSelector: 'div#dropzone',
                token: "{{ csrf_token() }}",
                url: "{{ route('upload') }}",
                spareId: 'div#spare-file-row',
                listId: 'archivos',
                dictDefaultMessage: 'Arrastre los archivos o haga click para subirlos',
            })
        };

        document.addEventListener('DOMContentLoaded', () => {
            globals.dropzone.init();
        })
    </script>
</x-app-layout>