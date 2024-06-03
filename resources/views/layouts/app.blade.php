<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <link href="{{ asset('css/app.css')}}" rel="stylessheet">
        <title>Motor's New - @yield('Titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    @php
        use App\Models\ComprarOferta;
        if (auth()->user()) {            
            if (auth()->user()->estatus === "Vendedor"){
                
                $ids=auth()->user()->posts->pluck('id')->toArray();
                $aux = ComprarOferta::whereIn('post_id',$ids)->where('aceptado',0)->get();
        
                $a = $aux->count();     
            }          
        }
    @endphp
    <body class="white">
        <header class="p-3 border-b bg-orange-900 shadow">
            <div class="container mx-auto flex items-center justify-between">
                <div class=''>
                    <h1 class="text-3xl font-extrabold text-white">                
                        <a href="{{route('home')}}" class="flex items-center gap-4 p-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>                               
                            Motor's New
                        </a>
                    </h1>
                </div>
                @auth            
                    <nav class="flex gap-7 items-center text-white ml-auto">
                        @if (auth()->user()->estatus === "Vendedor")
                            <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-black rounded text-sm uppercase font-bold cursor-pointer">
                                Crear
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>                          
                            </a>
                            <a href='{{route('posts.view',[auth()->user()->username,$a])}}' class = "font-bold text-sm text-white text-center">MIS PUBLICACIONES</a>
                            <p class=' text-sm font-bold'>
                                <a href="{{route('posts.index',[auth()->user(),$a])}}">
                                    <span>OFERTAS PENDIENTES</span>
                                </a>
                            </p> 
                        @else
                            <a href="{{route('home')}}" class="font-bold text-sm text-white">       
                                QUIERO COMPRAR
                            </a>
                            <a href="{{route('comprascliente.index',auth()->user()->username)}}" class="font-bold text-sm text-white">       
                                MIS COMPRAS
                            </a>
                            <a href="{{route('ofertas.view',auth()->user()->username)}}" class="text-white font-bold text-sm">
                                OFERTAS PENDIENTES
                            </a>
                        @endif
                        <a href='{{route('posts.index',auth()->user()->username)}}' class = "font-bold text-sm">MI PERFIL: <span class="font-normal">
                            {{auth()->user()->username}}</span></a>
                        <form method='POST' action="{{route('logout')}}">
                            @csrf
                            <button type='submit' class = "font-bold uppercase text-sm">
                                Cerrar Sesion
                            </button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <p>                
                        <nav class="flex gap-4 items-center text-white ml-auto">
                            <a class = "font-bold uppercase text-sm" href="{{ route('login')}}">Iniciar sesión</a>
                            <a class = "font-bold uppercase text-sm" href="{{ route('register') }}">Crear cuenta</a>
                        </nav>
                    </p>
                @endguest
            </div>
        </header>

        <main class='container mx-auto mt-10'>
            <h2 class='font-bold text-center text-3xl mb-10'>
                @yield('Titulo')
            </h2 class='font-bold'>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Motor's New - Todos los derechos reservados &copy;
            {{ now()->year}}
        </footer>
        @livewireScripts
    </body>
</html>