@extends('layouts.app')

@section('Titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class='mr-40'>
            <img src="{{ asset('img/fp1.jpg')}}"alt="Imagen de Registro">
        </div>
            <div class="md:w-6/7 bg-white p-6 rounded-lg shadow-xl">
                <form action={{ route('register') }} method="POST">
                    @csrf
                    <div class='mb-5'>
                        <label for="name" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Nombre
                        </label>
                        <input type="text" name="name" id="name" placeholder="Tu nombre" class='border p-3 w-full rounded-lg @error('name') border-red-800 bg-red-100 @enderror' value="{{old('name')}}">
                        @error('name')
                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div class='mb-5'>
                        <label for="username" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Username
                        </label>
                        <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" class='border p-3 w-full rounded-lg @error('username') border-red-800 bg-red-100 @enderror' value="{{old('username')}}">
                        @error('username')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
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
                            Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="Tu contraseña" class='border p-3 w-full rounded-lg @error('password') border-red-800 bg-red-100 @enderror'>
                        @error('password')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div class='mb-4'>
                        <label for="password_confirmation" class="mb-2 bloack uppercase text-gray-800 font-bold">
                            Repetir Password
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña" class='border p-3 w-full rounded-lg'>
                    </div>
                    <input type="submit" value="Crear Cuenta" class="bg-blue-800 hover:bg-blue-400 transition-colors cursor-pointer 
                           uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>
        </div>
    </div>
@endsection