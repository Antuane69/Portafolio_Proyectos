@extends('layouts.app')

@section('Titulo')
    Inicia Sesion en Motor's New
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class='sm w-9/12 lg:w-4/12 px-2'>
            <img src="{{ asset('img/lp3.jpg')}}"alt="Imagen de Login">
        </div>
            <div class="md:w-6/7 bg-white p-6 rounded-lg shadow-xl">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class='mb-4'>
                        <label for="email" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Email
                        </label>
                        <input type="email" name="email" id="email" placeholder="Tu correo electronico" class='border p-3 w-full rounded-lg @error('email') border-red-800 bg-red-100 @enderror' value="{{old('email')}}">
                        @error('email')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div class='mb-4'>
                        <label for="password" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password" placeholder="Tu contraseña" class='border p-3 w-full rounded-lg @error('password') border-red-800 bg-red-100 @enderror'>
                        @error('password')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    @if (session('mensaje'))
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
                    @endif

                    <div class='mb-5'>
                        <input type="checkbox" name="remember"> <label class="text-sm text-gray-600">Mantener la sesion abierta</label>
                    </div>

                    <input type="submit" value="Iniciar Sesion" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                           uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>
        </div>
    </div>
@endsection