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
                {{ __('Formas de Pago') }}
            </div>
        </span>
    </x-slot>
    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex container content-center text-center justify-center my-8 mx-10">
                    <div class="break-words flex-wrap text-wrap" style="width:35%">
                        <img class='shadow-xl md:w-full' style="width: 340px; height: 450px;border-radius:15px;margin-right:17%;margin-top:8%" src="{{ asset('assets/pagos.jpg') }}" alt="Imagen de Pagos">
                    </div>  
                    <div class="lineaSep break-words flex-wrap text-wrap pb-3" style="width: 65%">
                        <div class="text-justify" style="width: 100%;margin-bottom:40px">
                            <p>
                                Para facilitar el proceso de pago de nuestros servicios, ofrecemos las siguientes opciones:
                            </p>
                            <p>
                                <strong>Depósito Bancario.-</strong> <br>

                                Puede realizar un depósito a nuestra cuenta bancaria. Una vez realizado el pago, por favor envíe el comprobante a nuestro correo o adjuntelo a su proyecto en curso para confirmar la transacción y continuar con el desarrollo del proyecto. <br>
                            </p>
                            <p>
                                La cantidad a depositar y el adelanto requerido para iniciar el proyecto serán acordados mediante esta plataforma y en la vista de su proyecto en curso.
                            </p> 
                            <p class="mb-6">
                                <strong>Número de Cuenta Interbancaria:</strong> <br>
                                <strong>Número de Tarjeta BBVA:</strong> <br>
                            </p>
                            <p class="mt-2">
                                <strong>Pago en Efectivo.-</strong><br>
                                
                                También puede pagar en efectivo directamente en su establecimiento o en un lugar de reunión de mutuo acuerdo. Para ello, deberá agendar una cita con nosotros desde la vista de su proyecto en curso.
                            </p>
                            <p class="mt-10">
                                Si tiene alguna pregunta o necesita más detalles sobre el proceso de pago, no dude en contactarnos.
                                Gracias por su confianza. <br>
                            </p>
                            <p>
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