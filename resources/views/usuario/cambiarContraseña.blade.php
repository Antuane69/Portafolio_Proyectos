<x-app-layout>
    @section('title', 'Little-Tokyo Administración')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Cambiar Contraseña de " . auth()->user()->nombre) }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    
    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('empleadosInicio.show') }}"
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
        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <form id="formulario" action={{ route('guardar_contraseña') }} method="POST">
                    @csrf
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-slate-700 rounded-t-xl mx-10 mt-5' style="background-color: #FFFF7B">
                        <p>
                            Cambiar Contraseña
                        </p>
                    </div>
                    <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                        <div class='container' style="width: 50%">
                            <label for="contra_actual" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                * Contraseña Actual
                            </label>
                            <p>
                                <input type="password" name="contraseña_actual"
                                class='focus:outline-none focus:ring-2 mb-4 focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('contra_actual') border-red-800 bg-red-100 @enderror'
                                required style="border-color:#d1d114;">
                                
                                @error('contraseña_actual')
                                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}
                                    </p>
                                @enderror

                                @if (session()->has('error'))
                                    <style>
                                        .auto-fade {
                                            animation: fadeOut 2s ease-in-out forwards;
                                        }
                
                                        @keyframes fadeOut {
                                            0% {
                                                opacity: 1;
                                            }
                                            90% {
                                                opacity: 1;
                                            }
                                            100% {
                                                opacity: 0;
                                                display: none;
                                            }
                                        }
                                    </style>
                                    <div class="auto-fade inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mx-7">                    
                            <div class='grid grid-cols-1'>
                                <label for="contra_nueva" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Contraseña Nueva
                                </label>
                                <p>
                                    <input type="password" name="contraseña_nueva"
                                    class='focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('contra_nueva') border-red-800 bg-red-100 @enderror'
                                    required>

                                    <p class="mb-1 text-xs font-bold text-center content-center justify-center">* Mínimo 8 Dígitos</p>
                                    
                                    @error('contraseña_nueva')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="contra_nueva" class="mb-1 bloack uppercase text-gray-800 font-bold">
                                    * Contraseña Nueva (Otra Vez)
                                </label>
                                <p>
                                    <input type="password" name="contraseña_nueva_confirmation"
                                    class='focus:outline-none focus:ring-2 mb-1  focus:border-transparent p-2 px-3 border-2 mt-1 rounded-lg w-5/6 @error('contra_nueva') border-red-800 bg-red-100 @enderror'
                                    required>

                                    <p class="mb-1 text-xs font-bold text-center content-center justify-center">* Mínimo 8 Dígitos</p>
                                    
                                    @error('contraseña_nueva_confirmation')
                                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-1 pb-5'>
                        <a href="{{ route('empleadosInicio.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-yellow-400 hover:bg-yellow-500 rounded-lg shadow-xl font-bold text-black px-4 py-2'
                            >Cambiar Contraseña</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Agrega este script al final del body o en la sección de scripts de tu vista Blade -->