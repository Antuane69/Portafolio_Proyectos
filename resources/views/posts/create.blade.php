@extends('layouts.app')

@section('Titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class='md:flex md:items-center'>
        <div class='md:w-1/2 px-10'>
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class='md:w-1/2 p-10 bg-sky-100 rounded-lg shadow-xl mt-10 md:mt-0'>
            <form action={{ route('posts.store') }} method="POST">
                @csrf
                <div class='mb-5'>
                    <label for="titulo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Titulo
                    </label>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo" class='border p-3 w-full rounded-lg @error('titulo') border-red-800 bg-red-100 @enderror' value="{{old('titulo')}}">
                    @error('titulo')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class='mb-5'>
                    <label for="descripcion" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Descripcion
                    </label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion" class="border p-3 w-full rounded-lg @error('descripcion') border-red-800 bg-red-100 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                    <input type="submit" value="Crear Publicacion" class="bg-blue-900 hover:bg-blue-600 transition-colors cursor-pointer 
                    uppercase font-bold w-full p-3 text-white rounded-lg mt-10">
                </div>
                </div class='mb-5'>
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{old('imagen')}}"
                    />
                    @error('imagen')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                <div>
                </form>
        </div>
    </div>
@endsection