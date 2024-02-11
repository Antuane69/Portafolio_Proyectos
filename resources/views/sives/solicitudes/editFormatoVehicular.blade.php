<x-app-layout>
    @section('title', 'DCJ - CFE')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Formato Entrega - Recepción de vehículos (Modo de Edición)") }}
        </h2>
    </x-slot>

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customDataTables.css') }}">
    @endsection

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg rounded-2xl">
                <form action={{ route('formato.editshow', $solicitud_id) }} method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($formatos as $formato) 
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-white bg-gray-600 rounded-t-xl mx-10 mt-5'>
                            <p>
                                Datos del Solicitante y del Vehiculo
                            </p>
                        </div>                       
                        <div class="mb-5 mx-10 px-10 py-5 text-center rounded-b-xl bg-gray-100">
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-5 md:gap-8 text-center">
                                <div class='mb-1 grid grid-cols-1'>
                                    <label for="rpe" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        RPE del Encargado
                                    </label>
                                    <p>
                                        <input type="text" name="rpe" id="rpe" placeholder="RPE del Encargado"
                                        class='bg-gray-200 border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 border-2 rounded-lg w-3/4'
                                        value="{{$solicitud->adm_rpe}}" readonly>
                                    </p>
                                </div>
                                <div class='mb-1 grid grid-cols-1'>
                                    <label for="Encargado" class=" mb-2 bloack uppercase text-gray-800 font-bold">
                                        Nombre del Encargado
                                    </label>
                                    <p>                       
                                        <input type="text" name="Encargado" value="{{$solicitud->nombre_administrador}}" id="encargado-input" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-3/4 rounded-lg' readonly>
                                    </p>
                                </div>
                                <div class='mb-1 grid grid-cols-1'>
                                    <label for="rpe_recibio" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        RPE del Solicitante
                                    </label>
                                    <p>
                                        <input type="text" name="rpe_recibio" id="rpe_recibio" placeholder="Tu RPE"
                                            class='bg-gray-200 border-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 border-2 rounded-lg w-3/4'
                                            value="{{$solicitud->RPE}}" readonly>
                                    </p>
                                </div>
                                <div class='mb-1 grid grid-cols-1'>
                                    <label for="Solicitante" class=" mb-2 bloack uppercase text-gray-800 font-bold">
                                        Solicitante
                                    </label>
                                    <p>
                                        <input type="text" name="Solicitante" value="{{$solicitud->nombre_solicitante}}" id="solicitante-input" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-3/4 rounded-lg' readonly>
                                    </p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 text-center">
                                <div class='grid grid-cols-1'>
                                    <label for="zona" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Zona
                                    </label>
                                    <p>
                                        <input type="text" name="zona" value="{{$solicitud->nombreDivision}}" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="area" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Area
                                    </label>
                                    <p>
                                        <input type="text" name="area" value="{{$solicitud->nombreArea}}" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="subarea" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        SubArea
                                    </label>
                                    <p>
                                        <input type="text" name="subarea" value="{{$solicitud->nombreSubarea}}" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>
                                    </p>
                                </div>                         
                                <div class='grid grid-cols-1'>
                                    <label for="economico" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Economico
                                    </label>
                                    <p>
                                        <input type="text" name="economico" id="economico" value="{{$solicitud->Economico}}" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly required>
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="Placa" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Placa
                                    </label>
                                    <p>              
                                        <input type="text" name="Placa" value="{{$solicitud->placa}}" id="placa-input" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>  
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="Modelo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Modelo
                                    </label>
                                    <p>        
                                        <input type="text" name="Modelo" value="{{$solicitud->modelo}}" id="modelo-input" class='bg-gray-200 border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' readonly>              
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="km" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        KM a la hora de Entrega
                                    </label>
                                    @if ($errors->first('km'))
                                        <div class="inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                                            {{$errors->first('km')}}
                                        </div>
                                    @endif
                                    <p>                       
                                        <input type="number" name="km" class='border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent mt-4 p-2 w-full rounded-lg' value="{{$formato->km}}">
                                    </p>
                                </div>
                                <div class='grid grid-cols-1'>
                                    <label for="nivel_gasolina" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Porcentaje de gasolina (Del 0% al 100%)
                                    </label>
                                    @if ($errors->first('nivel_gasolina'))
                                        <div class="inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                                            {{$errors->first('nivel_gasolina')}}
                                        </div>
                                    @endif
                                    <p>                       
                                        <input type="number" name="nivel_gasolina" class='border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' value="{{ $formato->nivel_gasolina }}" required>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class='flex items-center justify-center md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-white bg-gray-600 rounded-t-xl mx-10 mt-5'>
                            <p>
                                Revisión de las Herramientas
                            </p>
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 mb-5 mx-10 px-10 py-10 text-center rounded-b-xl bg-gray-100">
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="parrilla" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Parrilla 
                                </label>
                                <p>
                                    <select name="parrilla" id="parrilla" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('parrilla','inputDisabled','borderColor','imgPreview')"> 
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->parrilla)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id="borderColor">
                                            <img id="imgPreview" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parrilla_evi) }}">
                                    </div>
                                    <input type="file" name="parrilla_evi" class="mt-2" id="inputDisabled" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview')" disabled >
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="calaveras_traseras" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Calaveras Traseras 
                                </label>
                                <p>
                                    <select name="calaveras_traseras" id="calaveras_traseras" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('calaveras_traseras','inputDisabled2','borderColor2','imgPreview2')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->calaveras_traseras)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer2">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor2'>
                                        <img id="imgPreview2" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->calaveras_evi) }}">
                                    </div>
                                    <input type="file" name="calaveras_evi" id="inputDisabled2" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview2')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="parabrisas" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Parabrisas 
                                </label>
                                <p>
                                    <select name="parabrisas" id="parabrisas" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('parabrisas','inputDisabled3','borderColor3', 'imgPreview3')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->parabrisas)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer3">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor3'>
                                        <img id="imgPreview3" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->parabrisas_evi) }}">
                                    </div>
                                    <input type="file" name="parabrisas_evi" id="inputDisabled3" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview3')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="cristales" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Cristales 
                                </label>
                                <p>
                                    <select name="cristales" id="cristales" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('cristales','inputDisabled4','borderColor4', 'imgPreview4')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->cristales)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer4">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor4'>
                                        <img id="imgPreview4" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cristales_evi) }}">
                                    </div>
                                    <input type="file" name="cristales_evi" id="inputDisabled4" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview4')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="espejos" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Espejos 
                                </label>
                                <p>
                                    <select name="espejos" id="espejos" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('espejos','inputDisabled5','borderColor5', 'imgPreview5')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->espejos)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer5">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor5'>
                                        <img id="imgPreview5" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->espejos_evi) }}">
                                    </div>
                                    <input type="file" name="espejos_evi" id="inputDisabled5" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview5')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="tablero" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Tablero 
                                </label>
                                <p>
                                    <select name="tablero" id="tablero" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('tablero','inputDisabled6','borderColor6', 'imgPreview6')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->tablero)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer6">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor6'>
                                        <img id="imgPreview6" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tablero_evi) }}">
                                    </div>
                                    <input type="file" name="tablero_evi" id="inputDisabled6" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview6')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="aire_acondicionado" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Aire Acondicionado
                                </label>
                                <p>
                                    <select name="aire_acondicionado" id="aire_acondicionado" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('aire_acondicionado','inputDisabled7','borderColor7', 'imgPreview7')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->aire_acondicionado)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer7">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor7'>
                                        <img id="imgPreview7" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->aire_evi) }}">
                                    </div>
                                    <input type="file" name="aire_evi" id="inputDisabled7" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview7')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="cinturon_seguridad" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Cinturon de Seguridad 
                                </label>
                                <p>
                                    <select name="cinturon_seguridad" id="cinturon_seguridad" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('cinturon_seguridad','inputDisabled8','borderColor8', 'imgPreview8')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->cinturon_seguridad)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer8">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor8'>
                                        <img id="imgPreview8" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->cinturon_evi) }}">
                                    </div>
                                    <input type="file" name="cinturon_evi" id="inputDisabled8" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview8')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="llantas" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Llantas 
                                </label>
                                <p>
                                    <select name="llantas" id="llantas" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('llantas','inputDisabled9','borderColor9', 'imgPreview9')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->llantas)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer9">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor9'>
                                        <img id="imgPreview9" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantas_evi) }}">
                                    </div>
                                    <input type="file" name="llantas_evi" id="inputDisabled9" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview9')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="tapiceria" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Tapiceria 
                                </label>
                                <p>
                                    <select name="tapiceria" id="tapiceria" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('tapiceria','inputDisabled10','borderColor10', 'imgPreview10')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->tapiceria)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer10">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor10'>
                                        <img id="imgPreview10" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->tapiceria_evi) }}">
                                    </div>
                                    <input type="file" name="tapiceria_evi" id="inputDisabled10" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview10')" disabled>
                                </div>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="llanta_refaccion" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Llanta de Refaccion 
                                </label>
                                <p>
                                    <select name="llanta_refaccion" id="llanta_refaccion" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg' onchange="mostrarInput('llanta_refaccion','inputDisabled11','borderColor11', 'imgPreview11')">             
                                        @foreach($opciones as $opcion)
                                            @if ($opcion == $formato->llanta_refaccion)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <div class='grid grid-cols-1' id="imageContainer11">
                                    <label for="campoOculto" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                        Evidencia:
                                    </label>
                                    <div style="border-color: #C6C4C4; width: 200px; height: 150px;" class='bg-white text-center overflow-hidden ml-5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg border-2' id='borderColor11'>
                                        <img id="imgPreview11" style="width: 180px; height: 130px;" src="{{ asset('/img/SIVE/solicitudesvehiculares/evidenciasFormato/' . $formato->llantaref_evi) }}">
                                    </div>
                                    <input type="file" name="llantaref_evi" id="inputDisabled11" class="mt-2" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage(event, '#imgPreview11')" disabled>
                                </div>
                            </div>
                        </div>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-3 pb-2 font-bold text-3xl text-white bg-gray-600 rounded-t-xl mx-10 mt-5'>
                            <p>
                                Herramientas Externas 
                            </p>
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 mb-5 mx-10 px-10 py-10 text-center rounded-b-xl bg-gray-100">
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="gato" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Gato 
                                </label>
                                <p>
                                    <select name="gato" id="gato" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->gato)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="gato_ton" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Indica las Toneladas del Gato 
                                </label>
                                @if ($errors->first('gato_ton'))
                                    <div class="inline-flex flex-row text-red-600 bg-red-100 border border-red-400 rounded py-2 px-4 my-2">
                                        {{$errors->first('gato_ton')}}
                                    </div>
                                @endif     
                                <p>                       
                                    <input type="number" name="gato_ton" id="gato_ton" placeholder="Ingresa la cantidad en toneladas" class='border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg' value="{{ $formato->gato_ton }}">
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="llave_ruedas" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Llave de Ruedas 
                                </label>
                                <p>
                                    <select name="llave_ruedas" id="llave_ruedas" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->llave_ruedas)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="senalamientos" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Señalamientos 
                                </label>
                                <p>
                                    <select name="senalamientos" id="senalamientos" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->senalamientos)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="extinguidor" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Extinguidor Vigente  
                                </label>
                                <p>
                                    <select name="extinguidor" id="extinguidor" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->extinguidor)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="tarjeta_circulacion" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Tarjeta de Circulacion 
                                </label>
                                <p>
                                    <select name="tarjeta_circulacion" id="tarjeta_circulacion" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->tarjeta_circulacion)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="placas_chequeo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Placas 
                                </label>
                                <p>
                                    <select name="placas_chequeo" id="placas_chequeo" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->placas_chequeo)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="poliza_seguro" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Poliza de Seguro 
                                </label>
                                <p>
                                    <select name="poliza_seguro" id="poliza_seguro" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->poliza_seguro)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="estereo" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Estereo 
                                </label>
                                <p>
                                    <select name="estereo" id="estereo" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->estereo)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='mb-1 grid grid-cols-1'>
                                <label for="radio_bandacivil" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Radio de Banda Civil 
                                </label>
                                <p>
                                    <select name="radio_bandacivil" id="radio_bandacivil" class='border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent py-2 px-3 border-2 w-full rounded-lg'>             
                                        @foreach($opciones2 as $opcion)
                                            @if ($opcion == $formato->radio_bandacivil)
                                                <option value='{{$opcion}}' selected>{{$opcion}}</option>
                                            @else
                                                <option value='{{$opcion}}'>{{$opcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class='grid grid-cols-1'>
                                <label for="observaciones" class="mb-2 bloack uppercase text-gray-800 font-bold">
                                    Observaciones
                                </label>
                                <p>     
                                    <textarea name="observaciones" id="observaciones" class="border-green-600 border-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent p-2 w-full rounded-lg">{{old('observaciones',$formato->observaciones)}}</textarea>         
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pb-5'>
                        <a href="{{ route('historicoSolicitudes.show') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                            >Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    document.addEventListener("DOMContentLoaded", function() {
        // Llamada para todos los select
        mostrarInput('parrilla', 'inputDisabled', 'borderColor', 'imgPreview');
        mostrarInput('calaveras_traseras', 'inputDisabled2', 'borderColor2', 'imgPreview2');
        mostrarInput('parabrisas', 'inputDisabled3', 'borderColor3', 'imgPreview3');
        mostrarInput('cristales', 'inputDisabled4', 'borderColor4', 'imgPreview4');
        mostrarInput('espejos', 'inputDisabled5', 'borderColor5', 'imgPreview5');
        mostrarInput('tablero', 'inputDisabled6', 'borderColor6', 'imgPreview6');
        mostrarInput('aire_acondicionado', 'inputDisabled7', 'borderColor7', 'imgPreview7');
        mostrarInput('cinturon_seguridad', 'inputDisabled8', 'borderColor8', 'imgPreview8');
        mostrarInput('llantas', 'inputDisabled9', 'borderColor9', 'imgPreview9');
        mostrarInput('tapiceria', 'inputDisabled10', 'borderColor10', 'imgPreview10');
        mostrarInput('llanta_refaccion', 'inputDisabled11', 'borderColor11', 'imgPreview11');
        // ... Puedes agregar más llamadas según sea necesario

        // LLamada a que se puedan clickear los divs de las imagenes
        setupImageContainer('imageContainer');
        setupImageContainer('imageContainer2');
        setupImageContainer('imageContainer3');
        setupImageContainer('imageContainer4');
        setupImageContainer('imageContainer5');
        setupImageContainer('imageContainer6');
        setupImageContainer('imageContainer7');
        setupImageContainer('imageContainer8');
        setupImageContainer('imageContainer9');
        setupImageContainer('imageContainer10');
        setupImageContainer('imageContainer11');
    });

    function mostrarInput(Id_input,Id_disabled,borderColor,Id_Imagen){
        var SITEURL = "{{ url('/') }}";
        var ruta = `${SITEURL}/assets/NoImagen.jpg`;

        const $imgPreview = document.getElementById(Id_Imagen);
        const $fileDelete = document.getElementById(Id_disabled);
        var input = document.getElementById(Id_input).value;
        if(input == "Malo"){
            document.getElementById(Id_disabled).disabled = false; 
            if($imgPreview.src != ruta){
                document.getElementById(Id_disabled).required = false; 
            }else{
                document.getElementById(Id_disabled).required = true; 
            }
            document.getElementById(borderColor).style.borderColor = 'black';
        }else{
            document.getElementById(Id_disabled).disabled = true; 
            document.getElementById(Id_disabled).required = false;
            document.getElementById(borderColor).style.borderColor = '#C6C4C4';

            // Verificamos si la imagen ya existe
            if ($imgPreview.src) {
                // Limpiamos el atributo src para hacer que la imagen desaparezca
                $imgPreview.src = ruta;
                // Restablecemos el valor del input file para eliminar la imagen seleccionada
                $fileDelete.value = "";
            }
        }
    }

    function setupImageContainer(containerId) {
        var imageContainer = document.getElementById(containerId);
        var fileInput = imageContainer.querySelector('input[type="file"]');

        imageContainer.addEventListener('click', function () {
            fileInput.click(); // Simula un clic en el input de tipo file
        });
    }

    function previewImage(event, querySelector){

        //Recuperamos el input que desencadeno la acción
        const input = event.target;

        //Recuperamos la etiqueta img donde cargaremos la imagen
        $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if(!input.files.length) return

        //Recuperamos el archivo subido
        file = input.files[0];

        //Creamos la url
        objectURL = URL.createObjectURL(file);

        //Modificamos el atributo src de la etiqueta img
        $imgPreview.src = objectURL;
                
    }

</script>

<script>
    //busqueda por RPE
    var SITEURL = "{{ url('/') }}";
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    //Actualizar areas select dependiendo la division
    document.getElementById('Zona').addEventListener('change', (e) => {
        fetch('/areas', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value,
                "_token": "{{ csrf_token() }}"
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            },
        }).then(response => {
            return response.json()
        }).then(data => {
            var opciones = "";
            for (let i in data.lista) {
                opciones += '<option value="' + data.lista[i].area_clave + '">' + data.lista[i]
                    .area_nombre + '</option>';
            }
            document.getElementById("Proceso").innerHTML = opciones;
            document.getElementById("marca-input").value = "po";
            document.getElementById("modelo-input").value = 'p';

            fetch('/subarea', {
                method: 'POST',
                body: JSON.stringify({
                    texto: data.lista[0].area_clave,
                    "_token": "{{ csrf_token() }}"
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].subarea_clave + '">' + data
                        .lista[i].subarea_nombre + '</option>';
                }
                document.getElementById("Subproceso").innerHTML = opciones;
            }).catch(error => alert(error));

        }).catch(error => alert(error));
    })

    //Actualizar subareas select dependiendo el area
    document.getElementById('Proceso').addEventListener('change', (e) => {
        fetch('/subarea', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value,
                "_token": "{{ csrf_token() }}"
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            },
        }).then(response => {
            return response.json()
        }).then(data => {
            var opciones = "";
            for (let i in data.lista) {
                opciones += '<option value="' + data.lista[i].subarea_clave + '">' + data.lista[i]
                    .subarea_nombre + '</option>';
            }
            document.getElementById("Subproceso").innerHTML = opciones;
        }).catch(error => alert(error));
    })
</script>