<x-app2>

    @section('title', 'DCJ - CFE')

    <body>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1>Bienvenid@ a <span>SIVE.</span></h1>
                <h2>Sistema de Registro de Parque Vehicular de la CFE.</h2>
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
                        <div class="col-md-3 mb-5">
                            <a class="text-white">
                                <div class="card text-white border-2 rounded-lg overflow-hidden" style="background-color: #148F77 ">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Vehículos Prestados</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3"></p>                                 
                                    </div>
                                    <div class="text-white p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md" style="background-color: #1F4D42">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-5">
                            <a  class="text-white">
                                <div class="card text-white border-2 rounded-lg overflow-hidden" style="background-color: #5D6D7E">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Vehiculos en Mantenimiento</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3"></p>                                 
                                    </div>
                                    <div class="text-white p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md" style="background-color: #1B2631">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-5">
                            <a class="text-white">
                                <div class="card text-black border-5 border-black rounded-lg overflow-hidden" style="background-color: #F4D03F">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3 ">Vehículos en Siniestro</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3"></p>                                 
                                    </div>
                                    <div class="text-white p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md" style="background-color: #9A7D0A">
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
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M226.76,69a8,8,0,0,0-12.84-2.88l-40.3,37.19-17.23-3.7-3.7-17.23,37.19-40.3A8,8,0,0,0,187,29.24,72,72,0,0,0,88,96,72.34,72.34,0,0,0,94,124.94L33.79,177c-.15.12-.29.26-.43.39a32,32,0,0,0,45.26,45.26c.13-.13.27-.28.39-.42L131.06,162A72,72,0,0,0,232,96,71.56,71.56,0,0,0,226.76,69ZM160,152a56.14,56.14,0,0,1-27.07-7,8,8,0,0,0-9.92,1.77L67.11,211.51a16,16,0,0,1-22.62-22.62L109.18,133a8,8,0,0,0,1.77-9.93,56,56,0,0,1,58.36-82.31l-31.2,33.81a8,8,0,0,0-1.94,7.1L141.83,108a8,8,0,0,0,6.14,6.14l26.35,5.66a8,8,0,0,0,7.1-1.94l33.81-31.2A56.06,56.06,0,0,1,160,152Z"></path></svg>
                                        
                                    </div>
                                    <h4 class="title">Mantenimiento</h4>
                                    <p class="description">Ve al tablero de Mantenimiento, puedes crear y gestionar solicitudes de mantenimiento.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M128,72a8,8,0,0,1,8,8v56a8,8,0,0,1-16,0V80A8,8,0,0,1,128,72ZM116,172a12,12,0,1,0,12-12A12,12,0,0,0,116,172Zm124-44a15.85,15.85,0,0,1-4.67,11.28l-96.05,96.06a16,16,0,0,1-22.56,0h0l-96-96.06a16,16,0,0,1,0-22.56l96.05-96.06a16,16,0,0,1,22.56,0l96.05,96.06A15.85,15.85,0,0,1,240,128Zm-16,0L128,32,32,128,128,224h0Z"></path></svg>
                                    </div>
                                    <h4 class="title">Siniestros</h4>
                                    <p class="description">Ve al tablero de Siniestros, puedes crear y ver solicitudes de siniestros vehículares.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M216,72H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,64V192a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72Zm0,128H56a8,8,0,0,1-8-8V86.63A23.84,23.84,0,0,0,56,88H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,140Z"></path></svg>
                                    </div>
                                    <h4 class="title">Pagos administrativos</h4>
                                    <p class="description">Ve al tablero de Pagos administrativos, puedes crear y ver solicitudes de pagos administrativos y darles seguimiento.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper">
                            <a class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M241,69.66,221.66,50.34a8,8,0,0,0-11.32,11.32L229.66,81A8,8,0,0,1,232,86.63V168a8,8,0,0,1-16,0V128a24,24,0,0,0-24-24H176V56a24,24,0,0,0-24-24H72A24,24,0,0,0,48,56V208H32a8,8,0,0,0,0,16H192a8,8,0,0,0,0-16H176V120h16a8,8,0,0,1,8,8v40a24,24,0,0,0,48,0V86.63A23.85,23.85,0,0,0,241,69.66ZM64,208V56a8,8,0,0,1,8-8h80a8,8,0,0,1,8,8V208Zm80-96a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,112Z"></path></svg>
                                    </div>
                                    <h4 class="title">Combustibles</h4>
                                    <p class="description">Ve al tablero de Combustibles, puedes crear y ver registros.
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
    