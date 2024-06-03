@extends('layouts.app')

@section('Titulo')
    Edita tu publicacion: {{$post->titulo}}
@endsection

@section('contenido')
    <div class='md:w-1/2 rounded-lg shadow p-6 lg:ml-80'>
        <div class='mb-5'>
            <form action="{{route('postindex.store',['post'=>$post])}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class='mb-5'>
                    <label for="titulo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Titulo
                    </label>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo" class='border p-3 w-full rounded-lg @error('titulo') border-red-800 bg-red-100 @enderror' value="{{old('titulo',$post->titulo)}}">
                    @error('titulo')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="precio" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Precio
                    </label>
                    <input type="number" name="precio" id="precio" placeholder="Precio de tu articulo" class="border p-3 w-full rounded-lg @error('precio') border-red-800 bg-red-100 @enderror"
                    value= "{{old('precio',$post->precio)}} ">
                    @error('precio')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="marca" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Marca
                    </label>
                    <input type="text" name="marca" id="marca" placeholder="Marca del vehículo" class='border p-3 w-full rounded-lg @error('marca') border-red-800 bg-red-100 @enderror' value="{{old('marca',$post->marca)}}">
                    @error('marca')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="modelo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Modelo
                    </label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo del vehículo" class='border p-3 w-full rounded-lg @error('modelo') border-red-800 bg-red-100 @enderror' value="{{old('modelo',$post->modelo)}}">
                    @error('modelo')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="anio" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Año
                    </label>
                    <input type="number" name="anio" id="anio" placeholder="Año del vehículo" class='border p-3 w-full rounded-lg @error('anio') border-red-800 bg-red-100 @enderror' value="{{old('anio',$post->anio)}}">
                    @error('anio')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="color" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Color
                    </label>
                    <input type="text" name="color" id="color" placeholder="Color del vehículo" class='border p-3 w-full rounded-lg @error('color') border-red-800 bg-red-100 @enderror' value="{{old('color',$post->color)}}">
                    @error('color')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="existencia" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Existencia
                    </label>
                    <input type="number" name="existencia" id="existencia" placeholder="Escribe la existencia " class="border p-3 w-full rounded-lg @error('existencia') border-red-800 bg-red-100 @enderror"
                    value= "{{old('existencia',$post->existencia)}} ">
                    @error('existencia')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="fallas" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Fallas
                    </label>
                    <textarea name="fallas" id="fallas" placeholder="Fallas en el articulo si las hubiese" class="border p-3 w-full rounded-lg @error('fallas') border-red-800 bg-red-100 @enderror"
                    >{{old('fallas',$post->fallas)}}</textarea>
                    @error('fallas')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="descripcion" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Descripcion
                    </label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion" class="border p-3 w-full rounded-lg @error('descripcion') border-red-800 bg-red-100 @enderror"
                    >{{old('descripcion',$post->descripcion)}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                    @error('imagen')
                    <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-5'>
                    <label for="imagen" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Imagen post
                    </label>
                    <input type="file" name="imagen" id="imagen" class='bg-white border p-4 w-full rounded-lg' accept=".jpg, .jpeg, .png, .svg">
                </div>
                <input type="submit" value="Guardar Cambios" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection