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
                        El presente correo es con intención de comunicar que el contrato del empleado(a) {{$solicitud->nombre}} está a punto de vencer el dia
                        @if($aux == 'Contrato Indefinido')
                            {{ $solicitud->indefinido }}.
                        @elseif($aux == 'Segundo Contrato')
                            {{ $solicitud->segundo }}.
                        @elseif($aux == 'Tercer Contrato')
                            {{ $solicitud->tercero }}.
                        @endif
                    </p>
                    <p class="content-paragraph font-bold text-xl">Datos de la Solicitud:</p>
                    <div class="data-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">NOMBRE</th>
                                    <th style="width: 15%;">PUESTO</th>
                                    <th style="width: 25%;">FECHA INGRESO</th>
                                    <th style="width: 15%;">FECHA DEL CONTRATO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">{{ $solicitud->nombre }}</td>
                                    <td align="center" style="font-weight: bold;">{{ $solicitud->puesto }}</td>
                                    <td align="center">{{ $solicitud->ingreso }}</td>
                                    @if($aux == 'Contrato Indefinido')
                                        <td align="center">{{ $solicitud->indefinido }}</td>
                                    @elseif($aux == 'Segundo Contrato')
                                        <td align="center">{{ $solicitud->segundo }}</td>
                                    @elseif($aux == 'Tercer Contrato')
                                        <td align="center">{{ $solicitud->tercero }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="content-paragraph font-bold text-m">Favor de ingresar a la página para actualizar el contrato del empleado: <a href="{{ route('editarEmpleado.show',$solicitud->id) }}" target="_blank" style="font-weight:bold;color:#0369a1">Da click aquí.</a> </p>
                </div>
                
                <div class="footer-section">
                    <div class="content-section">
                        <p class="content-paragraph">
                            Quedamos a sus órdenes para cualquier pregunta, solicitud o comentario que pueda tener. 
                        </p>
                        <p class="content-paragraph">
                            Little Tokyo. <br> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</x-correos-layout>
                    
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
                    