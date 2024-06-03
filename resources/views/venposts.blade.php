@extends('layouts.app')

@section('Titulo')
    Perfil de {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class='w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row'>
            <div class="sm w-8/12 lg:w-6/12 px-5">
                <img class='rounded-full' src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.jpg')}}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class='flex items-center gap-2'>
                    <a href="{{route('posts.index',$user)}}">
                        <p class="text-black text-2xl font-bold">{{$user->username}}</p>
                    </a>
                    @auth
                    @if ($user->id === auth()->user()->id)
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>                                           
                    </p>
                    <a href="{{route('perfil.index')}}" class="hover:text-blue-800 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>                              
                    </a>
                    @endif
                    @endauth
                </div>
                <p class="text-gray-400 text-sm font-bold font-serif">{{$user->estatus}}</p>
                <div>
                    <p class=' text-m mt-5 font-bold'>
                        <a href="{{route('posts.index',[$user,$a])}}">
                            {{$a}}
                            <span class="font-normal">@choice('Oferta pendiente|Ofertas pendientes',$user->followings->count())</</span>
                        </a>
                    </p> 
                    <p class=' text-m mb-3 font-bold'>
                        <a href="">
                            {{$user->posts->count()}}
                            <span class="font-normal">Publicaciones</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class='container mx-auto mt-10'>
        <hr>
        <h2 class='text-3xl text-center font-bold my-10'>
            Tus vehículos publicados
        </h2>
        <div>
            @if($posts->count())
                <div class='grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6'>
                    @foreach ($posts as $post)
                    <div class="text-center font-bold text-2xl shadow-lg p-3 rounded-lg hover:scale-105">
                        <p class="mb-5 text-black">{{$post->titulo}}</p>
                        <a href="{{route('posts.show',['post'=>$post,'user'=>$post->user])}}">
                            <img class="rounded-lg shadow-lg" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}
                            ">
                        </a>
                        <p class="mt-3 p-1 text-white w-full bg-orange-900 rounded-lg">${{$post->precio}}</p>
                        <a href="{{route('ventas.index',[$user,$post])}}">
                            <p class=' text-m mt-3 font-bold p-1 text-white w-full bg-blue-900 rounded-lg'>
                                Estadisticas
                            </p> 
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center font-medium text-blue-900">No hay artículos a la venta actualmente, regresa luego!</p>
            @endif
        </div>
    </div>
@endsection