<style> 
    .lineaSep1 .lineaSep1-foot {
        width: 0%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #3003ab;
    }
    .lineaSep1:hover .lineaSep1-foot{
        width: 56%;
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
    @section('title', 'Pixel Perfect - ' . $usuario->nombre_usuario)
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
                {{ __('Mi Perfil') }}
            </div>
        </span>
    </x-slot>
    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('perfil.guardar',$usuario->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex content-center text-center justify-center mb-4 mt-4">
                        <div class="mb-5 mt-3 ml-5 lineaSep1" style="width:25%;height:53%">
                            <span class="text-blue-700 text-center" style="margin-right:60px;font-weight:800;font-size:20px;margin-right:64px">Foto de Perfil:</span>
                            <div style="margin-right: 20%;margin-top:2%">
                                <div class="lineaSep1-foot"></div>
                            </div>
                            <div class="border-black flex justify-center items-center" onclick="openInput()" id="imageContainer1" style="width: 80%; height: 80%;border-width:2px;border-radius:10px;border-color: #0175a1;margin-top:13%">
                                <img id="imgPreview1" class='my-2' style="width: 90%; height: 90%;border-radius:200px" src="{{ asset('img/profile-pictures/' . $usuario->imagen_perfil) }}" alt="Imagen del Usuario">
                            </div>
                            <p>
                                <div class="input-container1">
                                    <input type="file" name="imagen_perfil" id="inputContainer1" class='bg-white mt-1 border-black p-2 w-6/6 border-2' accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview1')" style="border-color:#0175a1;background-color:#FFFFFF;margin-right:19%;width:80%;border-radius:10px">
                                </div>
                            </p>
                        </div>
                        <div class="text-center break-words lineaSep2 flex-wrap text-wrap mt-3" style="width: 70%">
                            <span class="text-blue-700 text-center" style="margin-right:60px;font-weight:800;font-size:20px;margin-right:64px">Datos de Contacto:</span>
                            <div style="margin-right:7%;margin-top:0.5%">
                                <div class="lineaSep2-foot"></div>
                            </div>
                            <div class="justify-between mt-10 grid grid-cols-2 md:grid-cols-3 md:gap-5 mr-10">
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Nombre(s)</label>
                                    <p>
                                        <input type="text" name="nombre" placeholder="Ingrese su nombre"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->nombre}}">
    
                                        @error('nombre')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="paterno" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Apellido Paterno</label>
                                    <p>
                                        <input type="text" name="apellido_paterno" placeholder="Ingrese su apellido paterno"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->apellido_paterno}}">
    
                                        @error('apellido_paterno')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="materno" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Apellido Materno</label>
                                    <p>
                                        <input type="text" name="apellido_materno" placeholder="Ingrese su apellido materno"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->apellido_materno}}">
    
                                        @error('apellido_materno')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="telefono" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Teléfono</label>
                                    <p>
                                        <input type="text" name="telefono" placeholder="Ingrese su número celular"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->telefono}}">
    
                                        @error('telefono')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="ubicacion" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Ubicación</label>
                                    <p>
                                        <input type="text" name="ubicacion" placeholder="Ingrese la ubicación de su empresa"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->ubicacion}}">
    
                                        @error('ubicacion')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="empresa" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Razón Social de la Empresa</label>
                                    <p>
                                        <input type="text" name="nombre_empresa" placeholder="Ingrese la razón social de su empresa"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->nombre_empresa}}">
    
                                        @error('nombre_empresa')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="username" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Nombre de Usuario</label>
                                    <p>
                                        <input type="text" name="nombre_usuario" placeholder="Ingrese su nombre de usuario"
                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->nombre_usuario}}">
    
                                        @error('nombre_usuario')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="correo" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">Correo Electronico</label>
                                    <p>
                                        <input type="email" name="email"
                                        class='focus:outline-none focus:ring-2 bg-gray-200 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->email}}" readonly>
    
                                        @error('email')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                                <div class='grid grid-cols-1'>
                                    <label for="password" class="mb-2 bloack uppercase font-bold">Contraseña</label>
                                    <p>
                                        <input type="password" class='bg-gray-200 focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        value="{{$usuario->password}}" readonly>
    
                                        @error('password')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                            </div>
                            <div class='flex mt-12 mb-2'>
                                <div style="margin-left:51%;margin-right:3%">
                                    <button type="submit"
                                        class='shadow-xl px-4 py-2'
                                        style="color:#fff;font-weight:600;background-color:#3003ab;transition: color 0.3s ease, background-color 0.3s ease;
                                        border-radius:10px" 
                                        onmouseover="this.style.backgroundColor='#1d0168'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#3003ab'; this.style.color='#ffffff';"
                                        >Guardar Cambios
                                    </button>
                                </div>
                                <div>
                                    <button class='shadow-xl px-4 py-2'
                                        style="color:#fff;font-weight:600;background-color:#b20000;transition: color 0.3s ease, background-color 0.3s ease;
                                        border-radius:10px" 
                                        onmouseover="this.style.backgroundColor='#740202'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#b20000'; this.style.color='#ffffff';" 
                                        type="button" id="opcionesButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Eliminar Cuenta
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>  
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content" style="width: 500px; height: 380px;border-radius:50px">
                            <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Eliminar Cuenta</h5>
                                <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                                transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                                onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                                onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                                >X</button>
                            </div>
                            <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);            
                            border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                <div class="flex w-full content-center justify-center text-center">
                                    <form action="{{ route('perfil.delete',$usuario->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 md:gap-2 mx-4">                    
                                            <div class='w-full items-center justify-center py-2 mb-8' style="border-radius:10px;background-color:#fff">
                                                <div class="my-2">
                                                    <p>
                                                        <strong>Estimado {{$usuario->nombre_usuario}}:</strong>
                                                    </p>
                                                    <span class="my-1 text-pretty">
                                                        Antes de eliminar su perfil de nuestra página, <br> debe saber que todos sus datos personales, configuraciones y preferencias serán eliminados permanentemente y no podrán ser recuperados.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class='grid grid-cols-1'>
                                                    <label for="password" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49;height:50px">* Contraseña</label>
                                                    <p>
                                                        <input type="password" name="password" placeholder="ingrese su contraseña"
                                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                                        required>
            
                                                        @error('password')
                                                            <span style="font-size: 10pt;color:red" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </p>
                                                </div> 
                                                <div class='grid grid-cols-1'>
                                                    <label for="password" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Contraseña <br> (Otra Vez)</label>
                                                    <p>
                                                        <input type="password" name="password_confirmation" placeholder="Ingrese su contraseña otra vez"
                                                        class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                                        required>
            
                                                        @error('password_confirmation')
                                                            <span style="font-size: 10pt;color:red" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </p>
                                                </div> 
                                            </div>
                                            <div class='flex items-center justify-center mt-4'>
                                                <button class='shadow-xl px-4 py-2'
                                                    style="color:#fff;font-weight:600;background-color:#b20000;transition: color 0.3s ease, background-color 0.3s ease;
                                                    border-radius:10px" 
                                                    onmouseover="this.style.backgroundColor='#740202'; this.style.color='#ffffff';" 
                                                    onmouseout="this.style.backgroundColor='#b20000'; this.style.color='#ffffff';" 
                                                    type="submit" id="opcionesButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Eliminar Cuenta
                                                </button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
</script>