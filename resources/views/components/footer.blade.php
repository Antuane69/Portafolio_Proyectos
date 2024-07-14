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
                        <a href="" class="text-footer">
                            Sobre Nosotros
                        </a>
                        <br>
                        <a href="" class="text-footer">
                            Centro de Datos
                        </a>
                    </p>
                </div>
                <div class="text-left uppercase ml-24" style="font-size:13px">
                    <p style="color: #FFFA55;font-weight:900;text-shadow: -0.5px -0.5px 0 #000,  
                    0.5px -0.5px 0 #000, -0.5px 0.5px 0 #000, 0.5px 0.5px 0 #000;">Cuenta</p>
                    <p class="mt-2" style="font-weight:200">
                        <a href="" class="text-footer">
                            Mi Perfil
                        </a>
                        <br>
                        <a href="" class="text-footer">
                            Mis Solicitudes
                        </a>
                        <br>
                        <a href="" class="text-footer">
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
                        <a href="" class="text-footer">
                            Formas de Pago
                        </a>
                        <br>
                        <a href="" class="text-footer">
                            Cotizar un Proyecto
                        </a>
                        <br>
                        <a href="" class="text-footer">
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