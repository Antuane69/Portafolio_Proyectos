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
    transition: transform 0.5s ease-in-out;
}

.img-contenedor {
    width:300px;
    height:auto;
    background-color:#fff;
    border-radius:15px;
    border: 2px solid black;
    justify-content: center;
    align-items: center;
    display: flex;
}

.img-dentro-carousel {
    width: 800px;
    height: auto;
    max-height: auto;
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border: 2px solid black;
}

/* public/css/style.css */
.hover-container {
    transition: transform 0.2s ease;
}
/* 
.hover-container:hover {
    /* background-color: coral; 
    transform: scale(1.02);
} */

/* Efecto de hover */
.logos-class:hover {
    transform: translateY(-14px); /* Elevar la imagen 10px hacia arriba */
}

.text{
    text-shadow: 
        -1px -1px 0 #000,  
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000;
}
.text-c2{
    text-shadow: 
        -0.5px -0.5px 0 #000,  
        0.5px -0.5px 0 #000,
        -0.5px 0.5px 0 #000,
        0.5px 0.5px 0 #000;
}

.titulo-texto{
    font-size: 24px;
    font-weight: 700;
    align-content: center;
    align-items: center;
    display: flex;
    justify-content: center;
    margin-left: 6px;
    color: white;
    text-shadow: 
        -1px -1px 0 #000,  
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000;
}

.texto-container{
    font-size: 18px;
    font-weight: 200;
    display: flex;
    margin: 3px 3px 3px 3px;
    color:white;
    flex-wrap: wrap;
    text-align:justify;
    align-items: center;
    width: 80%;
    margin-left: 30px;
}

.linea-cot .linea-cot-foot {
    width:30%;
    margin: 0 auto;
    transition: width 0.3s ease;
    border-top:2px solid white;
}

.linea-cot:hover .linea-cot-foot{
    width: 60%;
}
.lineaPP .lineaPP-foot {
    width:30%;
    margin: 0 auto;
    transition: width 0.3s ease;
    border-top:2px solid white;
}

.lineaPP:hover .lineaPP-foot{
    width: 90%;
}
.contenedor-1 {
    border-bottom: 2px solid white; /* Borde inferior */
    border-right: 2px solid white;  /* Borde derecho */
}
.contenedor-2 {
    border-bottom: 2px solid white; /* Borde inferior */
    border-left: 2px solid white;  /* Borde derecho */
}

.boton-enviar{
    margin-top: 30px;
    width: auto;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 900;
    text-transform: uppercase;
}
.linea-google {
    width:80%;
    margin: 0 auto;
    border-top:2px solid black;
}
.boton-iniciar-sesion{
    margin-top: 25px;
    margin-bottom: 10px;
    width: auto;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 900;
    text-transform: uppercase;
}
</style>
<x-app-layout>
    @section('title', 'Pixel Perfect - Información')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="d-flex align-items-center shadow-xl" style="font-family:Lato;position: relative;background: linear-gradient(to right, #1C0B49, #E5832C)">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 style="font-size:60px;color:white">Bienvenido<span style="color:#3CE4E4">@</span>s a <span style="font-weight:600;color:white">PIXEL </span><span style="color:#FFFA55;font-weight:600">PERFECT.</span></h1>
            <h2 style="color:white" class="text-c2">El lugar perfecto para automatizar tu <span style="color:#FFFA55;font-weight:700">negocio.</span></h2>
        </div>
    </section>
    <section>
        <div class="flex hover-container justify-between shadow-xl content-center rounded-lg text-md" style="background: #1C0B49;color:white;width:82%;margin-left:9%" data-aos="fade-up">
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
                <div class="alert alert-success auto-fade px-2 inline-flex flex-row text-green-600">
                    {{ session()->get('success') }}
                </div> 
            @elseif (session()->has('error'))
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
                <div class="auto-fade inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="w-2/3 py-4 justify-center content-center p-2 mx-4 my-2 text" style="flex-wrap: wrap;text-align:justify">
                <p>
                    Con nosotros podrás encontrar soluciones inovadoras y automatizadas para tu negocio.
                </p>
                <b>Desde:</b>
                <li>Conexiones a Dispositivos de Terceros.</li>
                <li>Exportación a Excel, PDF y, o Word.</li>
                <li>Puntos de Venta.</li>
                <li>Envios de Correos, Mensajes y Solicitudes Automáticos.</li>
                <li>Gestión de Empleados (contratos, permisos, liquidaciones y actas administrativas).</li>
                <li>Gestión de Insumos (herramientas, uniformes, mermas y solicitud a proveedores automática).</li>
                <li>Gestión de Horarios (asignaciones de trabajadores, faltas, retardos y vacaciones).</li>
                <li>Y Más...</li>
            </div>
            <div class="w-1/3 flex justify-between">
                <img src="{{asset('assets/portafolio2.jpg')}}" class="rounded-lg" alt="Portafolio img 1"/>
            </div>
        </div>
        <div class="container flex hover-container justify-between">
            <div class="content-center py-4 p-2 w-2/3 shadow-xl rounded-lg text-md mt-12" style="background:#cb7020" data-aos="fade-up">
                <div class="my-2 mx-4" style="flex-wrap: wrap;text-align:justify;color:white;font-size:18px">
                    <p style="font-size:22px;text-align:center;font-weight:600;">
                        Contamos con varios proyectos elaborados a empresas comerciales y administrativas como:
                    </p>
                    <div class="flex justify-between my-8 flex-1 ml-16" style="width: 80%">
                        <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_CFE">
                            <img src="{{asset('logos/cfeLogo.jpg')}}" style="width:140px;height:140px" alt="Logo CFE">
                        </button> 
                        <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_Tokyo">
                            <img src="{{asset('logos/TokyoLogo.png')}}" style="width:140px;height:140px" alt="Logo Tokyo">
                        </button>
                        <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal_Tortas">
                            <img src="{{asset('logos/TortalajaraLogo.jpeg')}}" style="width:140px;height:140px" alt="Logo Tortalajara">
                        </button> 
                    </div>
                    <p style="font-size:22px;text-align:center;font-weight:600;">
                        Los proyectos realizados a estas empresas son completamente enfocados en aumentar la productividad de los empleadores, esto se logra con un sistema automatizado y ordenado para dedicar tu tiempo útil en cosas más importantes. <br>
                    </p>
                </div>
            </div>
            <div class="py-4 p-2 content-center shadow-lg rounded-lg w-1/3 text-md mt-12 ml-3" style="background:#1C0B49" data-aos="fade-up">
                <div class="my-2 mx-4 flex-col text" style="flex-wrap: wrap;text-align:justify;color:white;">
                    <div class="content-center">
                        <p class="uppercase text-2xl" style="font-weight:900">
                            Con precios desde $2,000 mxn.
                        </p>
                        <p class="text-md">
                            Aumenta la productividad de tu empresa dedicando el tiempo a cosas más importantes, deja el resto a la automatización de procesos.
                        </p>
                    </div>
                    <div>
                        <div class="img-contenedor">
                            <img src="{{asset('img/contenedor1.jpg')}}" style="border-radius: 15px" alt="Img1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container flex hover-container justify-between">
            <div id="section1" class="section linea-cot content-center shadow-xl rounded-lg mt-12 text-center justify-center items-center " style="background:#1C0B49;width:45%;height:auto" data-aos="fade-up">
                <div class="linea-cot-foot" style="margin-bottom:74px"></div>
            </div>
            <div class="content-center lineaPP py-4 p-2 shadow-xl rounded-lg mt-12 flex-col" style="background:#cb7020 ;width:53%" data-aos="fade-up">
                <p class="titulo-texto" style="font-size: 28px;">
                    ¿Por qué contratar a Pixel Perfect?
                    <div class="lineaPP-foot"></div>
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-4 mt-16">
                    <div class='grid grid-cols-1 contenedor-1' style="height: 250px">
                        <p class="titulo-texto">
                            Solicitar es gratis 
                        </p>
                        <p class="texto-container">
                            Puedes mandar tus solicitudes gratuitamente por aquí, por whatsapp y por nuestro correo, el presupuesto se te envía al contactar. 
                        </p>
                    </div>
                    <div class='grid grid-cols-1 contenedor-2' style="height: 250px">
                        <p class="titulo-texto">
                            Manejo de dominios    
                        </p>
                        <p class="texto-container">
                            Contamos con un dominio de la página en donde pagarías mensualmente, o si ya cuentas con uno subimos la página sin costo extra. 
                        </p>
                    </div>
                    <div class='grid grid-cols-1 mt-4 contenedor-1' style="height: 230px">
                        <p class="titulo-texto">
                            Calidad asegurada 
                        </p>
                        <p class="texto-container">
                            Tu proyecto está protegido y no pagarás hasta que estés completamente de acuerdo con los resultados finales. 
                        </p>
                    </div>
                    <div class='grid grid-cols-1 mt-4 contenedor-2' style="height: 230px">
                        <p class="titulo-texto">
                            Automatización 
                        </p>
                        <p class="texto-container">
                            Recibe y envía correos automáticamente. Además, se pueden automatizar archivos de Excel y PDF con información dinámica.  
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal_CFE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="width: 1800px; min-height: 500px;">
                        <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Sistema de Gestión Vehicular de CFE</h5>
                            <button type="button" class="rounded bg-white px-1 p-1 text-black" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);">
                            <div class="flex w-full" style="color:black">
                                <div class="w-1/2 h-full text-center content-center items-center justify-center"> 
                                    <div class="container flex content-center items-center justify-center bg-white mt-2" style="height: 340px;border-radius:15px">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item shadow-xl active">
                                                    <img src="{{ asset('Evidencias/LT_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/LT_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 2">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/LT_9.png') }}" class="d-block img-dentro-carousel" alt="Imagen 3">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-center" style="font-size:28px;margin-top:63px;width:90%;margin-left:26px">El costo total de este proyecto fue de <span class="font-bold">$30,000</span> mil pesos mexicanos</p>
                                </div>
                                <div class="w-1/2 ml-2">
                                    <div class="grid grid-rows-1 md:grid-rows-1 gap-1 md:gap-2 mx-4">                    
                                        <div class='grid grid-rows-1 mt-2 text-justify break-words text-wrap' style="font-size: 16px;font-weight:600">
                                            El sistema incluye las siguientes características: <br>
                                            <li><span style="font-weight: 800">Manejo de Cuentas:</span> Se tiene un registro de cuentas con roles administrativos o de personal para poder proteger información confidencial.</li> <br>
                                            <li><span style="font-weight: 800">Gestión de Inventarios:</span> Control preciso de stock, órdenes de compra automáticas y correos de bajos niveles de inventario.</li> <br>
                                            <li><span style="font-weight: 800">Control de Nómina:</span> Registro y seguimiento de todos los gastos nominales de cada empleado, asi como la alimentación por un lector de huellas externo.</li> <br>
                                            <li><span style="font-weight: 800">Manejo de Personal:</span> Administración de horarios, vacaciones, permisos, contratos y faltas administrativas.</li> <br>
                                            <li><span style="font-weight: 800">Reportes en PDF:</span> Generación de informes en formato PDF de manera automática y con información dinámica.</li> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal_Tokyo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="width: 1800px; min-height: 500px;">
                        <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Proyecto Administrativo y Financiero de Little Tokyo</h5>
                            <button type="button" class="rounded bg-white px-1 p-1 text-black" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);">
                            <div class="flex w-full" style="color:black">
                                <div class="w-1/2 h-full text-center content-center items-center justify-center"> 
                                    <div class="container flex content-center items-center justify-center bg-white mt-2" style="height: 340px;border-radius:15px">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item shadow-xl active">
                                                    <img src="{{ asset('Evidencias/LT_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/LT_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 2">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/LT_9.png') }}" class="d-block img-dentro-carousel" alt="Imagen 3">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-center" style="font-size:28px;margin-top:63px;width:90%;margin-left:26px">El costo total de este proyecto fue de <span class="font-bold">$30,000</span> mil pesos mexicanos</p>
                                </div>
                                <div class="w-1/2 ml-2">
                                    <div class="grid grid-rows-1 md:grid-rows-1 gap-1 md:gap-2 mx-4">                    
                                        <div class='grid grid-rows-1 mt-2 text-justify break-words text-wrap' style="font-size: 16px;font-weight:600">
                                            El sistema incluye las siguientes características: <br>
                                            <li><span style="font-weight: 800">Manejo de Cuentas:</span> Se tiene un registro de cuentas con roles administrativos o de personal para poder proteger información confidencial.</li> <br>
                                            <li><span style="font-weight: 800">Gestión de Inventarios:</span> Control preciso de stock, órdenes de compra automáticas y correos de bajos niveles de inventario.</li> <br>
                                            <li><span style="font-weight: 800">Control de Nómina:</span> Registro y seguimiento de todos los gastos nominales de cada empleado, asi como la alimentación por un lector de huellas externo.</li> <br>
                                            <li><span style="font-weight: 800">Manejo de Personal:</span> Administración de horarios, vacaciones, permisos, contratos y faltas administrativas.</li> <br>
                                            <li><span style="font-weight: 800">Reportes en PDF:</span> Generación de informes en formato PDF de manera automática y con información dinámica.</li> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal_Tortas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="width: 1800px; min-height: 500px;">
                        <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;font-size:22px">Gestión de Almacenamiento y Finanzas de Tortalajara</h5>
                            <button type="button" class="rounded bg-white px-1 p-1 text-black" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);">
                            <div class="flex w-full" style="color:black">
                                <div class="w-1/2 h-full text-center content-center items-center justify-center"> 
                                    <div class="container flex content-center items-center justify-center bg-white mt-2" style="height: 340px;border-radius:15px">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item shadow-xl active">
                                                    <img src="{{ asset('Evidencias/TJ_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/TJ_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/TJ_3.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                                <div class="carousel-item shadow-xl">
                                                    <img src="{{ asset('Evidencias/TJ_4.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-center" style="font-size:28px;margin-top:40px;width:90%;margin-left:26px">El costo total de este proyecto fue de <span class="font-bold">$4,000</span> mil pesos mexicanos</p>
                                </div>
                                <div class="w-1/2 ml-2">
                                    <div class="grid grid-rows-1 md:grid-rows-1 gap-1 md:gap-2 mx-4">                    
                                        <div class='grid grid-rows-1 mt-2 text-justify break-words text-wrap' style="font-size: 16px;font-weight:600">
                                            El sistema incluye las siguientes características: <br>
                                            <li><span style="font-weight: 800">Gestión de Inventarios:</span> Cálculo preciso y automático de mermas, y gestión de entradas y salidas de insumos.</li> <br>
                                            <li><span style="font-weight: 800">Gestión de Productos:</span> Cuenta con un apartado para subir un .csv del punto de venta del establecimiento y gestionar las ventas del día.</li> <br>
                                            <li><span style="font-weight: 800">Análisis Financiero:</span> Gestión de Entradas y Salidas monetarias del establecimiento, así como gráficas diarias y mensuales de estas. Además de Gráficas de; Insumos, Mermas y de Puntos de Equilibrio.</li> <br>
                                            <li><span style="font-weight: 800">Exportación en Excel:</span> Generación de informes en formato XLS de manera automática y mensual con sus respectivos registros financieros.</li> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
<script src="{{ asset('js/app.js') }}"></script>

