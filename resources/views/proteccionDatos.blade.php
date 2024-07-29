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
                {{ __('Protección de Datos') }}
            </div>
        </span>
    </x-slot>
    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex container content-center text-center justify-center my-8 mx-10">
                    <div class="break-words flex-wrap text-wrap flex" style="width:35%">
                        <img class='shadow-xl md:w-full' style="width: 340px; height: 200px;border-radius:15px;margin-right:17%;margin-top:2%" src="{{ asset('assets/proteccion_datos.png') }}" alt="Imagen de Proteccion de Datos">
                        <div class="text-justify" style="width: 100%;margin-right:17%;margin-top:8%;font-size:14px">
                            <p>
                                <strong>AES-256 (Advanced Encryption Standard 256 bits)</strong> es un estándar de cifrado de bloque ampliamente utilizado para proteger datos sensibles.    
                            </p>
                            <p>
                               <li><strong>Seguridad:</strong> Utiliza una clave de 256 bits, proporcionando un alto nivel de seguridad adecuado para proteger información confidencial. </li>
                            </p>
                            <p>
                                <li><strong>Velocidad y Eficiencia:</strong> AES es conocido por su rapidez y eficiencia, lo que lo hace ideal para aplicaciones que requieren cifrado de alto rendimiento. </li>
                            </p>
                            <p>
                                <li><strong>Amplio Uso:</strong> Es utilizado por gobiernos, organizaciones y empresas en todo el mundo para asegurar datos tanto en tránsito como en reposo.</li>
                            </p>
                            <p>
                                <li><strong>Resistencia:</strong> Hasta la fecha, AES-256 no ha sido vulnerado exitosamente y es considerado uno de los métodos de cifrado más seguros.</li>
                            </p>
                        </div>
                    </div>  
                    <div class="lineaSep break-words flex-wrap text-wrap pb-3" style="width: 65%">
                        <div class="text-justify" style="width: 100%;margin-bottom:40px">
                            <p>
                               <strong>Estimado usuario,</strong> <br>
    
                                Queremos asegurarle que su información y datos personales están completamente protegidos en nuestra plataforma. Hemos implementado medidas de seguridad avanzadas para garantizar que nadie pueda acceder a su perfil sin autorización.
                            </p>
                            <p>
                               <strong>Privacidad Garantizada:</strong> Sus solicitudes y datos son privados y manejados con la máxima confidencialidad.
                            </p>
                            <p>
                               <strong>Respaldo Seguro:</strong> Contamos con sistemas de respaldo para proteger su información en caso de cualquier eventualidad.
                            </p>
                            <p class="mt-6">
                                Tus datos están protegidos con el cifrado <strong>AES-256.</strong> Los más altos organismos de seguridad nacional la usan para la información de máximo secreto.
                            </p>
                            <p>
                                Si tiene alguna pregunta sobre nuestras políticas de seguridad, no dude en ponerse en contacto con nosotros. <br>
                            </p>
                            <p class="mt-8">
                                <strong>Atentamente,<span class="text-blue-700 font-bold"> Pixel Perfect.</span></strong>
                            </p>
                        </div>
                        <div class="ml-1">
                            <div class="lineaSep-foot"></div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>