<x-correos-layout>
    
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .header {
            max-width: 80rem; /* Equivalente a max-w-7xl en tailwindcss */
            margin-right: auto;
            margin-left: auto;
            padding-top: 1.5rem; /* Ajusta según tus necesidades */
            padding-right: 1rem; /* Ajusta según tus necesidades */
            padding-bottom: 1.5rem; /* Ajusta según tus necesidades */
            padding-left: 1rem; /* Ajusta según tus necesidades */
        }

        .container {
            padding-top: 3rem;
            max-width: 65rem;
            max-height: 80rem;
            margin: 0 auto;
        }

        .main-box {
            background-color: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15);
            margin-left: 4rem; /* Equivalent to ml-36 */
            width: 70%;
        }

        .header-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 2rem;
            margin-top: 2rem;
            margin-right: 1.5rem;
            text-align: center;
            margin: 0 auto;
            align-items: center;
            width: 100%;
        }

        .header-section > div {
            margin-bottom: 2rem;
        }

        .title-label {
            color: #556575;
            font-weight: bold;
            font-size: 1.5rem;
            /* text-transform: uppercase; */
            margin-bottom: 1rem;
            width: 100%;
            margin-top: 1rem;
            
        }

        .content-section {
            margin-left: 1.5rem;
            margin-right: 1.5rem;
            margin-bottom: -40px;
        }

        .content-paragraph {
            text-align: justify;
            font-size: 1rem;
            color: #6B7280;
            margin-bottom: 1.5rem;
        }

        .data-table {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            width: 100%;
        }

        .table th,
        .table td {
            text-align: center;
            border: 1px solid #383838;
            border-bottom: 1px solid #383838;
            padding: 0.5rem 1rem;
        }

        .table th {
            background-color: #2e934f;
            color: #FFFFFF;
        }

        .footer-section {
            margin-top: 3rem;
        }

        .footer-text {
            text-align: justify;
            margin-bottom: 2rem;
        }

        .footer-images {
            display: flex;
            flex-direction: column;
            margin-top: 2rem;
            margin-left: 2rem;
        }

        .footer-images a {
            margin-bottom: 3rem;
        }

        .footer-images img {
            border-radius: 0.5rem;
            transition: box-shadow 0.2s ease-in-out;
        }

        .footer-images img:last-child {
            margin-top: 2rem;
            margin-left: 120px;
        }

    </style>
    @endsection

    <div class="container">
        <div class="main-box">
            <div class="header-section w-full">
                <p style="text-align:center" class="title-label">
                    {{$titulo}}
                </p>
            </div>
            <div>
                <div class="content-section">
                    <div>
                        <a>
                            <img class="rounded-md md w-2/3 hover:w-10 transition-shadow" src="{{ $message->embed(public_path('assets/tokyoLogo.png')) }}" style="width: 150px; height: 150px;">
                        </a>                          
                    </div>
                    <p class="content-paragraph">
                        @if ($aux == "Pedir")
                            El presente correo es con intención de comunicar que el (la) empleado(a) {{$solicitud->nombre}} a solicitado vacaciones empezando en la fecha {{$solicitud->inicio}} y terminando en la fecha {{$solicitud->regreso}}.
                        @elseif ($aux == "Autorizada")
                            El presente correo es con intención de comunicar que sus vacaciones han sido Autorizadas por Recursos Humanos, a fecha de {{$fecha}}.
                        @else
                            El presente correo es con intención de comunicar que sus vacaciones han sido Rechazadas por Recursos Humanos, a fecha de {{$fecha}}.
                        @endif
                    </p>
                    <p class="content-paragraph font-bold text-xl">Datos de la Solicitud:</p>
                    <div class="data-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">NOMBRE</th>
                                    <th style="width: 15%;">FECHA INICIO</th>
                                    <th style="width: 25%;">FECHA REGRESO</th>
                                    <th style="width: 15%;">EMPLEADOS QUE CUBREN</th>
                                    <th style="width: 15%;">DIAS USADOS</th>
                                    @if (($aux == 'Rechazada'))
                                        <th style="width: 15%;">MOTIVO</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">{{ $solicitud->empleado->nombre }}</td>
                                    <td align="center" style="font-weight: bold;">{{ $solicitud->inicio }}</td>
                                    <td align="center">{{ $solicitud->regreso }}</td>
                                    <td align="center">{{ $solicitud->nombre_real }}</td>
                                    <td align="center">{{ $solicitud->dias_usados }}</td>
                                    @if($aux == 'Rechazada')
                                        <td align="center">{{ $solicitud->comentario }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="footer-section">
                    <div class="content-section">
                        <p class="content-paragraph">
                            Quedamos a sus órdenes para cualquier pregunta, solicitud o comentario que pueda tener. 
                        </p>
                        <p class="content-paragraph">
                            Little Tokyo. <br> 
                            @if (auth()->user()->hasRole('admin'))                                    
                                <p>
                                    <a href="{{ route('mostrarVacaciones.show') }}" target="_blank" style="font-weight:bold;color:#0369a1">Ver la Solicitud en la Página.</a>
                                </p>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</x-correos-layout>
                    
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
                    