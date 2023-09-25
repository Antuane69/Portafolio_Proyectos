@extends('layouts.app')

@section('Titulo')
    Edita tu perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class='md:w-1/2 rounded-lg shadow p-6 lg:ml-80'>
        <div class='mb-5'>
            <form action="{{route('perfil.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <label for="username" class="mb-2 bloack uppercase text-gray-800 font-bold">
                    Nombre de Usuario
                </label>
                <input type="text" name="username" id="username" placeholder="Ingres tu nuevo nombre de usuario" class='border p-3 w-full rounded-lg @error('username') border-red-800 bg-red-100 @enderror' value="{{auth()->user()->username}}">
                @error('username')
                <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class='mb-5'>
                <label for="imagen" class="mb-2 bloack uppercase text-gray-800 font-bold">
                    Imagen Perfil
                </label>
                <input type="file" name="imagen" id="imagen" class='bg-white border p-4 w-full rounded-lg' accept=".jpg, .jpeg, .png, .svg">
            </div>
            <input type="submit" value="Guardar Cambios" class="bg-blue-800 hover:bg-blue-400 transition-colors cursor-pointer 
            uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection