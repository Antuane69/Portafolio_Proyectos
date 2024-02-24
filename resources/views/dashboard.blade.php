<x-app2>

    @section('title', 'Little-Tokyo Administración')

    <body>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center" style="background-color: #80D5FD">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1>Bienvenido(a) a <span style="color: #851B1B">Little Tokyo.</span></h1>
                <h2>Sistema de Administración de Personal e Insumos.</h2>
                <div class="d-flex">
                    <a href="#featured-services" class="btn-get-started scrollto" style="color: #000000; background:#FFFF7B"><b>Opciones</b></a>
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
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('empleadosInicio.show') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 100%;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Gestión de Empleados</h4>
                                    <p class="description">Aquí podrá dar de Alta y Baja a los empleados, así como
                                                           Registrar Vacaciones, Registrar Permisos, Registrar Incapacidades
                                                           y, Registrar Faltas o Actas Administrativas.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a class="card-link" href="{{ route('almacenInicio.show') }}">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 100%;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Almacén</h4>
                                    <p class="description">Aquí podrá Registrar los Uniformes y Herramientas entrantes así como
                                                           su posterior asignación a un Empleado o al Almacén.
                                                           Y, toda la información que les corresponde.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 100%;">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M210.78,39.25l-130.25-23A16,16,0,0,0,62,29.23l-29.75,169a16,16,0,0,0,13,18.53l130.25,23h0a16,16,0,0,0,18.54-13l29.75-169A16,16,0,0,0,210.78,39.25ZM178.26,224h0L48,201,77.75,32,208,55ZM89.34,58.42a8,8,0,0,1,9.27-6.48l83,14.65a8,8,0,0,1-1.39,15.88,8.36,8.36,0,0,1-1.4-.12l-83-14.66A8,8,0,0,1,89.34,58.42ZM83.8,89.94a8,8,0,0,1,9.27-6.49l83,14.66A8,8,0,0,1,174.67,114a7.55,7.55,0,0,1-1.41-.13l-83-14.65A8,8,0,0,1,83.8,89.94Zm-5.55,31.51A8,8,0,0,1,87.52,115L129,122.29a8,8,0,0,1-1.38,15.88,8.27,8.27,0,0,1-1.4-.12l-41.5-7.33A8,8,0,0,1,78.25,121.45Z"></path></svg>
                                    </div>
                                    <h4 class="title">Formatos</h4>
                                    <p class="description">Aquí encontrará los diferentes apartados para la creación
                                                           de diversos documentos como Recibos de Uniforme y Herramientas
                                                           y la Creación de Actas Administrativas. 
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </section><!-- End Featured Services Section -->

            <!-- ======= Contact Section ======= -->
            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
    </body>
</x-app2>