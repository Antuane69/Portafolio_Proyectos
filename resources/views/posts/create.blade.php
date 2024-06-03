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
        <div class='md:w-1/2 p-10 bg-grey-100 rounded-lg shadow-xl mt-10 md:mt-0'>
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
                    <label for="precio" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Precio
                    </label>
                    <input type="number" name="precio" id="precio" placeholder="Precio de tu articulo" class="border p-3 w-full rounded-lg @error('precio') border-red-800 bg-red-100 @enderror"
                    value= "{{ old('precio') }} ">
                    @error('precio')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="marca" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Marca
                    </label>
                    <input type="text" name="marca" id="marca" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Marca del vehículo" class='uppercase border p-3 w-full rounded-lg @error('marca') border-red-800 bg-red-100 @enderror' value="{{old('marca')}}">
                    @error('marca')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="modelo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Modelo
                    </label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo del vehículo" class='border p-3 w-full rounded-lg @error('modelo') border-red-800 bg-red-100 @enderror' value="{{old('modelo')}}">
                    @error('modelo')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="anio" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Año
                    </label>
                    <input type="text" name="anio" id="anio" placeholder="Año del vehículo" class='border p-3 w-full rounded-lg @error('anio') border-red-800 bg-red-100 @enderror' value="{{old('anio')}}">
                    @error('anio')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="color" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Color
                    </label>
                    <input type="text" name="color" id="color" placeholder="Color del vehículo" class='border p-3 w-full rounded-lg @error('color') border-red-800 bg-red-100 @enderror' value="{{old('color')}}">
                    @error('color')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="existencia" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Existencia
                    </label>
                    <input type="number" name="existencia" id="existencia" placeholder="Escribe la existencia" class="border p-3 w-full rounded-lg @error('existencia') border-red-800 bg-red-100 @enderror"
                    value= "{{ old('existencia') }} ">
                    @error('existencia')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="fallas" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Fallas
                    </label>
                    <textarea name="fallas" id="fallas" placeholder="Fallas en el articulo si las hubiese" class="border p-3 w-full rounded-lg @error('fallas') border-red-800 bg-red-100 @enderror"
                    >{{ old('fallas') }}</textarea>
                    @error('fallas')
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
                    <input type="submit" value="Crear Publicacion" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                    uppercase font-bold w-full p-3 text-white rounded-lg mt-10">
                    @error('imagen')
                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                </div class='mb-5'>
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{old('imagen')}}"
                        accept=".jpg, .jpeg, .png, .svg"
                    />
                <div>
            </form>
        </div>
    </div>
@endsection