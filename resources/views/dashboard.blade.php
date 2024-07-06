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
    transition: transform 0.5s ease;
}
/* 
.hover-container:hover {
    /* background-color: coral; 
    transform: scale(1.02);
} */

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

</style>
<x-app2>
    @section('title', 'Portafolio de Evidencias')

    <body>
        <section class="d-flex align-items-center shadow-xl text" style="font-family:Lato;position: relative;background: linear-gradient(to right, #1C0B49, #E5832C)">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1 style="font-size:60px;color:white">Bienvenido<span style="color:#3CE4E4">@</span>s a <span style="font-weight:600;color:white">PIXEL </span><span style="color:#FFFA55;font-weight:600">PERFECT.</span></h1>
                <h2 style="color:white">El lugar perfecto para organizar tu <span style="color:#FFFA55;font-weight:700">negocio.</span></h2>
            </div>
        </section>
        
        <main id="main">
            <section>
                <div class="container flex hover-container justify-between shadow-xl content-center rounded-lg text-md" style="background: #1C0B49;color:white" data-aos="fade-up">
                    <div class="w-2/3 py-4 justify-center content-center p-2 mx-4 my-2 text" style="flex-wrap: wrap;text-align:justify">
                        <p>
                            Con nosotros podrás encontrar soluciones inovadoras y automatizadas para tu negocio.
                        </p>
                        <br>
                        <b>Desde:</b>
                        <li>Conexiones a Lectores de Huellas.</li>
                        <li>Exportación a Excel, PDF y, o Word.</li>
                        <li>Puntos de Venta.</li>
                        <li>Envios de Correos Automáticos.</li>
                        <li>Gestión de Empleados (contratos, permisos, liquidaciones y actas administrativas).</li>
                        <li>Gestión de Insumos (herramientas, uniformes, mermas y solicitud a proveedores automática).</li>
                        <li>Gestión de Horarios (asignaciones de trabajadores, faltas, retardos y vacaciones).</li>
                    </div>
                    <div class="w-1/3 flex justify-between">
                        <p style="color:#343434">aa</p>
                        <img src="{{asset('assets/portafolio2.jpg')}}" class="rounded-lg" alt="Portafolio img 1"/>
                    </div>
                </div>
                <div class="container flex hover-container justify-between">
                    <div class="content-center py-4 p-2 w-2/3 shadow-xl rounded-lg text-md mt-12" style="background:#cb7020" data-aos="fade-up">
                        <div class="my-2 mx-4" style="flex-wrap: wrap;text-align:justify;color:white;font-size:18px">
                            <p style="font-size:22px;text-align:center;font-weight:600;">
                                Contamos con varios proyectos elaborados a empresas comerciales y administrativas como:
                            </p>
                            <div class="flex justify-between mt-16 flex-1 ml-16" style="width: 80%">
                                <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="{{asset('logos/cfeLogo.jpg')}}" style="width:140px;height:140px" alt="Logo CFE">
                                </button> 
                                <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="{{asset('logos/TokyoLogo.png')}}" style="width:140px;height:140px" alt="Logo CFE">
                                </button>
                                <button type="button" id="opcionesButton" class="logos-class rounded-md bg-white p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="{{asset('logos/TortalajaraLogo.jpeg')}}" style="width:140px;height:140px" alt="Logo CFE">
                                </button> 
                            </div>
                        </div>
                    </div>
                    <div class="py-4 p-2 content-center shadow-lg rounded-lg w-1/3 text-md mt-12 ml-3" style="background:#1C0B49" data-aos="fade-up">
                        <div class="my-2 mx-4 flex-col text" style="flex-wrap: wrap;text-align:justify;color:white;">
                            <div class="content-center">
                                <p class="uppercase text-2xl" style="font-weight:900">
                                    Con precios desde $1,500 mxn.
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
                    <div class="content-center py-4 p-2 shadow-xl rounded-lg mt-12" style="background:#1C0B49;width:45%;height:auto" data-aos="fade-up">
                        <p class="text-c2 text-center justify-center items-center text-white font-bold text-lg mb-4">Plantillas Enfocadas a la Optimización de Procesos</p>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 11"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="11" aria-label="Slide 12"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="12" aria-label="Slide 13"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="13" aria-label="Slide 14"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="14" aria-label="Slide 15"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="15" aria-label="Slide 16"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item shadow-xl active">
                                    <img src="{{ asset('Evidencias/LT_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/MN_3.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/TJ_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/RIJ_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/SIVE_1.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                    
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/LT_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 2">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/MN_5.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/RIJ_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/TJ_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/SIVE_2.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                 
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/LT_9.png') }}" class="d-block img-dentro-carousel" alt="Imagen 3">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/MN_7.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/TJ_3.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/RIJ_5.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
                                </div>
                                <div class="carousel-item shadow-xl">
                                    <img src="{{ asset('Evidencias/SIVE_9.png') }}" class="d-block img-dentro-carousel" alt="Imagen 1">
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
                    <div class="content-center py-4 p-2 shadow-xl rounded-lg mt-12 flex-col" style="background:#cb7020 ;width:53%" data-aos="fade-up">
                        <p class="titulo-texto mb-10" style="font-size: 28px;border-bottom: 2px solid #fff;padding-bottom: 2px;">
                            ¿Por qué contratar a Pixel Perfect?
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-4">
                            <div class='grid grid-cols-1' style="height: 200px">
                                <p class="titulo-texto">
                                    Solicitar es gratis 
                                </p>
                                <p class="texto-container">
                                    Puedes preguntar presupuestos y mandar tus solicitudes gratuitamente por aquí, por whatsapp y por nuestro correo. 
                                </p>
                            </div>
                            <div class='grid grid-cols-1' style="height: 200px">
                                <p class="titulo-texto">
                                    Manejo de dominios    
                                </p>
                                <p class="texto-container">
                                    Contamos con un dominio de la página en donde pagarías mensualmente, o si ya cuentas con uno subimos la página sin costo extra. 
                                </p>
                            </div>
                            <div class='grid grid-cols-1 mt-4' style="height: 200px">
                                <p class="titulo-texto">
                                    Calidad asegurada 
                                </p>
                                <p class="texto-container">
                                    Tu proyecto está protegido y no pagarás hasta que estés completamente de acuerdo con los resultados finales. 
                                </p>
                            </div>
                            <div class='grid grid-cols-1 mt-4' style="height: 200px">
                                <p class="titulo-texto">
                                    Automatización 
                                </p>
                                <p class="texto-container">
                                    Recibe y envía correos automáticamente. Además se pueden automatizar archivos de Excel y PDF con información dinámica.  
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="width: 1800px; min-height: 500px;">
                                <div class="modal-header" style="background:#1C0B49;color:white;font-weight:800">
                                    <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                                    <button type="button" class="rounded bg-white px-1 p-1 text-black" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                <div class="modal-body"  style="background: linear-gradient(#d5c6f6, #ffe7d1);">
                                    <div class="flex items-center content-center w-full">
                                        <div class="w-1/2 h-full">
                                            <div class="container bg-white">
                                                pppp
                                            </div>
                                        </div>
                                        <div class="w-1/2">
                                            <div class="grid grid-rows-1 md:grid-rows-1 gap-1 md:gap-2 mx-4">                    
                                                <div class='grid grid-rows-1 bg-red-500 h-1/2'>
                                                    aa
                                                </div>
                                                <div class='grid grid-rows-1 bg-yellow-500 h-1/2'>
                                                    bb
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
        </main>
    </body>
</x-app2>
<script src="{{ asset('js/app.js') }}"></script>

