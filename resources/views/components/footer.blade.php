<style>
    .logos-class{
        width:160px;
        height:160px;
        background-color:#fff;
        border-radius:15px;
        border: 2px solid black;
        cursor: pointer;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .footer-class{
        cursor: pointer;
        justify-content: space-between;
        margin-right: 16px;
        transition: transform 0.3s ease-in-out;
    }
    .footer-class:hover {
        transform: translateY(-10px); /* Ajusta el valor para cambiar la cantidad de elevación */
    }

    .linea-footer .linea-footer-d {
        width:30%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid white;
    }

    .linea-footer:hover .linea-footer-d{
        width: 100%;
    }
    .text-footer{
        color:white;
        transition: color 0.3s ease;
        text-shadow: 
        -0.5px -0.5px 0 #000,  
        0.5px -0.5px 0 #000,
        -0.5px 0.5px 0 #000,
        0.5px 0.5px 0 #000;
    }
    .text-footer:hover{
        color:#FFFA55;
    }
</style>
<footer>
    <div class="modal fade" id="exampleModal_registrarme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md">
            <div class="modal-content" style="width: 500px; height: 400px;border-radius:50px">
                <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">¡Crea tú Cuenta!</h5>
                    <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                    transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                    onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                    onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                    >X</button>
                </div>
                <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);            
                border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <div class="flex w-full content-center justify-center text-center">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 md:gap-2 mx-4">                    
                            <div class='items-center justify-center pt-1 pb-4'>
                                <form action="{{ route('auth.google') }}">
                                    <div class="inline-flex my-2 px-4 py-2 border-1 shadow-xl" style="border-radius:10px;background-color:#fff">
                                        <img src="{{ asset('assets/google.png')}}" style="width:16px;height:16px;margin-top:4px" alt="Logo Google">
                                        <button type="submit"
                                            class='ml-2'
                                            style="color:#1C0B49;font-weight:800" 
                                            >Registrate con Google</button>
                                    </div>
                                </form>
                                <div class="mt-4">
                                    <div class="linea-google"></div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('registro') }}">
                                @csrf
                                <div class="justify-between grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                    <div class='grid grid-cols-1'>
                                        <label for="username" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Nombre de Usuario</label>
                                        <p>
                                            <input type="text" name="nombre_usuario" placeholder="Ingrese su nombre de usuario"
                                            class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                            required>

                                            @error('nombre_usuario')
                                                <span style="font-size: 10pt;color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                    </div> 
                                    <div class='grid grid-cols-1'>
                                        <label for="correo" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Correo Electronico</label>
                                        <p>
                                            <input type="email" name="email_register" placeholder="Ingrese el correo registrado"
                                            class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                            required>

                                            @error('email_register')
                                                <span style="font-size: 10pt;color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                    </div> 
                                    <div class='grid grid-cols-1'>
                                        <label for="password" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49;height:50px">* Contraseña</label>
                                        <p>
                                            <input type="password" name="password_register" placeholder="Cree su contraseña"
                                            class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                            required>

                                            @error('password_register')
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
                                <div class='flex items-center justify-center'>
                                    <button type="submit"
                                        class='shadow-xl px-4 py-2 boton-iniciar-sesion'
                                        style="color:#000000;background-color:#fff;transition: color 0.3s ease, background-color 0.3s ease;" 
                                        onmouseover="this.style.backgroundColor='#FFFA55'; this.style.color='#000000';" 
                                        onmouseout="this.style.backgroundColor='#FFFFFF'; this.style.color='#000000';"
                                        >Crear Cuenta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal_iniciar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content" style="width: 500px; height: 400px;border-radius:50px">
                <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">¡Bienvenido de Vuelta!</h5>
                    <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                    transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                    onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                    onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                    >X</button>
                </div>
                <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);            
                border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <div class="flex w-full content-center justify-center text-center">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 md:gap-2 mx-4">                    
                            <div class='items-center justify-center pt-1 pb-4'>
                                <form action="{{ route('auth.google') }}">
                                    <div class="inline-flex my-2 px-4 py-2 border-1 shadow-xl" style="border-radius:10px;background-color:#fff">
                                        <img src="{{ asset('assets/google.png')}}" style="width:16px;height:16px;margin-top:4px" alt="Logo Google">
                                        <button type="submit"
                                            class='ml-2'
                                            style="color:#1C0B49;font-weight:800" 
                                            >Inicia Sesión con Google</button>
                                    </div>
                                </form>
                                <div class="mt-4">
                                    <div class="linea-google"></div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('iniciar_sesion') }}">
                                @csrf
                                <div class="flex justify-between">
                                    <div class='grid-cols-1'>
                                        <label for="correo" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Correo Electronico</label>
                                        <p>
                                            <input type="email" name="email" placeholder="Ingrese el correo registrado"
                                            class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                            required>

                                            @error('email')
                                                <span style="font-size: 10pt;color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                    </div> 
                                    <div class='grid-cols-1'>
                                        <label for="password" class="mb-2 bloack uppercase font-bold" style="color:#1C0B49">* Contraseña</label>
                                        <p>
                                            <input type="password" name="password" placeholder="Ingrese su contraseña"
                                            class='focus:outline-none focus:ring-2 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                            required>

                                            @error('password')
                                                <span style="font-size: 10pt;color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                    </div> 
                                </div>
                                <div class='flex items-center justify-center'>
                                    <button type="submit"
                                        class='shadow-xl px-4 py-2 boton-iniciar-sesion'
                                        style="color:#000000;background-color:#fff;transition: color 0.3s ease, background-color 0.3s ease;" 
                                        onmouseover="this.style.backgroundColor='#FFFA55'; this.style.color='#000000';" 
                                        onmouseout="this.style.backgroundColor='#FFFFFF'; this.style.color='#000000';"
                                        >Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal_cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="width: 500px; height: 240px;border-radius:50px">
                <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Solicita una Cotización</h5>
                    <button type="button" class="rounded-md px-3 py-1 uppercase" style="color:#fff;background-color:#B10505;
                    transition: color 0.3s ease, background-color 0.3s ease;font-weight:800;font-size:16px" data-bs-dismiss="modal"
                    onmouseover="this.style.backgroundColor='#7D0000'; this.style.color='#ffffff';" 
                    onmouseout="this.style.backgroundColor='#B10505'; this.style.color='#ffffff';"
                    >X</button>
                </div>
                <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);            
                border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <div class="flex w-full content-center justify-center text-center">
                        <form id="formulario" action={{ route('cotizacion.store') }} method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2 mx-3">                    
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 text-black bloack uppercase font-bold">
                                        * Razón Social de la Empresa
                                    </label>
                                    <p>
                                        <input type="text" id="nombre_input" placeholder="Nombre de la Empresa"
                                        class='focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        name="nombre_empresa" required>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 bloack text-black uppercase font-bold mx-4">
                                        * Nombre del Apoderado
                                    </label>
                                    <p>
                                        <input type="text" id="nombre_input" placeholder="Ingrese el nombre del apoderado"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        name="nombre_usuario" required @if(Auth::check()) value="{{auth()->user()->nombre}}" @endif>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 bloack text-black uppercase font-bold">
                                        * Correo
                                    </label>
                                    <p>
                                        <input type="text" id="nombre_input" placeholder="Ingrese su correo"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        name="email" required @if(Auth::check()) value="{{auth()->user()->email}}" @endif>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nombre" class="mb-1 bloack text-black uppercase font-bold">
                                        * Teléfono
                                    </label>
                                    <p>
                                        <input type="text" id="nombre_input" placeholder="Ingrese su teléfono"
                                        class=' focus:outline-none focus:ring-2 mb-1 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6'
                                        name="telefono" required @if(Auth::check()) value="{{auth()->user()->telefono}}" @endif>
                                    </p>
                                </div>
                                <div  class='grid grid-cols-1 col-span-2 mt-2'>
                                    <label for="comentarios" class="mb-2 bloack text-black uppercase font-bold">Comentarios / Requerimientos</label>
                                    <p>
                                        <textarea id="comentarios" name="comentarios"
                                            class="w-5/6 p-2 px-3 rounded-lg border-2  mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent resize-none"
                                            placeholder="Describa las necesidades de su negocio, o cualquier otra información relevante">{{ old('comentarios') }}</textarea>
                                        @error('comentarios')
                                            <span style="font-size: 10pt;color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div> 
                            </div>
                            <div class='flex items-center justify-center md:gap-8 gap-4 pb-2'>
                                <button type="submit"
                                    class='shadow-xl px-4 py-2 boton-enviar border-1'
                                    style="color:#ffffff;background-color:#1C0B49;transition: color 0.3s ease, background-color 0.3s ease;" 
                                    onmouseover="this.style.backgroundColor='#FFFA55'; this.style.color='#000000';" 
                                    onmouseout="this.style.backgroundColor='#1C0B49'; this.style.color='#ffffff';"
                                    >Enviar Solicitud</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-32 p-2 shadow-2xl" style="background-color: #1C0B49;border-top: white 0.5px solid">
        <div class="flex linea-footer">
            <div class="w-2/5 flex ml-8 mt-3">
                <div class="text-left uppercase" style="font-size:13px">
                    <p style="color: #FFFA55;font-weight:900;    
                    text-shadow: -0.5px -0.5px 0 #000,  0.5px -0.5px 0 #000,
                    -0.5px 0.5px 0 #000,0.5px 0.5px 0 #000;">Acerca de Nosotros</p>
                    <p class="mt-2" style="font-weight:200">
                        <a href="" class="text-footer">
                            Contactar con Soporte
                        </a>
                        <br>
                        <a href="{{ route('informacion') }}" class="text-footer">
                            Sobre Nosotros
                        </a>
                        <br>
                        <a href="{{ route('proyectos') }}" class="text-footer">
                            Nuestros Proyectos
                        </a>
                    </p>
                </div>
                <div class="text-left uppercase ml-24" style="font-size:13px">
                    <p style="color: #FFFA55;font-weight:900;text-shadow: -0.5px -0.5px 0 #000,  
                    0.5px -0.5px 0 #000, -0.5px 0.5px 0 #000, 0.5px 0.5px 0 #000;">Cuenta</p>
                    <p class="mt-2" style="font-weight:200">
                        <a href=" @if(Auth::check()) {{route('perfil',auth()->user()->nombre_usuario)}} @else  @endif " class="text-footer" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#exampleModal_iniciar" @endif>
                            Mi Perfil
                        </a>
                        <br>
                        <a href="" class="text-footer">
                            Mis Solicitudes
                        </a>
                        <br>
                        <a href="" class="text-footer" data-bs-toggle="modal" data-bs-target="#exampleModal_registrarme">
                            Crear Cuenta
                        </a>
                    </p>
                </div>
            </div>
            <div class="w-1/5 mt-1 content-center justify-center ml-3">
                <span style="font-weight:700;font-size:22px;color:white;text-shadow: -1px -1px 0 #000,  
                1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">
                    PIXEL PERFECT
                </span>
                <div class="mt-1" style="margin-right:86px">
                    <div class="linea-footer-d"></div>
                </div>
                <div class="inline-flex mt-3" style="margin-left:14px">
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=pixelperfect.nacif@gmail.com&su=Consulta&body=Hola,%20me%20gustaría%20más%20información%20sobre%20tus%20servicios." target="_blank">
                        <div class="footer-class">
                            <img src="{{asset('assets/correo2.png')}}" style="width:38px;height:38px" alt="Logo Facebook">
                        </div>
                    </a>
                    <a href="https://www.instagram.com/atun_dolorescr7" target="_blank">
                        <div class="footer-class">
                            <img src="{{asset('assets/instagram2.png')}}" style="width:35px;height:35px" alt="Logo Instagram">
                        </div>
                    </a>
                    <a href="https://wa.me/523221974630?text=Hola,%20me%20gustaría%20más%20información%20sobre%20tus%20servicios." target="_blank">
                        <div class="footer-class">
                            <img src="{{asset('assets/whatsapp2.png')}}" style="width:35px;height:35px" alt="Logo WhatsApp">
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-2/5 flex ml-10 no-wrap mt-3">
                <div class="text-right uppercase" style="font-size:13px">
                    <p style="color: #FFFA55;font-weight:900;text-shadow: -0.5px -0.5px 0 #000,  
                    0.5px -0.5px 0 #000,-0.5px 0.5px 0 #000,0.5px 0.5px 0 #000;">Compras</p>
                    <p style="font-weight:200">
                        <a href="{{ route('informacion.pagos') }}" class="text-footer">
                            Formas de Pago
                        </a>
                        <br>
                        <a href="CotizarProyecto" class="text-footer" data-bs-toggle="modal" data-bs-target="#exampleModal_cotizacion">
                            Cotizar un Proyecto
                        </a>
                        <br>
                        <a href="{{ route('informacion.proteccionDatos') }}" class="text-footer">
                            Protección de Datos
                        </a>
                    </p>
                </div>
                <div class="text-right uppercase ml-16" style="font-size:13px">
                    <p style="color: #FFFA55;font-weight:900;text-shadow: -0.5px -0.5px 0 #000,  
                    0.5px -0.5px 0 #000,-0.5px 0.5px 0 #000,0.5px 0.5px 0 #000;">Datos de Contacto</p>
                    <p style="font-weight:200">
                        <span class="text-footer">
                            @pixelPerfect
                        </span>
                        <br>
                        <span class="text-footer">
                            pixelperfect.nacif6068@gmail.com
                        </span>
                        <br>
                        <span class="text-footer">
                            +52 322 1974630
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #000;border-top:1px solid white" class='p-0.5'>
        <div class="container content-center items-center text-justify text-wrap mx-6 mt-2.5">
            <p style="color: white;font-weight:500;font-size:14px;">
                Copyright © 2024 - 2024 PixelPerfect. Todos los derechos reservados. La marca Pixel Perfect es una orgullosa start-up mexicana.
                El uso de este sitio está sujeto a las condiciones de uso expresas. Al utilizar este sitio, tú indicas que aceptas cumplir con estos Términos universales de servicio.
            </p>
        </div>
    </section>
</footer>