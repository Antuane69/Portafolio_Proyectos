<x-app2>
    @section('title', 'SIVE - CFE')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Inicio <span>Reunión de inicio de jornada</span></h1>
            <h2>Aquí podrás autorizar las solicitudes vehiculares, Observar las solicitudes aceptadas y Consultar los
                vehículos en el almacen.</h2>
            <div class="d-flex">
                <a href="#featured-services" class="btn-get-started scrollto"><b>Sistemas</b></a>
                <!--<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Video de presentación </span></a>-->
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services" href="#services">
            <div class="container" data-aos="fade-up">

                @php
                $delay = 0;
                $espacio = 100;
                $max = 400;
                @endphp
                <div class="row">
                    <!-- Captura RIJ -->
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <a href="{{ route('mostrarsolicitudes.show') }}" class="card-link">
                            <div class="icon-box service-box" data-aos="fade-up"
                                data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
                                <div class="icon">
                                    <box-icon name='user-check' type="fill" size="lg" animation="tada"></box-icon>

                                    {{-- <i class="bx bx-paste"></i> --}}
                                    {{-- <svg class="iconos" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M20 11V5c0-1.103-.897-2-2-2h-3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H4c-1.103 0-2 .897-2 2v13c0 1.103.897 2 2 2h7c0 1.103.897 2 2 2h7c1.103 0 2-.897 2-2v-7c0-1.103-.897-2-2-2zm-9 2v5H4V5h3v2h8V5h3v6h-5c-1.103 0-2 .897-2 2zm2 7v-7h7l.001 7H13z" />
                                    </svg> --}}
                                </div>
                                @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                                    <h4 class="title">Autorizar o Rechazar Solicitudes</h4>
                                    <p class="description">En este enlace se podrán rechazar o autorizar solicitudes.</p>
                                @else
                                    <h4 class="title">Ver mis solicitudes</h4>
                                    <p class="description">En este enlace podrás ver las solicitudes que has hecho.</p>
                                @endif
                                
                            </div>
                        </a>
                    </div>
                    @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                            <a href="{{ route('historicoSolicitudes.show','Aceptada') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <box-icon name='book-bookmark' type="none" size="lg" animation="tada"></box-icon>
                                    </div>
                                    <h4 class="title">Mostrar Solicitudes Aceptadas</h4>
                                    <p class="description">En este enlace podrás observar las solicitudes aceptadas
                                        existentes.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                            <a href="{{ route('historicoSolicitudes.show','Rechazada') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <box-icon name='book-bookmark' type="none" size="lg" animation="tada"></box-icon>
                                    </div>
                                    <h4 class="title">Mostrar Solicitudes Rechazadas</h4>
                                    <p class="description">En este enlace podrás observar las solicitudes aceptadas
                                        existentes.</p>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <a href="{{ route('mostrarvehiculos.show') }}" class="card-link">
                            <div class="icon-box service-box" data-aos="fade-up"
                                data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                <div class="icon">
                                    <box-icon type='solid' name='car-garage' type="none" size="lg" animation="tada">
                                    </box-icon>
                                </div>
                                <h4 class="title">Mostrar Vehículos en Almacén</h4>
                                <p class="description">En este enlace podrás observar los vehículos en almacén.</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contacto</h2>
                    <h3><span>Contáctanos</span></h3>
                    <p>Aquí podrás encontrar información para obtener ayuda y soporte</p>
                </div>

                <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <a href="http://eticacorporativa.cfemex.com/Pages/default.aspx"
                        class="h-64 max-w-52 mx-1 w-52 px-3 py-1">
                        <div class="info-box max-w-52 h-64 w-52 mb-4 px-3 py-1">
                            <div class="px-3 py-1 d-flex align-items-center justify-content-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-650">
                                    <path
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012 2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                            </div>
                            <h3>Ética corporativa</h3>
                            <p>Descarga información y material que nos ayudan a la difusión y comprensión de los
                                códigos de ética y conducta.</p>
                        </div>
                    </a>

                    <a href="{{ route('soportes.create') }}" class="h-64 max-w-52 w-52 mx-1 px-3 py-1">
                        <div class="info-box max-w-52 h-64 w-52 mb-4 px-3 py-1">
                            <div class="px-3 py-1 d-flex align-items-center justify-content-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 31 31" class="w-8 h-8 text-green-650">
                                    <path d="M16,12a2,2,0,1,1,2-2A2,2,0,0,1,16,12Zm0-2Z" />
                                    <path
                                        d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                    <path d="M16,24a2,2,0,0,1-2-2V16a2,2,0,0,1,4,0v6A2,2,0,0,1,16,24Zm0-8v0Z" />
                                </svg>
                            </div>
                            <h3>Soporte</h3>
                            <p>Déjanos tus dudas o comentarios</p>
                        </div>
                    </a>
                </div>


            </div>

            </div>
        </section><!-- End Contact Section -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        </body>
</x-app2>