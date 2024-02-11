<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DIVISION COMERCIAL JALISCO') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="css/estilos.css">
    
    <!-- Scripts para ampliar las imagenes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.css" rel="stylesheet"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-10">
            
            @livewire('mapa')
 
        </div>
    </div>
</x-app-layout>
