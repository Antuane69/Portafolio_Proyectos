@extends('layouts.app')

@section('Titulo')
    Realiza tu compra con tu cuenta bancaria BBVA o tu cuenta interbancaria
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class="md:w-6/7 bg-white p-6 rounded-lg shadow-xl">
            <form action={{ route('comprarcuenta',['post'=>$posts])}} method="POST">
                @csrf
                <div class='mb-5'>
                    <label for="numcuenta" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Numero de Cuenta BBVA o interbancaria
                    </label>
                    <input type="text" name="numcuenta" id="numcuenta" placeholder="XXXX XXXX XXXX XXXX XXXX X" class='border p-3 w-full rounded-lg @error('numcuenta') border-red-800 bg-red-100 @enderror' value="{{old('numcuenta')}}">
                    @error('numcuenta')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="nombre" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Nombre del propietario
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del propietario" class='border p-3 w-full rounded-lg @error('nombre') border-red-800 bg-red-100 @enderror' value="{{old('nombre')}}">
                    @error('nombre')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Realizar Compra" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                        uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection