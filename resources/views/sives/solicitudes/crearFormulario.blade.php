<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario de Recepción de Vehículo') }}
        </h2>
    </x-slot>
    
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-12">
        <div class="mb-10 py-3 ml-16 leading-normal text-green-500 rounded-lg" role="alert">
            <div class="text-left">
                <a href="{{ route('siveInicio.show') }}"
                    class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
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
                <form action={{ route('crearformulario.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 mt-4 mx-7 mb-4">
                        @foreach ($formulario as $fila)
                            @foreach ($fila as $nombreColumna => $valorColumna)  
                                <div class='grid grid-cols-1 text-center font-bold text-md uppercase'>
                                    @if ($nombreColumna == 'created_at' || $nombreColumna == 'updated_at')
                                    
                                    @else
                                        @if ($nombreColumna == 'frenteimg' || $nombreColumna == 'atrasimg' || $nombreColumna == 'costadoizq' || $nombreColumna == 'costadoder' || $nombreColumna == 'tablerove')                                        
                                            <div class='grid grid-cols-1'>
                                                <label for="{{$nombreColumna}}" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                                    {{$nombreColumna}}
                                                </label>
                                                <input type="file" name="{{$nombreColumna}}" id="{{$nombreColumna}}" class='bg-white border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-4 w-full rounded-lg border-2' accept=".jpg, .jpeg, .png, .svg">
                                            </div>  
                                        @else
                                            <label class="mb-2 bloack uppercase text-gray-800 font-bold">
                                                {{$nombreColumna}}
                                            </label>
                                            <p>
                                                <input type="text" name="{{$nombreColumna}}" id='{{$nombreColumna}}'
                                                    class='border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 border-2 rounded-lg w-full text-center'
                                                    value='{{$valorColumna}}' required>
                                                {{-- value="{{ old('$nombreColumna') }}"     --}}
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-5'>
                        <a href="{{ route('siveInicio.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                            >Enviar Solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>