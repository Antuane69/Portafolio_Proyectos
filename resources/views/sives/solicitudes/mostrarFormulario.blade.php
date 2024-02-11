<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SIVE - Formulario de Recepción de Vehículo') }}
        </h2>
    </x-slot>
    
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-12">
        
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 mt-4 mx-7 mb-6">
                    @foreach ($formulario as $fila)
                        @foreach ($fila as $nombreColumna => $valorColumna)  
                            <div class='grid grid-cols-1 text-center font-bold text-md uppercase'>
                                @if ($nombreColumna == 'created_at' || $nombreColumna == 'updated_at')
                                
                                @else
                                    @if ($nombreColumna == 'frenteimg' || $nombreColumna == 'atrasimg' || $nombreColumna == 'costadoizq' || $nombreColumna == 'costadoder' || $nombreColumna == 'tablerove')                                        
                                        <div class='grid grid-cols-1 items-center object-center'>
                                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">
                                                {{$nombreColumna}}
                                            </label>
                                            <a class="mt-3">
                                                <img class='rounded-md md w-3/3' src="{{asset('img/SIVE/vehiculosalmacen/' . $valorColumna)}}">
                                            </a> 
                                        </div>  
                                    @else
                                        <div class='grid grid-cols-1'>
                                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">
                                                {{$nombreColumna}}
                                            </label>
                                            <p type="text" class='border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 border-2 rounded-lg w-full text-center'>
                                                {{$valorColumna}}
                                            </p> 
                                        </div>  
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>