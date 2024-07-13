<style>
    .inf{
        font-weight: 600;
        font-size: 1.25rem/* 20px */;
        line-height: 1.75rem/* 28px */;
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity));
        line-height: 1.25;
    }
    .lbl
    {
        text-transform: uppercase;
        font-size: 0.75rem/* 12px */;
        line-height: 1rem/* 16px */;
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
        font-weight: 600;
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
    .lineaSep .lineaSep-foot {
        width: 30%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #1C0B49;
    }
    .lineaSep:hover .lineaSep-foot{
        width: 100%;
    }
    .lineaSep1 .lineaSep1-foot {
        width: 30%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #1C0B49;
    }
    .lineaSep1:hover .lineaSep1-foot{
        width: 90%;
    }
</style>

<x-app-layout>
    @section('title', 'Pixel Perfect - Información')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <span class="font-semibold text-md text-gray-800 flex content-center text-center">
            <div class="text-left">
                <a href='{{ route('dashboard') }}'
                    class='w-auto rounded-lg shadow-xl font-medium text-black px-4 py-2'
                    style="background:#FFFF7B;text-decoration: none;" onmouseover="this.style.backgroundColor='#FFFF3E';this.style.color='#000000';" onmouseout="this.style.backgroundColor='#FFFF7B'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
                </a>
            </div>
            <div class="ml-10 text-xl">
                {{ __('Más Información') }}
            </div>
        </span>
    </x-slot>
    <div class="pt-5">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white lineaSep1 lineaSep overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex container content-center text-center justify-center mb-4 mt-4">
                    <div class="mb-5 mt-3" style="width:25%">
                        <p class="text-blue-700 mb-7 text-center" style="font-weight:800;font-size:20px;margin-right:64px">Empresa:</p>
                        <img class='shadow-lg mt-2 mr-16' style="width: 200px; height: 200px;border-radius:200px" src="{{ asset('assets/Pixel Perfect.png') }}" alt="Imagen de la Empresa">
                    </div>
                    <div class="w-4/5 text-justify break-words flex-wrap text-wrap mt-3 ml-1">
                        <p class="text-blue-700 mb-6 text-center" style="font-weight:800;font-size:20px;">Acerca de Nosotros:</p>
                        En <span class="text-blue-700 font-bold">PIXEL PERFECT</span>, nos especializamos en la creación de soluciones web administrativas y financieras diseñadas especialmente para restaurantes y hoteles. Nuestra misión es ayudar a nuestros clientes a optimizar sus operaciones, mejorar su eficiencia y maximizar su rentabilidad a través de tecnologías de vanguardia. <br>
                        Desde la gestión de reservas y facturación, hasta el control de inventarios y análisis financieros, nuestras páginas web están diseñadas para simplificar y mejorar cada aspecto de la administración de su negocio. <br>
                        <p class="mt-4">
                            Nos enorgullece ofrecer un servicio personalizado y de alta calidad, asegurándonos de que cada proyecto se ajuste perfectamente a las necesidades y objetivos de nuestros clientes. En <span class="text-blue-700 font-bold">PIXEL PERFECT</span>, no solo construimos páginas web, sino que también creamos herramientas que impulsan el éxito y el crecimiento de nuestros clientes. <br>
                            <span class="font-bold">Confíe en nosotros para llevar su negocio al siguiente nivel con soluciones web innovadoras y efectivas.</span></p>
                    </div>
                </div>    
                <div class="lineaSep1-foot"></div>
                <div class="flex container content-center text-center justify-center my-8 mx-10">
                    <div class="break-words flex-wrap text-wrap" style="width:26%">
                        <p class="text-blue-700 mb-6 text-center" style="font-weight:800;font-size:20px;margin-right:66px">Fundador:</p>
                        <img class='shadow-xl md:w-full' style="width: 200px; height: 260px;border-radius:60px;margin-right:74px" src="{{ asset('assets/perfil.jpeg') }}" alt="Imagen del empleado">
                        <div>
                            <div class="inline-flex mt-7" style="margin-right: 54px">
                                <a href="https://github.com/Antuane69" target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/github.png')}}" style="width:20px;height:20px" alt="Logo GitHub">
                                    </div>
                                </a>
                                <a href="https://www.linkedin.com/in/antuane-alexander-nacif-gonzalez-3430b02b4?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/linkedin.png')}}" style="width:20px;height:20px" alt="Logo Linkedln">
                                    </div>
                                </a>
                                <a href="{{ route('informacion.curriculum') }}" target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/cv.png')}}" style="width:20px;height:20px" alt="Logo CV">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mt-16 text-justify" style="font-size: 16px">
                            <strong>Ingeniero en Computación</strong> <br> Antuane Alexander Nacif González 
                            <p class="mt-2"><strong>Telefono:</strong> 322 1974630 <br> <strong>Correo:</strong> pixelperfect.nacif@gmail.com</p>
                        </div>
                    </div>  
                    <div class="w-4/5 break-words flex-wrap text-wrap pb-3">
                        <div class="text-justify" style="width: 100%;margin-bottom:40px">
                            <p class="text-blue-700 mb-8 text-center" style="font-weight:800;font-size:20px">Acerca de Mí:</p>
                            <p>
                                Soy, un apasionado programador web, egresado de la <strong>Universidad de Guadalajara</strong>. <br>
                                Con más de 3 años de experiencia en el desarrollo de páginas web administrativas, comerciales y financieras, me he enfocado en ayudar a las pequeñas y medianas empresas <strong>(PyMES)</strong> a <strong>optimizar</strong> sus procesos y <strong>mejorar</strong> su presencia en línea. <br>
                            </p>
                            <p class="mt-4">
                                Mis servicios incluyen el <strong>diseño</strong> y <strong>desarrollo</strong> de sitios web a medida, sistemas de gestión administrativa, plataformas financieras, y cualquier otra solución web que tu negocio necesite. Mi objetivo es facilitarte la vida mediante la creación de herramientas digitales que aumenten tu <strong>eficiencia</strong>, ahorren <strong>tiempo</strong> y te permitan <strong>concentrarte</strong> en lo que mejor sabes hacer.
                            </p>
                            <p class="mt-4">
                                Creo firmemente en la <strong>comunicación</strong> abierta y en la <strong>colaboración</strong> estrecha con mis clientes para asegurarme de que cada proyecto sea un reflejo fiel de sus <strong>objetivos</strong> y <strong>visión</strong>.
                            </p>
                        </div>
                        <div class="text-center ml-8">
                            <div class="lineaSep-foot" style="margin-bottom: 30px;"></div>
                            <p class="text-blue-700 mb-4" style="font-weight:800;font-size:20px">Lenguajes de Programación:</p>
                            <div class="inline-flex mt-2 ml-5">
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/react.png')}}" style="width:43px;height:43px;border-radius:5px" alt="Logo Facebook">
                                    <div class="absolute rounded-md inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        React JS
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/js.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        JS
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/html-5.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        HTML
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/css-3.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        CSS
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/php.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        PHP
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/laravel.png')}}" style="width:50px;height:50px;" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white font-bold opacity-0 hover:opacity-100 transition-opacity duration-300" style="font-size: 12px">
                                        Laravel
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/servidor-sql.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        SQL
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/tailwind.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white font-bold opacity-0 hover:opacity-100 transition-opacity duration-300" style="font-size: 10px">
                                        Tailwind
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/piton.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white font-bold opacity-0 hover:opacity-100 transition-opacity duration-300" style="font-size: 12px">
                                        Python
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/cplusr.png')}}" style="width:42px;height:45px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        C++
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/csharp.png')}}" style="width:42px;height:46px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white text-sm font-bold opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        C#
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/powerapps.png')}}" style="width:43px;height:43px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white font-bold opacity-0 hover:opacity-100 transition-opacity duration-300" style="font-size: 12px">
                                        Power Apps
                                    </div>
                                </div>
                                <div class="footer-class relative inline-block">
                                    <img src="{{asset('assets/powerautomate.png')}}" style="width:38px;height:38px;margin-top:4px" alt="Logo Facebook">
                                    <div class="absolute inset-0 rounded-md flex items-center justify-center bg-black bg-opacity-50 text-white font-bold opacity-0 hover:opacity-100 transition-opacity duration-300" style="font-size: 11px">
                                        Power Auto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>