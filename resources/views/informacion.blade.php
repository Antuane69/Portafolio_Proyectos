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
        width: 95%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #1C0B49;
    }
    .lineaSep:hover .lineaSep-foot{
        width: 30%;
    }
</style>

<x-app-layout>
    @section('title', 'Pixel Perfect - Información')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight flex content-center text-center">
            <div class="text-left">
                <a href='{{ route('dashboard') }}'
                    class='w-auto rounded-lg shadow-xl font-medium text-black px-4 py-2'
                    style="background:#FFFF7B;text-decoration: none;" onmouseover="this.style.backgroundColor='#FFFF3E'" onmouseout="this.style.backgroundColor='#FFFF7B'">
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
                {{ __('Información') }}
            </div>
        </h2>
    </x-slot>
    <div class="pt-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white lineaSep overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex container content-center text-center justify-center my-5 mx-10">
                    <div class="w-1/5 mb-5 mt-3">
                        <label class="lbl md:text-sm mr-10">Fundador:</label>
                        <img class='md:w-full mt-6' style="width: 200px; height: 260px;border-radius:60px" src="{{ asset('assets/perfil.jpeg') }}" alt="Imagen del empleado">
                        <div>
                            <div class="inline-flex mt-5 mr-7">
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=pixelperfect.nacif@gmail.com&su=Consulta&body=Hola,%20me%20gustaría%20más%20información%20sobre%20tus%20servicios." target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/github.png')}}" style="width:20px;height:20px" alt="Logo GitHub">
                                    </div>
                                </a>
                                <a href="https://www.instagram.com/atun_dolorescr7" target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/linkedin.png')}}" style="width:20px;height:20px" alt="Logo Linkedln">
                                    </div>
                                </a>
                                <a href="https://wa.me/523221974630?text=Hola,%20me%20gustaría%20más%20información%20sobre%20tus%20servicios." target="_blank">
                                    <div class="footer-class">
                                        <img src="{{asset('assets/cv.png')}}" style="width:20px;height:20px" alt="Logo CV">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="w-1/5 grid-cols-1 mt-16">
                        <label class="lbl md:text-sm">Nombre:</label>
                        <h2 class="mb-2 inf">Antuane Alexander Nacif Gonzalez</h2>
                        <label class="lbl md:text-sm">Edad:</label>
                        <h2 class="mb-2 inf">22</h2>
                        <label class="lbl md:text-sm">Teléfono:</label>
                        <h2 class="mb-2 inf">+55 3221974630</h2>
                        <label class="lbl md:text-sm">Correo:</label>
                        <h2 class="mb-2 inf">pixelperfect.nacif@gmail.com</h2>
                    </div> --}}
                    <div class="w-4/5 text-justify break-words flex-wrap text-wrap mr-20 mt-4">
                        <p class="lbl md:text-sm text-center justify-center mb-9">Acerca de Nosotros:</p>
                        En <span class="text-blue-700 font-bold">PIXEL PERFECT</span>, nos especializamos en la creación de soluciones web administrativas y financieras diseñadas específicamente para restaurantes y hoteles. Nuestra misión es ayudar a nuestros clientes a optimizar sus operaciones, mejorar su eficiencia y maximizar su rentabilidad a través de tecnologías de vanguardia. <br>
                        Desde la gestión de reservas y facturación, hasta el control de inventarios y análisis financieros, nuestras páginas web están diseñadas para simplificar y mejorar cada aspecto de la administración de su negocio. <br>
                        <p class="mt-4">
                            Nos enorgullece ofrecer un servicio personalizado y de alta calidad, asegurándonos de que cada proyecto se ajuste perfectamente a las necesidades y objetivos de nuestros clientes. En <span class="text-blue-700 font-bold">PIXEL PERFECT</span>, no solo construimos páginas web, sino que también creamos herramientas que impulsan el éxito y el crecimiento de nuestros clientes. <br>
                            <span class="font-bold">Confíe en nosotros para llevar su negocio al siguiente nivel con soluciones web innovadoras y efectivas.</span></p>
                    </div>
                </div>    
                <div class="lineaSep-foot"></div>
                <div class="flex container content-center text-center justify-center my-5 mx-10">
                    <div>
                        p
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>