<x-app2>
    @section('title', 'Portafolio de Evidencias')

    <body>
        <section class="d-flex align-items-center" style="font-family:Lato;position: relative;background-color:#fff" >
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1 style="font-size:60px;color:black">Bienvenido(a)s a <span style="font-weight:600;color:black">PIXEL </span><span style="color:#3329AE;font-weight:600">PERFECT.</span></h1>
                <h2 style="color:#343434">El lugar perfecto para organizar su <span style="color:#3329AE;font-weight:700">negocio.</span></h2>
            </div>
        </section>
        
        <main id="main">
            <section>
                <div class="container flex justify-between content-center rounded-lg" style="background-color: #343434;color:white" data-aos="fade-up">
                    <div class="w-2/3 py-4 justify-center content-center p-2 mx-4 my-2" style="flex-wrap: wrap;text-align:justify">
                        <p>
                            Con nosotros podrás encontrar soluciones inovadoras y automatizadas para tu negocio.
                        </p>
                        <br>
                        <b>Desde:</b>
                        <li>Conexiones a lectores de huellas.</li>
                        <li>Exportación a excel, pdf y, o word.</li>
                        <li>Puntos de venta.</li>
                        <li>Envios de correos automáticos.</li>
                        <li>Gestión de empleados (contratos, permisos, liquidaciones y actas administrativas).</li>
                        <li>Gestión de insumos (herramientas, uniformes, mermas y solicitud a proveedores automática).</li>
                        <li>Gestión de Horarios (asignaciones de trabajadores, faltas, retardos y vacaciones).</li>
                    </div>
                    <div class="w-1/3 flex justify-between">
                        <p style="color:#343434">aa</p>
                        <img src="{{asset('assets/portafolio1.jpg')}}" class="rounded-lg" alt="Portafolio img 1"/>
                    </div>
                </div>
                </div>
            </section><!-- End Featured Services Section -->

            {{-- <!-- ======= Contact Section ======= -->
            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a> --}}
    </body>
</x-app2>