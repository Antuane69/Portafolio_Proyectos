@extends('layouts.app')

@section('Titulo')
    Realiza tu oferta para el vehículo {{$posts->titulo}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class="md:w-6/7 bg-white p-6 rounded-lg shadow-xl">
            <div class='mt-5 mb-8 text-gray-400 text-center justify-center text-xl font-serif'>
                <p>Recuerda que este vehículo tiene un costo de ${{$posts->precio}} dado por el usuario.</p>
                <p>Mientras más cercana esté tu oferta al valor real del vehículo <br> Más posibilidades tendrás de que el vendedor acepte tu oferta</p>
            </div>
            <form action={{ route('compraroferta.store',['post'=>$posts])}} method="POST">
                @csrf
                <div class='my-7'>
                    <div class="mb-5">
                        <label for="oferta" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Oferta
                        </label>
                        <input type="number" name="oferta" id="oferta" placeholder="Ingresa tu oferta" class='border p-3 w-full rounded-lg @error('oferta') border-red-800 bg-red-100 @enderror' value="{{old('oferta')}}">
                        @error('oferta')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-10">
                        <label for="justificacion" class="bloack uppercase text-gray-800 font-bold">
                            Justificacion del porqué de tu oferta
                        </label>
                        <textarea name="justificacion" id="justificacion" placeholder="Ingresa el porqué de tu oferta" class='border p-3 w-full rounded-lg @error('justificacion') border-red-800 bg-red-100 @enderror'>
                        {{old('justificacion')}}</textarea>
                        @error('justificacion')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="Realizar Compra" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                        uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection