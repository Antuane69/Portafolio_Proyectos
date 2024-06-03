@extends('layouts.app')

@section('Titulo')
    {{$post->titulo}}
    <br>
    ${{$post->precio}}
@endsection

@section('contenido')
    <script src="https://cdn.tailwindcss.com"></script>
    <div>
        @if ($post->estado == "Si")
            <p class=" text-green-700 font-bold text-3xl text-center items-center">Publicación pausada</p>
        @endif
    </div>
    <div class="container mx-auto md:flex">
        <div class="md:w-2/5 sm ml:1">
            <img class="rounded-lg shadow-lg mt-24" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
            <div class='p-1 flex items-center gap-4'>
                <div class='my-4'>
                    @auth    
                    <div>
                        <div class='flex gap-3 items-center'>
                            @if (!$post->checklike(auth()->user()))
                                @if (auth()->user()->estatus === "Cliente")    
                                    <form action="{{route('posts.likes',['user'=>$user, 'posts'=>$post])}}" method="POST">
                                        @csrf         
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>   
                                        </button>                        
                                    </form>
                                @endif
                            @else
                                <form action="{{route('posts.likes.destroy',['user'=>$user,'posts'=>$post])}}" method="POST">
                                    @method('delete')
                                    @csrf          
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-10">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>     
                                    </button>                          
                                </form>
                            @endif
                            <p class='text-center font-medium'>{{$post->likes()->count()}} Interesado(s)</p>
                        </div>
                    </div>    
                    @endauth    
                </div>
            </div>
            <div>
                <a class='font-bold' href="{{route('perfilvendedor.index', $post)}}">{{$post->user->username}}</a>
                <p class='text-sm'>
                    {{$post->created_at->diffForHumans()}}
                </p>
            </div>
            @auth    
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @method('DELETE')
                        @csrf         
                        <button class="p-2 bg-red-700 hover:bg-red-600 rounded cursor-pointer mt-8">
                            <div class="container mx-auto flex text-white font-bold justify-between gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <p> Eliminar Publicacion</p>
                            </div> 
                        </button>     
                    </form>    
                    <form action="{{route('postindex.index',$post->id)}}">
                        <button class="p-2 bg-orange-600 hover:bg-orange-500 rounded cursor-pointer mt-2">
                            <div class="container mx-auto flex text-white font-bold justify-between gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>                                  
                                <p> Editar Publicacion</p>
                            </div> 
                        </button>    
                    </form>               
                    @if ($post->estado === "No")             
                        <form action="{{route('posts.pause',['user'=>auth()->user()->username,'post'=>$post])}}" method="POST">
                            @csrf
                            <button class="p-2 bg-green-700 hover:bg-green-500 rounded cursor-pointer mt-2">
                                <div class="container mx-auto flex text-white font-bold justify-between gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                                    </svg>                                                             
                                    <p> Pausar Publicacion</p>
                                </div> 
                            </button>    
                        </form>          
                    @else
                        <form action="{{route('posts.play',['user'=>auth()->user()->username,'post'=>$post])}}" method="POST">
                            @csrf
                            <button class="p-2 bg-green-700 hover:bg-green-500 rounded cursor-pointer mt-2">
                                <div class="container mx-auto flex text-white font-bold justify-between gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                    </svg>                                                                                                
                                    <p> Reanudar Publicacion</p>
                                </div> 
                            </button>    
                        </form>     
                    @endif
                @endif
            @endauth
        </div> 
        <div class="md:w-2/3 p-9">
            <div class="shadow-md bg-white p-9">
                <p class="text-2xl font-bold text-center">Descripción del artículo</p>
                <div class='mt-5 text-gray-900'>
                    <p class='text-xl font-semibold mt-3'>
                        Marca: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->marca}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Modelo: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->modelo}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Año: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->anio}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Precio: 
                    </p>
                    <p class='text-m font-normal'>
                        ${{$post->precio}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Color: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->color}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Existencia: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->existencia}}
                    </p>
                    @if ($post->existencia == 0)
                        <p class=" text-red-600 font-bold font-serif">Su publicacion se pauso por falta de existencia en el producto</p>
                    @endif
                    <p class='text-xl font-semibold mt-3'>
                        Fallas: 
                    </p>
                    <p class='text-m font-normal'>
                        {{$post->fallas}}
                    </p>
                    <p class='text-xl font-semibold mt-3'>
                        Descripción: 
                    </p>
                    <p class='text-m font-normal mb-9'>
                        {{$post->descripcion}}
                    </p>
                </div>
                @if (auth()->user()->estatus === "Cliente")
                    <form action="{{route('compra.index',$post->id)}}">
                        <input type="submit" class="bg-orange-900 hover:bg-orange-700 text-white p-2 rounded-lg text-m uppercase font-bold cursor-pointer mt-2 w-full " value="Comprar">
                    </form>
                @endif
            </div>
        </div>
    </div>
        @auth
        <div class='container flex w-full shadow-md bg-white mt-10'>
            <div class="w-2/5 mb-4 mt-4 ml-2 mr-24">
                @if (auth()->user()->estatus === "Cliente")
                    @if(session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                    @endif
                    <form action="{{route('comentarios.store',['post'=>$post,'user'=>$user])}}" method="POST">
                        @csrf
                        <div class='w-full ml-2'>
                            <label for="comentario" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                Comentario
                            </label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario" class="mt-2 border p-3 w-full rounded-lg @error('comentario') border-red-800 bg-red-100 @enderror"
                            ></textarea>
                            @error('comentario')
                            <p class="bg-red-600 text-white font-medium my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                            @enderror
                            <input type="submit" value="Comentar" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                            uppercase font-bold w-full p-3 text-white rounded-lg mt-6 mb-2">
                        </div>
                    </form>
                    <div class='mb-5 max-h-96 overflow-y-scroll mt-10 w-full ml-5 mr-5'>
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class='p-5 border-b shadow-m border-blue-200'>
                                    <a href="{{route('posts.index',$comentario->user)}}" class='font-bold'>
                                        {{$comentario->user->username}}
                                    </a>
                                    <p>{{$comentario->comentario}}</p>
                                    <p class='text-sm text-gray-500'>{{$comentario->created_at->diffForHumans()}}</p>
                                </div>
                            @endforeach
                        @else
                            <p class='p-10 text-center'>No hay comentarios aun</p>
                        @endif
                    </div>
                @else
                    <div class='mb-5 max-h-96 overflow-y-scroll mt-10 w-full ml-5 mr-5'>
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class='p-5 border-b shadow-m border-blue-200'>
                                    <a href="{{route('posts.index',$comentario->user)}}" class='font-bold'>
                                        {{$comentario->user->username}}
                                    </a>
                                    <p>{{$comentario->comentario}}</p>
                                    <p class='text-sm text-gray-500'>{{$comentario->created_at->diffForHumans()}}</p>
                                </div>
                            @endforeach
                        @else
                            <p class='p-10 text-center'>No hay comentarios aun</p>
                        @endif
                    </div>
                @endif
            </div>
            @if (auth()->user()->estatus === "Cliente")
                <div class='w-3/5 bg-white p-6'>
                    <div class='mb-4 mt-5 w-full mr-5 text-center font-bold text-3xl text-orange-800'>
                        Sugerencias para ti
                    </div>

                    <div id="default-carousel" class="relative w-3/5 ml-36" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative w-full overflow-hidden rounded-lg h-96 mt-20 items-center">
                             <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{asset('uploads') . '/' . $arr[0]}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{asset('uploads') . '/' . $arr[1]}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            {{-- <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div> --}}
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <button class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            <button class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            {{-- <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button> --}}
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 26 26" stroke-width="3" stroke="white" class="w-11 h-11">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                            </svg>                                  
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" stroke-width="3" stroke="white" class="w-11 h-11">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                              </svg>                              
                        </button>
                        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                    </div>
                    {{-- <div class='grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 w-full mt-20 justify-between '>
                        @foreach ($full as $pub)
                            @if ($pub->estado == 'No')                            
                                <div class="text-center font-bold text-2xl shadow-lg p-3 rounded-lg hover:scale-105">
                                    <p class="mb-5 text-black">{{$pub->titulo}}</p>
                                    <a href="{{route('posts.show',['post'=>$pub,'user'=>$pub->user])}}">
                                        <img class="rounded-lg shadow-lg" src="{{asset('uploads') . '/' . $pub->imagen}}" alt="Imagen del post {{$post->titulo}}
                                        ">
                                    </a>
                                    <p class="mt-3 p-1 text-white w-full bg-orange-900 rounded-lg">${{$pub->precio}}</p>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($money as $my)
                            @if ($my->estado == 'No')                            
                                <div class="text-center font-bold text-2xl shadow-lg p-3 rounded-lg hover:scale-105">
                                    <p class="mb-5 text-black">{{$my->titulo}}</p>
                                    <a href="{{route('posts.show',['post'=>$my,'user'=>$my->user])}}">
                                        <img class="rounded-lg shadow-lg" src="{{asset('uploads') . '/' . $my->imagen}}" alt="Imagen del post {{$post->titulo}}
                                        ">
                                    </a>
                                    <p class="mt-3 p-1 text-white w-full bg-orange-900 rounded-lg">${{$my->precio}}</p>
                                </div>
                            @endif
                        @endforeach
                        @if ($interes != "")                            
                            @foreach ($interes as $rl)
                                @if ($rl->estado == 'No')                            
                                    <div class="text-center font-bold text-2xl shadow-lg p-3 rounded-lg hover:scale-105">
                                        <p class="mb-5 text-black">{{$rl->titulo}}</p>
                                        <a href="{{route('posts.show',['post'=>$rl,'user'=>$rl->user])}}">
                                            <imgc class="rounded-lg shadow-lg" src="{{asset('uploads') . '/' . $rl->imagen}}" alt="Imagen del post {{$post->titulo}}
                                            ">
                                        </a>
                                        <p class="mt-3 p-1 text-white w-full bg-orange-900 rounded-lg">${{$rl->precio}}</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div> --}}
                </div>
            @endif
        </div>
        @endauth
    </div>

@endsection