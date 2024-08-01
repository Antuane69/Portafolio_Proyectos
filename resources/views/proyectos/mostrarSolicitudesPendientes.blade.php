<style>
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
        width: 10%;
        margin: 0 auto;
        transition: width 0.3s ease;
        border-top:2px solid #1C0B49;
    }
    .lineaSep:hover .lineaSep-foot{
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
                {{ __('Nuestros Proyectos') }}
            </div>
        </span>
    </x-slot>
    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid-rows lineaSep content-center text-center justify-center my-8">
                    @foreach ($solicitudes as $solicitud)                        
                        <div class="inline-flex break-words text-wrap text-justify pb-1" style="width: 90%;margin-bottom:30px;">
                            <div style="width: 15%">
                                <p class="text-center">
                                    <strong>Nombre</strong>
                                </p>
                                <div class="text-center" style="width:100%;margin-top: 28%">
                                    <span>
                                        {{$solicitud->nombre}}
                                    </span>
                                </div>
                            </div>
                            <div style="width: 40%" class="content-center items-center">
                                <p class="text-center">
                                    <strong>Descripcion</strong>
                                </p>
                                <div class="text-justify ml-4" style="width:85%">
                                    <span>
                                        {{$solicitud->requerimientos}}
                                    </span>
                                </div>
                            </div>
                            <div style="width: 15%">
                                <p class="text-center">
                                    <strong>Estatus</strong>
                                </p>
                                <div class="text-justify" style="width:90%">
                                    <span>
                                        {{$solicitud->estatus}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="ml-1 mb-9">
                            <div class="lineaSep-foot"></div>
                        </div>
                    @endforeach
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>