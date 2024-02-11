<x-app2>

    @section('title', 'Little-Tokyo Administración')

    <body>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1>Bienvenido (a) a <span>Little Tokyo.</span></h1>
                <h2>Sistema de Administración de Personal e Insumos.</h2>
                <div class="d-flex">
                    <a href="#featured-services" class="btn-get-started scrollto"><b>Opciones</b></a>
                </div>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Featured Services Section ======= -->
            <section id="featured-services" class="featured-services" href="#services">
                <div class="container" data-aos="fade-up">
                    @php
                        // use App\Models\Vehiculo;
                        $delay = 0;
                        $espacio = 100;
                        $max = 400;
                    @endphp
                    <div class="row">
                        <div class="col-md-3 mb-5">
                            <a class="text-white">
                                <div class="card text-white rounded-lg overflow-hidden" style="background-color: #DC6A30">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Vehículos en Almacén</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3"></p>                                 
                                    </div>
                                    <div class="text-white p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md" style="background: #873106">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @can('users.index')
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                                <a class="card-link">
                                    <div class="icon-box service-box" data-aos="fade-up"
                                        data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                        <div class="icon">
                                            {{-- <i class="bx bx-group"></i> --}}
                                            <svg class="iconos" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                                <path fill="currentColor"
                                                    d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                            </svg>
                                        </div>
                                        <h4 class="title"> Usuarios</h4>
                                        <p class="description">Gestión de usuarios y roles, crea y da de baja usuarios.</p>
                                    </div>
                                </a>
                            </div>
                        @endcan
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M210.78,39.25l-130.25-23A16,16,0,0,0,62,29.23l-29.75,169a16,16,0,0,0,13,18.53l130.25,23h0a16,16,0,0,0,18.54-13l29.75-169A16,16,0,0,0,210.78,39.25ZM178.26,224h0L48,201,77.75,32,208,55ZM89.34,58.42a8,8,0,0,1,9.27-6.48l83,14.65a8,8,0,0,1-1.39,15.88,8.36,8.36,0,0,1-1.4-.12l-83-14.66A8,8,0,0,1,89.34,58.42ZM83.8,89.94a8,8,0,0,1,9.27-6.49l83,14.66A8,8,0,0,1,174.67,114a7.55,7.55,0,0,1-1.41-.13l-83-14.65A8,8,0,0,1,83.8,89.94Zm-5.55,31.51A8,8,0,0,1,87.52,115L129,122.29a8,8,0,0,1-1.38,15.88,8.27,8.27,0,0,1-1.4-.12l-41.5-7.33A8,8,0,0,1,78.25,121.45Z"></path></svg>
                                    </div>
                                    <h4 class="title">Solicitudes Vehiculares</h4>
                                    <p class="description">Ve al tablero de Solicitudes Vehiculares, puedes crear y gestionar solicitudes de petición de vehículos.
                                    </p>
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

                        <div class="row align-items-center justify-content-center" data-aos="fade-up"
                            data-aos-delay="100">

                            <a href="http://eticacorporativa.cfemex.com/Pages/default.aspx"
                                class="h-64 max-w-52 mx-1 w-52 px-3 py-1">
                                <div class="info-box max-w-52 h-64 w-52 mb-4 px-3 py-1">
                                    <div class="px-3 py-1 d-flex align-items-center justify-content-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            class="w-8 h-8 text-green-650 ">
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

                            <a class="h-64 max-w-52 w-52 mx-1 px-3 py-1">
                                <div class="info-box max-w-52 h-64 w-52 mb-4 px-3 py-1">
                                    <div class="px-3 py-1 d-flex align-items-center justify-content-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 31 31"
                                            class="w-8 h-8 text-green-650">
                                            <path d="M16,12a2,2,0,1,1,2-2A2,2,0,0,1,16,12Zm0-2Z" />
                                            <path
                                                d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                            <path
                                                d="M16,24a2,2,0,0,1-2-2V16a2,2,0,0,1,4,0v6A2,2,0,0,1,16,24Zm0-8v0Z" />
                                        </svg>
                                    </div>
                                    <h3>Soporte</h3>
                                    <p>Déjanos tus dudas o comentarios</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </section><!-- End Contact Section -->

            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
    </body>
</x-app2>