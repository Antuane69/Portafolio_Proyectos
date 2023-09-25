<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <link href="{{ asset('css/app.css')}}" rel="stylessheet">
        <title>Devstagram - @yield('Titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body class="white">
        <header class="p-5 border-b bg-blue-900 shadow">
            <div class="container mx-auto flex items-center justify-between">
                <div class=''>
                    <h1 class="text-3xl font-extrabold text-white">                
                        <a href="{{route('home')}}" class="flex items-center gap-2 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>      
                            DevStagram
                        </a>
                    </h1>
                </div>
                
                @auth            
                    <nav class="flex gap-7 items-center text-white">
                        <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-blue-900 rounded text-sm uppercase font-bold cursor-pointer">
                            Crear
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>                          
                        </a>
                        <a href='{{route('posts.index',auth()->user()->username)}}' class = "font-extrabold text-sm" href="#">Hola: <span class="font-normal">
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
                        <nav class="flex gap-3 items-center text-white">
                            <a class = "font-bold uppercase text-sm" href="{{ route('login')}}">Login</a>
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
            Devstagram - Todos los derechos reservados &copy;
            {{ now()->year}}
        </footer>
        @livewireScripts
    </body>
</html>