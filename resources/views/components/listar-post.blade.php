<div>
    @if($posts->count())
        <div>
            <form class="mb-6" action="{{route('home')}}" method="POST">
                @csrf
                <p>
                    <label for="filtro" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Filtrar por Marca
                    </label>
                </p>
                <p>
                    <select name="filtro" id="filtro" class='mt-3 border p-2 w-1/5 rounded-lg'>
                        <option value="Todos">-- TODOS --</option>
                        @foreach ($filtrado as $filtro)                    
                            <option value={{$filtro}} class="mb-4">{{$filtro}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Filtrar" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                    uppercase font-bold ml-5 p-2 text-white rounded-lg">
                </p>
            </form>
            <form class="mb-6" action="{{route('home')}}" method="POST">
                @csrf
                <p>
                    <label for="ordenar" class="mb-2 bloack uppercase text-gray-800 font-bold">
                        Ordenar
                    </label>
                </p>
                <p>
                    <select name="ordenar" id="ordenar" class='mt-3 border p-2 w-1/5 rounded-lg'>
                        <option value="AZ">Ordenar de la A a la Z</option>
                        <option value="ZA">Ordenar de la Z a la A</option>
                        <option value="Pma">Ordenar por Precio Mayor a Menor</option>
                        <option value="Pme">Ordenar por Precio Menor a Mayor</option>
                        <option value="MV">Ordenar por los más Vendidos</option>
                    </select>
                    <input type="submit" value="Ordenar" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                    uppercase text-md font-bold ml-5 p-2 text-white rounded-lg">
                </p>
            </form>
            <form class="mb-10" action="{{route('home')}}" method="POST">
                <div class="w-2/6">
                    <div class="inline-block">
                        <label for="buscador" class="mb-4 bloack uppercase text-gray-800 font-bold">
                            Buscador
                        </label>
                        <input type="text" name="buscador" id="buscador" placeholder="Busca por titulo de la publicacion" class='border p-3 w-full rounded-lg'>
                    </div>                
                    <input type="submit" value="Buscar" class="bg-orange-900 hover:bg-orange-700 transition-colors cursor-pointer 
                    uppercase text-md font-bold ml-5 p-2 text-white rounded-lg">
                </div>
                @csrf
            </form>
        </div>
        @if (session('success'))
            <div class="alert alert-success font-bold text-red-700 mb-10">
                {{ session('success') }}
            </div>
        @endif
        <div class='grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6'>
            @foreach ($posts as $post)
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
        <p class="mt-12">
            {{ $posts->links() }}
        </p>
    @else
        @if (auth()->user()->estatus == 'Vendedor')
            <p class="text-center font-medium text-blue-900">No hay artículos a la venta actualmente, regresa luego!</p>
        @else
            <p class="text-center font-medium text-blue-900">No tienes artículos de intéres, Busca algunos!</p>
        @endif
    @endif
</div>
