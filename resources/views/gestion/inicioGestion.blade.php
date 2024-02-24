<x-app2>

    @section('title', 'Little-Tokyo Personal')

    <body>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center" style="background-color: #C7EDFF">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1>Bienvenido (a) a <span style="color: #851B1B">Little Tokyo.</span></h1>
                <h2>Sistema de Administración de Personal.</h2>
                <div class="d-flex">
                    <a href="#featured-services" class="btn-get-started scrollto shadow-md rounded-lg" style="color: #000000; background:#FFFF7B"><b>Opciones</b></a>
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
                        <div class="col-md-3 mb-5">
                            <a href="{{ route('mostrarEmpleado.show') }}" class="text-white">
                                <div class="card text-black rounded-lg overflow-hidden shadow-xl" style="background-color: #FFFF7B">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Empleados Activos</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$activos}}</p>                                 
                                    </div>
                                    <div class="p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md text-white" style="background-color: #3C3C3B">
                                        Mostrar Registros
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-5">
                            <a href="{{ route('mostrarBajas.show') }}" class="text-white">
                                <div class="card text-black rounded-lg overflow-hidden shadow-xl" style="background-color: #FFFF7B">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Empleados Inactivos</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$inactivos}}</p>                                 
                                    </div>
                                    <div class="p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md text-white" style="background-color: #3C3C3B">
                                        Mostrar Registros
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-8">
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('crearEmpleado.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 380px;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Alta de Empleados</h4>
                                    <p class="description text-justify">Aquí podrá dar de Alta a los Empleados y subir sus documentos si se tienen.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('mostrarEmpleado.show') }}" class="card-link">
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
                                    <h4 class="title">Mostrar Registro de Empleados</h4>
                                    <p class="description text-justify">Aquí se podrán ver los empleados activos del restaurante, y en sus opciones
                                        se podrán dar vacaciones, permisos, faltas y o crear y asignar diversos PDFs.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('mostrarBajas.show') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 380px;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Mostrar Registro de Bajas</h4>
                                    <p class="description text-justify">Aquí se podrán ver los empleados inactivos del restaurante, y todos
                                        los detalles al respecto de su estancia laboral e información personal.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('crearVacacion.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 380px;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Crear Registro de Vacaciones</h4>
                                    <p class="description text-justify">Aquí podrá crear registros de Vacaciones y asignarlos a los Empleados.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 320px;">
                            <a href="{{ route('mostrarVacaciones.show') }}" class="card-link">
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
                                    <h4 class="title">Mostrar Registro de Vacaciones</h4>
                                    <p class="description text-justify">Aquí se podrán ver las vacaciones registradas y su asignación a su respectivo trabajador.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 320px;">
                            <a href="{{ route('crearFaltas.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 294px;">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Crear Registro de Faltas Administrativas</h4>
                                    <p class="description text-justify">Aquí podrá crear registros de Faltas Administrativas y asignarlas a los Empleados.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 320px;">
                            <a href="{{ route('mostrarFaltas.show') }}" class="card-link">
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
                                    <h4 class="title">Mostrar Registro de Faltas Administrativas</h4>
                                    <p class="description text-justify">Aquí se podrán ver las Faltas Administrativas registradas y su asignación a su respectivo trabajador.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 320px;">
                            <a href="{{ route('crearIncapacidad.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 294px">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Crear Registro de Incapacidad</h4>
                                    <p class="description text-justify">Aquí podrá crear registros de Incapacidad y asignarlos a los Empleados.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('mostrarIncapacidades.show') }}" class="card-link">
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
                                    <h4 class="title">Mostrar Registro de Incapacidades</h4>
                                    <p class="description text-justify">Aquí se podrán ver las Incapacidades registradas y su asignación a su respectivo trabajador.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('crearPermisos.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}" style="height: 294px">
                                    <div class="icon">
                                        {{-- <i class="bx bx-group"></i> --}}
                                        <svg class="iconos" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192l1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                            <path fill="currentColor"
                                                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                                        </svg>
                                    </div>
                                    <h4 class="title">Crear Registros de Permisos</h4>
                                    <p class="description text-justify">Aquí podrá crear registros de Permisos y asignarlos a los Empleados.  
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 card-wrapper" style="height: 400px;">
                            <a href="{{ route('mostrarPermisos.show') }}" class="card-link">
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
                                    <h4 class="title">Mostrar Registros de Permisos</h4>
                                    <p class="description text-justify">Aquí se podrán ver los Permisos registrados y su asignación a su respectivo trabajador.  
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