<div>
    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg py-3">
        <table id="data-table" class="stripe hover translate-table"
        style="width:100%;">
            @foreach ($posts as $ofertas)
                @if ($ofertas->aceptado == 0)
                    <thead class="text-white">
                        <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                            <th>Nombre</th>
                            <th>Justificacion</th>
                            <th>Vehiculo</th>
                            <th>Precio Original</th>
                            <th>Oferta</th>
                            <th>Fecha de la Solicitud</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    @break
                @endif
            @endforeach
            <tbody class="text-center justify-center text-lg p-6 font-bold">
                @foreach ($posts as $ofertas)
                    <tr>
                        @if ($ofertas->aceptado == 0)
                            <td>{{$ofertas->user->username}}</td>
                            <td>{{$ofertas->justificacion}}</td>
                            <td>{{$ofertas->post->titulo}}</td>
                            <td class="text-green-700">${{$ofertas->post->precio}}</td>
                            <td class="text-red-700">${{ $ofertas->oferta}}</td>
                            <td>{{$ofertas->created_at->diffForHumans()}}</td>
                            <td class="items-center text-center justify-center">
                                <form action="{{route('compraroferta.accept',$ofertas)}}" method='POST'>
                                    @csrf
                                    <button>
                                        <div class="container mx-auto flex text-green-700 font-bold justify-between gap-1">    
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="green" class="w-8 h-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>                                                                                                                                                        
                                            <p>Aceptar Oferta</p>
                                        </div>
                                    </button>  
                                </form>
                                <form action="{{route('compraroferta.destroy',$ofertas)}}" method='POST'>
                                    @method('DELETE')
                                    @csrf
                                    <button>
                                        <div class="container mx-auto flex text-red-700 font-bold justify-between gap-1">    
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="red" class="w-8 h-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>                                                                                                                                                      
                                            <p>Rechazar Oferta</p>
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