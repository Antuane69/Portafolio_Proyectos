@extends('layouts.app')

@section('Titulo')
    Ofertas pendientes
@endsection

@section('contenido')
    <div>
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg py-3">
            <table id="data-table" class="stripe hover translate-table"
                style="width:100%;">
                <thead class="text-white">
                    <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                        <th>Justificacion</th>
                        <th>Vehiculo</th>
                        <th>Precio Original</th>
                        <th>Oferta</th>
                        <th>Fecha de Solicitud</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-center text-lg p-6 font-bold">
                    @foreach ($ofertas as $oferta)
                        <tr>
                            @if ($oferta->aceptado == 0)
                                <td>{{$oferta->justificacion}}</td>
                                <td>{{$oferta->post->titulo}}</td>
                                <td class="text-green-700">${{$oferta->post->precio}}</td>
                                <td class="text-red-700">${{ $oferta->oferta}}</td>
                                <td>{{$oferta->created_at->diffForHumans()}}</td>
                                <td class="items-center text-center justify-center">
                                    <form action="{{route('compraroferta.destroy',$oferta)}}" method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        <button>
                                            <div class="container mx-auto flex text-red-700 font-bold justify-between gap-1 hover:text-black items-center text-center">    
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>                                                                                                                                                                                                
                                                <p>Eliminar Oferta</p>
                                            </div>
                                        </button>     
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
@endsection