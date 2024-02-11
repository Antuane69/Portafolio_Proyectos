<x-app2>
    @section('title', 'DCJ - CFE')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Inicio <span>Solicitudes Vehiculares</span></h1>
            <h2>Aquí podrás realizar solicitudes vehículares y darles seguimiento realizando los respectivos formatos necesarios. Además, los administradores del parque vehicular de cada zona pueden realizar formatos de ingreso de vehículos.
            </h2>
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
                    <div class="col-md-3 mb-5">
                        <a href="{{ route('mostrarsolicitudes.show') }}" class="text-white">
                            <div class="card text-white rounded-lg overflow-hidden" style="background-color: #7E649E">
                                <div class="card-body">
                                    <div class="container flex">
                                        <h5 class="card-title text-xl-left font-extrabold mr-3">Solicitudes Pendientes</h5>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                        </svg>     
                                    </div>
                                    <p class="card-text text-sm-left ml-3">{{$pendientes}}</p>                                 
                                </div>
                                <div class="p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md text-white" style="background-color: #372948">
                                    Mostrar Información
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-5">
                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                            <a href="{{ route('historicoSolicitudes.show') }}">
                                <div class="card text-white bg-info border-2 rounded-lg overflow-hidden">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Solicitudes Aceptadas</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$aceptadas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-blue-900 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('mostrarsolicitudes.show') }}">
                                <div class="card text-white bg-info border-2 rounded-lg overflow-hidden">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Solicitudes Aceptadas</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$aceptadas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-blue-900 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-3 mb-5">
                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                            <a href="{{ route('historicoSolicitudes.show') }}" class="text-white">
                                <div class="card text-white bg-success border-2 rounded-lg overflow-hidden">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Solicitudes Autorizadas</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$autorizadas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-green-800 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('mostrarsolicitudes.show') }}" class="text-white">
                                <div class="card text-white bg-success border-2 rounded-lg overflow-hidden">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Solicitudes Autorizadas</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$autorizadas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-green-800 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-3 mb-5" style="color: #F8C471">
                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                            <a href="{{ route('historicoSolicitudes.show') }}" class="text-white">
                                <div class="card text-black border-5 border-black rounded-lg overflow-hidden" style="background-color: #D0D3D4">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Total de Solicitudes</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$activas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-gray-700 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('mostrarsolicitudes.show') }}" class="text-white">
                                <div class="card text-black border-5 border-black rounded-lg overflow-hidden" style="background-color: #D0D3D4">
                                    <div class="card-body">
                                        <div class="container flex">
                                            <h5 class="card-title text-xl-left font-extrabold mr-3">Total de Solicitudes</h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>     
                                        </div>
                                        <p class="card-text text-sm-left ml-3">{{$activas}}</p>                                 
                                    </div>
                                    <div class="text-white bg-gray-700 p-0.5 justify-center items-center text-center rounded-sm rounded-b-lg shadow-md">
                                        Mostrar Información
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <!-- Roles -->
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <a href="{{ route('crearsolicitud.create') }}" class="card-link">
                            <div class="icon-box service-box" data-aos="fade-up"
                                data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                <div class="icon">
                                    <svg class="iconos" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </div>
                                <h4 class="title">Crear Solicitudes</h4>
                                <p class="description">En este enlace podrás crear solicitudes vehiculares y seguir su progreso hasta que se autorice.</p>    
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <a href="{{ route('mostrarsolicitudes.show') }}" class="card-link">
                            <div class="icon-box service-box" data-aos="fade-up"
                                data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                <div class="icon">
                                    <svg class="iconos" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5m-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                                        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5z"/>
                                    </svg>
                                </div>
                                @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                                    <h4 class="title">Solicitudes Pendientes</h4>
                                    <p class="description">En este enlace podrás aceptar o rechazar las solicitudes pendientes de los usuarios.</p>                              
                                @else
                                    <h4 class="title">Mis Solicitudes</h4>
                                    <p class="description">En este enlace podrás ver tus solicitudes y su respectivo estado.</p>    
                                @endif
                            </div>
                        </a>
                    </div>
                    <!-- Aceptadas -->
                    <!-- Rechazadas -->
                    @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular')))
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                            <a href="{{ route('historicoSolicitudes.show','Aceptada') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5z"/>
                                        </svg>
                                    </div>
                                    <h4 class="title">Historico de Solicitudes</h4>
                                    <p class="description">En este enlace podrás ver las solicitudes que ya han sido aceptadas o rechazadas.</p>                                
                                </div>
                            </a>
                        </div>
                        {{-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                            <a href="{{ route('crearformulario.create') }}" class="card-link">
                                <div class="icon-box service-box" data-aos="fade-up"
                                    data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                    <div class="icon">
                                        <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256"><path d="M240,184h-8V57.9l9.67-2.08a8,8,0,1,0-3.35-15.64l-224,48A8,8,0,0,0,16,104a8.16,8.16,0,0,0,1.69-.18L24,102.47V184H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM40,99,216,61.33V184H192V128a8,8,0,0,0-8-8H72a8,8,0,0,0-8,8v56H40Zm136,53H80V136h96ZM80,168h96v16H80Z"></path></svg>
                                    </div>
                                    <h4 class="title">Registrar Vehiculo en Almacen</h4>
                                    <p class="description">En este enlace podrás registrar vehículos al almacen de la zona a la que pertenezca el Parque Vehicular.</p>
                                </div>
                            </a>
                        </div> --}}
                    @endif

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <a href="{{ route('mostrarvehiculos.show') }}" class="card-link">
                            <div class="icon-box service-box" data-aos="fade-up"
                                data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                                <div class="icon">
                                    <svg class="iconos" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" viewBox="0 0 256 256">
                                        <path d="M240,112H229.2L201.42,49.5A16,16,0,0,0,186.8,40H69.2a16,16,0,0,0-14.62,9.5L26.8,112H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V192h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V128h8a8,8,0,0,0,0-16ZM69.2,56H186.8l24.89,56H44.31ZM64,208H40V192H64Zm128,0V192h24v16Zm24-32H40V128H216ZM56,152a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,152Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,152Z"></path>
                                    </svg>
                                </div>
                                <h4 class="title">Mostrar Vehiculos en Almacen</h4>
                                <p class="description">En esta enlace podrás observar todos los vehículos en el almacen.</p>
                            </div>
                        </a>
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
                                class="w-8 h-8 text-green-650">
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
                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 31 31"
                                class="w-8 h-8 text-green-650">
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
    </main>
</x-app2>