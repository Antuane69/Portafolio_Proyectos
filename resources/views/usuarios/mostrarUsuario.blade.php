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
                @if (session()->has('success'))
                    <style>
                        .auto-fade {
                            animation: fadeOut 2s ease-in-out forwards;
                        }

                        @keyframes fadeOut {
                            0% {
                                opacity: 1;
                            }
                            90% {
                                opacity: 1;
                            }
                            100% {
                                opacity: 0;
                                display: none;
                            }
                        }
                    </style>
                    <div class="alert alert-success auto-fade px-2 inline-flex flex-row w-3/4 mb-2 mt-4 text-green-600" style="margin-left:10%">
                        {{ session()->get('success') }}
                    </div> 
                @endif
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
                                    <label for="password" class="mb-2 bloack uppercase font-bold" style="margin-right:10%">Contraseña</label>
                                    <p class="inline-flex">
                                        <input type="password" class='bg-gray-200 focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg'
                                        style="margin-left:10%;width:70%" readonly>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal_password_{{$usuario->id}}" style="text-decoration: none;margin-top:3%">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="margin-left:1%" class="h-8 w-8" viewBox="0 0 24 24" stroke-width="1.5" stroke="black">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>   
                                        </a>
                                    </p>
                                    @error('password')
                                        <span style="font-size: 10pt;color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                                    <label for="password" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Contraseña <br> (Confirmar)</label>
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
            <div class="modal fade" id="exampleModal_password_{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-md">
                    <div class="modal-content" style="width: 620px; height: 200px;border-radius:50px">
                        <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Cambiar de Contraseña</h5>
                            <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                            transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                            onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                            onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                            >X</button>
                        </div>
                        <div class="modal-body" style="background: linear-gradient(#d5c6f6, #ffe7d1);            
                        border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <div class="flex w-full content-center justify-center text-center">
                                <div class="grid grid-cols-1 md:grid-cols-1 gap-1 md:gap-2 mx-6">                    
                                    <form method="POST" action="{{ route('perfil.password',$usuario->id) }}">
                                        @csrf
                                        <div class="justify-between grid grid-cols-1 md:grid-cols-2 md:gap-3 mt-2 mb-1">
                                            <div class="grid grid-cols-1 mb-4 col-span-2">
                                                <label for="password-change" class="block uppercase font-bold mb-1 mr-2" style="color:#1C0B49;">* Contraseña Actual</label>
                                                <div class="flex items-center w-3/5" style="margin-left:23%">
                                                    <input id="password-actual" type="password" name="current_password" placeholder=" @if($usuario->password == '') Autentificado con Google @else Escriba su contraseña actual @endif "
                                                        class="@if($usuario->password == '') bg-gray-200 @endif focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 rounded-lg w-full"
                                                        @if($usuario->password == '') readonly @else required @endif>
                                                    <a class="ml-2" style='cursor:pointer'>
                                                        <div id="eye-open-actual" onclick="viewPassword('open','actual')">
                                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>                                                      
                                                        </div>
                                                        <div id="eye-closed-actual" hidden onclick="viewPassword('closed','actual')">
                                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                            </svg>                                                                                                              
                                                        </div>
                                                    </a>
                                                </div>
                                                @error('current_password')
                                                    <span style="font-size: 10pt; color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="grid grid-cols-1 mb-2">
                                                <label for="password-change" class="block uppercase font-bold mb-1 mr-8" style="color:#1C0B49;">* Contraseña Nueva</label>
                                                <div class="flex items-center">
                                                    <input id="password-change" type="password" name="new_password" placeholder="Cree su contraseña"
                                                        class="focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 rounded-lg w-full"
                                                        required>
                                                    <a class="ml-2" style='cursor:pointer'>
                                                        <div id="eye-open-new" onclick="viewPassword('open','nueva')">
                                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>                                                      
                                                        </div>
                                                        <div id="eye-closed-new" hidden onclick="viewPassword('closed')">
                                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                            </svg>                                                                                                              
                                                        </div>
                                                    </a>
                                                </div>
                                                @error('new_password')
                                                    <span style="font-size: 10pt; color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class='grid grid-cols-1 mb-2 ml-3'>
                                                <label for="password_confirmation" class="block uppercase font-bold mb-1" style="color:#1C0B49;">* Contraseña (Confirmar)</label>
                                                <input type="password" name="new_password_confirmation" placeholder="Ingrese la nueva contraseña otra vez"
                                                    class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 rounded-lg w-full'
                                                    required>
                                                @error('new_password_confirmation')
                                                    <span style="font-size: 10pt;color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class='grid grid-cols-1 col-span-2 mb-3' style="text-align: center;">
                                                <span style="font-size:15px;color:#000000;font-weight:800;">* Mínimo 8 caracteres y 1 dígito numérico o especial.</span>
                                            </div>
                                        </div>
                                        <div class='flex items-center justify-center mt-4 mb-3'>
                                            <button type="submit"
                                                class='shadow-xl px-4 py-2 boton-iniciar-sesion'
                                                style="color:#000000;background-color:#fff;font-weight:800;border-radius:10px;transition: color 0.3s ease, background-color 0.3s ease;" 
                                                onmouseover="this.style.backgroundColor='#FFFA55'; this.style.color='#000000';" 
                                                onmouseout="this.style.backgroundColor='#FFFFFF'; this.style.color='#000000';"
                                                >Guardar Contraseña</button>
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

    function viewPassword(state,type){
        if(state == 'open'){
            if(type == 'actual'){
                document.getElementById('eye-open-actual').hidden = true;
                document.getElementById('eye-closed-actual').hidden = false;
                document.getElementById('password-actual').type = 'text';
            }else{
                document.getElementById('eye-open-new').hidden = true;
                document.getElementById('eye-closed-new').hidden = false;
                document.getElementById('password-change').type = 'text';
            }
        }else{
            if(type == 'actual'){
                document.getElementById('eye-open-actual').hidden = false;
                document.getElementById('eye-closed-actual').hidden = true;
                document.getElementById('password-actual').type = 'password';
            }else{
                document.getElementById('eye-open-new').hidden = false;
                document.getElementById('eye-closed-new').hidden = true;
                document.getElementById('password-change').type = 'password';
            }
        }
    }

</script>