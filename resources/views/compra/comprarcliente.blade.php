@extends('layouts.app')

@section('Titulo')
    Tus Compras
@endsection

@section('contenido')
    @if ((count($ofertas)>0) || (count($tarjeta)>0) || (count($cuenta)>0))
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-14">
            <table id="data-table" class="stripe hover translate-table" style="width:100%;">
                <thead class="text-white">
                    <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                        <th>Vehículo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-center text-lg p-6 font-bold">
                    @for ($k=0;$k<count($tarjeta);$k++) 
                        <tr>               
                            <td>{{$tarjeta[$k][0]['titulo']}}</td>
                            <td>{{$tarjeta[$k][0]['marca']}}</td>
                            <td>{{$tarjeta[$k][0]['modelo']}}</td>
                            <td class="text-green-700">${{$tarjeta[$k][0]['precio']}}</td>
                            <p class="hidden">{{$k++}}</p> 
                            <td>{{$tarjeta[$k]}}</td>
                        </tr>   
                    @endfor
                    @for ($k=0;$k<count($cuenta);$k++) 
                        <tr>               
                            <td>{{$cuenta[$k][0]['titulo']}}</td>
                            <td>{{$cuenta[$k][0]['marca']}}</td>
                            <td>{{$cuenta[$k][0]['modelo']}}</td>
                            <td class="text-green-700">${{$cuenta[$k][0]['precio']}}</td>
                            <p class="hidden">{{$k++}}</p> 
                            <td>{{$cuenta[$k+1]}}</td>
                        </tr>   
                    @endfor
                    @for ($k=0;$k<count($ofertas);$k++) 
                        <tr>               
                            <td>{{$ofertas[$k][0]['titulo']}}</td>
                            <td>{{$ofertas[$k][0]['marca']}}</td>
                            <td>{{$ofertas[$k][0]['modelo']}}</td>
                            <td class="text-green-700">${{$ofertas[$k+1]}}</td>
                            <td>{{$ofertas[$k+2]}}</td>
                            <p class="hidden">{{$k=$k+2}}</p> 
                        </tr>   
                    @endfor
                </tbody>
            </table>
        </div>
    @else
        <p class="font-bold text-2xl text-center mb-5"> No has realizado ninguna compra!</p>
        <p class="font-bold text-2xl text-center mt-3 text-blue-800"> Animáte!</p>
    @endif
@endsection
