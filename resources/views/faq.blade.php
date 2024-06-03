@extends('layouts.hfaq')

@section('Titulo')
    Motor's New - Quienes Somos
@endsection

@section('contenido')
    <div>
        <div class="container flex text-left font-bold text-3xl justify-center items-center shadow-sm bg-yellow-100 rounded-lg">
            <div class="lg:w-6/7 p-4 text-center justify-center">
                <form action="{{route('register')}}">
                    <p class="mb-3">Descubre tu nuevo automovil con nosotros. <br> Desde autos usados hasta <br> completamente nuevos aqui!</p>
                    <input type="submit" value="Quiero Comprar" class="bg-orange-900 hover:bg-orange-700 mt-3 transition-colors cursor-pointer 
                    uppercase font-bold w-1/2 p-3 text-white rounded-lg text-xl">
                </form>
            </div>
            <div class='xl w-2/3 lg:w-2/3'>
                <img src="{{ asset('img/faq1.jpg')}}"alt="Imagen de faq">
            </div>
        </div>
        <hr>
        <div>
            <div class="text-3xl font-bold text-center mt-10 mb-5  shadow-md">
                <div class="mt-10 text-2xl font-normal">
                    <p class="text-3xl font-bold mb-5">5 Razones para comprar con nosotros.-</p>
                    <div class="container mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="yellow" class="w-5 h-5">
                            <path d="M10 1a6 6 0 00-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 00.572.729 6.016 6.016 0 002.856 0A.75.75 0 0012 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0010 1zM8.863 17.414a.75.75 0 00-.226 1.483 9.066 9.066 0 002.726 0 .75.75 0 00-.226-1.483 7.553 7.553 0 01-2.274 0z" />
                        </svg>                          
                        <p class="py-3 text-center ml-3">Vehículos con el mejor precio del mercado.</p>
                    </div>
                    <div class="container mx-auto flex items-center justify-center py-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="yellow" class="w-5 h-5">
                            <path d="M10 1a6 6 0 00-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 00.572.729 6.016 6.016 0 002.856 0A.75.75 0 0012 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0010 1zM8.863 17.414a.75.75 0 00-.226 1.483 9.066 9.066 0 002.726 0 .75.75 0 00-.226-1.483 7.553 7.553 0 01-2.274 0z" />
                        </svg>                          
                        <p class="text-center ml-3">Te damos garantía por 3 meses después de tu compra.</p>
                    </div>
                    <div class="container mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="yellow" class="w-5 h-5">
                            <path d="M10 1a6 6 0 00-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 00.572.729 6.016 6.016 0 002.856 0A.75.75 0 0012 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0010 1zM8.863 17.414a.75.75 0 00-.226 1.483 9.066 9.066 0 002.726 0 .75.75 0 00-.226-1.483 7.553 7.553 0 01-2.274 0z" />
                        </svg>                          
                        <p class="py-3 text-center ml-3">Ofrecemos diferentes métodos de pago.</p>
                    </div>
                    <div class="container mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="yellow" class="w-5 h-5">
                            <path d="M10 1a6 6 0 00-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 00.572.729 6.016 6.016 0 002.856 0A.75.75 0 0012 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0010 1zM8.863 17.414a.75.75 0 00-.226 1.483 9.066 9.066 0 002.726 0 .75.75 0 00-.226-1.483 7.553 7.553 0 01-2.274 0z" />
                        </svg>                          
                        <p class="py-3 text-center ml-3">Nuestra página es completamente gratuita.</p>
                    </div>
                    <div class="container mx-auto flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="yellow" class="w-5 h-5">
                            <path d="M10 1a6 6 0 00-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 00.572.729 6.016 6.016 0 002.856 0A.75.75 0 0012 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0010 1zM8.863 17.414a.75.75 0 00-.226 1.483 9.066 9.066 0 002.726 0 .75.75 0 00-.226-1.483 7.553 7.553 0 01-2.274 0z" />
                        </svg>                          
                        <p class="py-3 text-center ml-3">Ofrecemos la comisión más baja del mercado para los vendedores.</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div>
            <div class="container flex text-left font-bold text-3xl p-6 justify-between bg-orange-900 text-white items-center mb-5 w-full">
                <div class="lg:w-2/3">
                    <form action="{{route('register')}}">
                        <p class="mb-3 ml-8">Protegemos a los vendedores con <br> una comisión del 5%. <br> La más baja del mercado!</p>
                        <input type="submit" value="Quiero Vender!" class="bg-white mt-3 transition-colors cursor-pointer 
                        uppercase font-bold w-1/2 p-3 ml-8 text-orange-800 rounded-lg text-xl">
                    </form>
                </div>
                <div class='xl w-1/5 lg:w-3/5 ml-96'>
                    <img src="{{ asset('img/image5.png')}}"alt="Imagen de faq">
                </div>
            </div>
        </div>
        <div>
            <div class="container flex text-left mx-auto font-semibold text-3xl p-6 justify-between bg-white items-center mb-5">
                <div class='m w-2/4 lg:w-2/4'>
                    <img src="{{ asset('img/image7.jpg')}}"alt="Imagen de faq">
                </div>
                <div class="lg:w-2/3 text-center">
                    <form action="{{route('register')}}">
                        <p class="mb-3 text-3xl font-extrabold font-serif">Anímate!</p>
                        <p> 
                                        Se parte de esta maravillosa <br>
                                        familia y recibe 10% de descuento en<br>
                                        tu primera compra si te registras <br>
                                        antes del 30 de Noviembre usando</p>
                        <p class="font-extrabold font-serif"> el código motornov23.</p>
                        <input type="submit" value="Unirme Ahora!" class="text-white transition-colors cursor-pointer 
                        uppercase font-bold w-1/2 p-2 rounded-lg mt-5 text-xl shadow-md bg-orange-900">
                    </form>
                </div>
            </div>
            <div>
                <p class="text-center justify-center text-3xl font-bold">¿Ya tienes cuenta? <a href="{{route('login')}}" class="mt-3 transition-colors cursor-pointer 
                     font-bold w-1/2 p-1 text-orange-800 rounded-lg text-3xl">Da click aquí</a></p>
            </div>
        </div>
    </div>
@endsection