@extends('layouts.app')

@section('Titulo')
    Mirando el Perfil de: <p class="text-orange-700 inline-block">{{$user[0]['username']}}</p>
@endsection

@section('contenido')
    <div>
        <div class="w-full items-center flex justify-center mb-12">
            <div class="sm w-8/12 lg:w-2/12 px-5">
                <img class="rounded-full" src="{{ $user[0]['imagen'] ? asset('perfiles') . '/' . $user[0]['imagen'] : asset('img/usuario.jpg')}}" alt="Imagen de usuario">
            </div>
        </div>
        @if($vendedor->count())
            <div class='grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6'>
                @foreach ($vendedor as $post)
                    @if ($post->estado === "No")
                        <div class="text-center font-bold text-2xl shadow-lg p-3 rounded-lg hover:scale-105">
                            <p class="mb-5 text-black">{{$post->titulo}}</p>
                            <a href="{{route('posts.show',['post'=>$post,'user'=>$post->user])}}">
                                <img class="rounded-lg shadow-lg" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}
                                ">
                            </a>
                            <p class="mt-3 p-1 text-white w-full bg-orange-900 rounded-lg">${{$post->precio}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <p class="text-center font-medium text-blue-900">No hay artículos a la venta actualmente, regresa luego!</p>
        @endif
    </div>
@endsection