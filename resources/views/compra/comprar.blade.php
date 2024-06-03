@extends('layouts.app')

@section('Titulo')
    Realiza tu compra con tu tarjeta de crédito/débito 
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class="md:w-6/7 bg-white p-6 rounded-lg shadow-xl">
            <form action={{ route('comprar',['post'=>$posts])}} method="POST">
                @csrf
                <div class='mb-5'>
                    <label for="numcard" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Numero de Tarjeta
                    </label>
                    <input type="text" name="numcard" id="numcard" placeholder="Ingresa tus 16 dígitos de la tarjeta" class='border p-3 w-full rounded-lg @error('numcard') border-red-800 bg-red-100 @enderror' value="{{old('numcard')}}">
                    @error('numcard')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="yearexp" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Año de expiracion
                    </label>
                    <input type="number" name="yearexp" id="yearexp" placeholder="Ingresa la fecha de vencimiento" class='border p-3 w-full rounded-lg @error('yearexp') border-red-800 bg-red-100 @enderror' value="{{old('username')}}">
                    @error('yearexp')
                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-4'>
                    <label for="cvc" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        CVC
                    </label>
                    <input type="password" name="cvc" id="cvc" placeholder="Ingresa tu CVC" class='border p-3 w-full rounded-lg @error('cvc') border-red-800 bg-red-100 @enderror'>
                    @error('cvc')
                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-4'>
                    <label for="cvc_confirmation" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Repetir CVC
                    </label>
                    <input type="password" name="cvc_confirmation" id="cvc_confirmation" placeholder="Repite tu CVC" class='border p-3 w-full rounded-lg'>
                </div>
                <input type="submit" value="Realizar Compra" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                        uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection