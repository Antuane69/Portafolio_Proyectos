@extends('layouts.app')

@section('Titulo')
    Tus Ventas
@endsection

@section('contenido')
@php
    $sumyear = 0;
    for ($i = 0; $i < 32 ; $i++) { 
        # code...
        $arr[$i] = 0;
    }
    for ($k = 0; $k < 12 ; $k++) { 
        # code...
        $arrMes[$k] = 0;
    }
    $auxdate = date('m');
@endphp
    <div class="font-bold text-3xl text-center mb-16">
        <p>Viendo estadísticas del vehículo <p class="text-orange-700">{{$posts->titulo}}</p></p>
    </div>
    @if ($tarjeta->count())
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-14">
            <p class="font-bold text-2xl text-center mb-5">Con Tarjeta de Crédito</p>
            <table id="data-table" class="stripe hover translate-table" style="width:100%;">
                <thead class="text-white">
                    <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                        <th>Cliente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-center text-lg p-6 font-bold">
                    @foreach ($tarjeta as $card)
                        <tr>
                            <td>
                                @foreach ($cliente as $client)
                                    @if($client->id == $card->user_id)
                                        {{$client->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$posts->marca}}</td>
                            <td>{{$posts->modelo}}</td>
                            <td class="text-green-700">${{$posts->precio}}</td>
                            @php
                                $aux = ($card->created_at)->format('d');
                                $aux2 = ($card->created_at)->format('m');
                                $arrMes[$aux2-1] = $arrMes[$aux2-1] + $posts->precio; 
                                if ($aux2 == $auxdate) {
                                    $arr[$aux-1] = $arr[$aux-1] + $posts->precio; 
                                }
                            @endphp
                            <td class="items-center text-center justify-center">
                                <button>
                                    <div class="container mx-auto flex text-green-800 font-bold justify-between gap-1 items-center text-center">    
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>                                                                                                                                                                                                                                         
                                        <p>Aceptado</p>
                                    </div>
                                </button>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="rounded-lg shadow-none mb-14">
            <p class="font-bold text-2xl text-center mb-5">No tienes ventas con Tarjeta de Crédito</p>
            <hr>
        </div>
    @endif
    @if ($cuenta->count())
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-14">
            <p class="font-bold text-2xl text-center mb-5">Con Cuenta Bancaria</p>
            <table id="data-table" class="stripe hover translate-table" style="width:100%;">
                <thead class="text-white">
                    <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                        <th>Cliente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-center text-lg p-6 font-bold">
                    @foreach ($cuenta as $account)
                        <tr>
                            <td>
                                @foreach ($cliente as $client)
                                    @if($client->id == $account->user_id)
                                        {{$client->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$posts->marca}}</td>
                            <td>{{$posts->modelo}}</td>
                            <td class="text-green-700">${{$posts->precio}}</td>
                            @php
                                $aux = ($account->created_at)->format('d');
                                $aux2 = ($account->created_at)->format('m');
                                $arrMes[$aux2-1] = $arrMes[$aux2-1] + $posts->precio; 
                                $arr[$aux-1] = $arr[$aux-1] + $posts->precio; 
                            @endphp
                            <td class="items-center text-center justify-center">
                                <button>
                                    <div class="container mx-auto flex text-green-800 font-bold justify-between gap-1 items-center text-center">    
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>                                                                                                                                                                                                                                         
                                        <p>Aceptado</p>
                                    </div>
                                </button>   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="rounded-lg shadow-none mb-14">
            <p class="font-bold text-2xl text-center mb-5">No tienes ventas por Cuenta Bancaria</p>
            <hr>
        </div>
    @endif
    @if ($oferta->count())
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
            <p class="font-bold text-2xl text-center mb-5">Ofertas Aceptadas</p>
            <table id="data-table" class="stripe hover translate-table" style="width:100%;">
                <thead class="text-white">
                    <tr class="bg-orange-900 text-xl text-white  justify-center text-center">
                        <th>Cliente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio Original</th>
                        <th>Precio Ofertado</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-center text-lg p-6 font-bold">
                    @foreach ($oferta as $offer)
                        <tr>
                            <td>
                                @foreach ($cliente as $client)
                                    @if($client->id == $offer->user_id)
                                        {{$client->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$posts->marca}}</td>
                            <td>{{$posts->modelo}}</td>
                            <td class="text-green-700">${{$posts->precio}}</td>
                            <td class="text-green-700">${{$offer->oferta}}</td>
                            @php
                                $aux = ($offer->created_at)->format('d');
                                $aux2 = ($offer->created_at)->format('m');
                                $arrMes[$aux2-1] = $arrMes[$aux2-1] + $offer->oferta; 
                                $arr[$aux-1] = $arr[$aux-1] + $offer->oferta; 
                            @endphp
                            <td class="items-center text-center justify-center">
                                <button>
                                    <div class="container mx-auto flex text-yellow-600 font-bold justify-between gap-1 items-center text-center">    
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>                                                                                                                                                                                                                                                                                  
                                        <p>En espera</p>
                                    </div>
                                </button>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="rounded-lg shadow-none mb-14">
            <p class="font-bold text-2xl text-center mb-5">No has aceptado ninguna Oferta</p>
            <hr>
        </div>
    @endif
    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-20 p-3 mt-24 w-full">
        {{-- <p class="font-bold text-3xl text-center mt-14 ">Graficamente</p> --}}
        @php
            use ConsoleTVs\Charts\Classes\Chartjs\Chart;
    
            $chart = new Chart;
            $chart->labels(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17',
                            '18','19','20','21','22','23','24','25','26','27','28','29','30','31']);
            $chart->dataset('Ventas Diarias en el mes de Octubre', 'line',[$arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8]
                ,$arr[9],$arr[10],$arr[11],$arr[12],$arr[13],$arr[14],$arr[15],$arr[16],$arr[17],$arr[18],$arr[19],$arr[20],$arr[21],$arr[22]
                ,$arr[23],$arr[24],$arr[25],$arr[26],$arr[27],$arr[28],$arr[29]])->color('#7F2511')->fill(true)->backgroundColor('#CB4D32');
      
            $mes = new Chart;
            $mes->labels(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']);
            $mes->dataset('Ventas Mensuales en el año 2023', 'line',[$arrMes[0],$arrMes[1],$arrMes[2],$arrMes[3],$arrMes[4],$arrMes[5],$arrMes[6],$arrMes[7],$arrMes[8]
                ,$arrMes[9],$arrMes[10],$arrMes[11]])->color('#447E46')->fill(true)->backgroundColor('#78DE7C');

            for ($i = 0; $i < 12 ; $i++) { 
                # code...
                $sumyear = $sumyear + $arrMes[$i];
            }
        @endphp
        <p class="font-bold text-2xl text-center mb-10">Ventas Diarias en el mes de Octubre</p>
        <div class="w-4/5 items-center flex ml-36">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8" style="border-color: #3e95cd"></script>
            {{ $chart->container() }}
            <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8 style="border-color: #3e95cd fill:aqua"></script>
            {{ $chart->script() }}
        </div>
        <p class="font-bold text-2xl text-center mt-20 mb-10">Ventas Mensuales en el año 2023</p>
        <div class="w-4/5 items-center flex ml-36">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
            {{ $mes->container() }}
            <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
            {{ $mes->script() }}
        </div>
    </div>
    <div class="container flex w-full mb-20">
        <div class="font-bold text-3xl text-center ml-52">
            <p>Total de ventas en este mes: <p class="text-orange-700 text-">${{$arrMes[$auxdate-1]}}</p></p>
        </div>
        <div class="font-bold text-3xl text-center ml-32">
            <p>Total de ventas en el año: <p class="  text-emerald-600">${{$sumyear}}</p></p>
        </div>
    </div>
@endsection