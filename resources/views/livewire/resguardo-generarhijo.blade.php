<div>
    <div class="mt-4 px-4 py-3 ml-11 leading-normal text-green-500 rounded-lg" role="alert">
        <div class="text-left">
            <a href="{{ route('resguardos.inicio') }}" class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Regresar
            </a>
        </div>
    </div>
    <form action="{{ route('resguardos.storehijo') }}" method="POST" enctype="multipart/form-data" class="formEnviar">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-8 mx-7">
            <h2 class="font-semibold text-xl text-gray-500 justify-self-center">Información del resguardador físico</h2>
            <!-- RPE de Resguardador Fisico -->
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RPE de Resguardador Fisico:</label>
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <div class="grid grid-cols-1">
                        <input wire:model='sumitedRpe' name="rpe_resg" style="border-color: rgb(21 128 61);" class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen" required value="9jjny" />
                        @error('rpe_resg')
                        <p class=" text-red-500 text-sm p-2 text-center "> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Mostrar resguardador -->
            @if (!is_null($user))
            <div wire:ignore>
                <!-- Nombre -->
                <div class="grid grid-cols-1 gap-5 md:gap-8 mt-2 ">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre del resguardador:</label>
                        <input style="border-color: rgb(21 128 61);" class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$user->paterno . " " . $user->materno . ", " . $user->nombre}}" disabled />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3  mt-2">
                    <!--Division-->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Division:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$user->getSubarea->area->division->division_nombre}}" />
                    </div>
                    <!-- Area -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Area:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$user->getSubarea->area->area_nombre}}" />
                    </div>
                    <!--Subarea -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subarea:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$user->getSubarea->subarea_nombre}}" />
                    </div>
                </div>
            </div>
            @else
            <h2 class="font-semibold text-l text-gray-400 justify-self-center">Usuario no encontrado</h2>
            @endif

            <!-- RPE de quien autoriza -->
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RPE de quien autoriza:</label>
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <div class="grid grid-cols-1">
                        <select wire:model='sumitedAutorizador' name="rpe_autoriza" style="border-color: rgb(21 128 61);" class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen" required value="9JJK9">
                            <option value="">-Seleccione Jefe de División-</option>
                            @foreach ($jefesDivision as $div)
                            <option id="{{ $div->id }}" value="{{ $div->rpe }}">{{ $div->rpe }}
                            </option>
                            @endforeach
                        </select>
                        @error('rpe_autoriza')
                        <p class=" text-red-500 text-sm p-2 text-center "> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Mostrar quien autoriza -->
            @if (!is_null($usera))
            <div>
                <!-- Nombre -->
                <div class="grid grid-cols-1 gap-5 md:gap-8 mt-2 ">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre del resguardador:</label>
                        <input style="border-color: rgb(21 128 61);" class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$usera->paterno . " " . $usera->materno . ", " . $usera->nombre}}" disabled />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3  mt-2">
                    <!--Division-->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Division:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$usera->getSubarea->area->division->division_nombre}}" />
                    </div>
                    <!-- Area -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Area:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$usera->getSubarea->area->area_nombre}}" />
                    </div>
                    <!--Subarea -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subarea:</label>
                        <input style="border-color: rgb(21 128 61);" disabled class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$usera->getSubarea->subarea_nombre}}" />
                    </div>
                </div>
            </div>
            @else
            <h2 class="font-semibold text-l text-gray-400 justify-self-center">Usuario no encontrado</h2>
            @endif



            <!-- Información de resguardo-->
            <h2 class="font-semibold text-xl text-gray-500 justify-self-center mt-5">Información de resguardo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-0">
                <!--Clasificacion de resguardo -->
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Codigo SAP:</label>
                    <div class="grid grid-cols-1">
                        <input style="border-color: rgb(21 128 61);" class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$claseAct->Codigo}}" disabled />
                    </div>
                </div>
                <!-- Info clasificacion -->
                <div class="grid grid-cols-1 col-span-2 items-center">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clase:</label>
                    <input style="border-color: rgb(21 128 61);" class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value="{{$claseAct->Nombre}}" disabled />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-0" wire:ignore>
                <!--fecha de creación -->
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de creación:</label>
                    <input name="fecha_cre" style="border-color: rgb(21 128 61);" class=" py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" type="text" disabled value=<?php $hoy = date("d/m/Y");
                                                                                                                                                                                                                                                                    echo $hoy; ?> />
                </div>
                <!--fecha de adquisición -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha de adquisición:</label>
                    </div>
                    <input name="fecha_adq" style="border-color: rgb(21 128 61);" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" type="text" disabled value=<?php $f = Carbon\Carbon::parse($resguardo->fecha_adq);
                                                                                                                                                                                                                                                                    echo $f->format("d/m/Y"); ?> />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 md:gap-8 md:grid-cols-3 mt-2 ">
                <!-- División -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            División:</label>
                        @error('division') <!-- Mensaje de error -->
                        <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div>
                    <select wire:model='selectedDivision' name="division" id="divisionSelect" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required> <!--Si el usuario no tiene permiso de cambiar la division -->
                        <option value="">-Seleccione División-</option>
                        @foreach ($division as $div)
                        <option id="{{ $div->id }}" value="{{ $div->division_clave }}">{{ $div->division_nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Area -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            ÁREA:</label>
                        @error('area') <!-- Mensaje de error -->
                        <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div>
                    <select wire:model='selectedArea' name="area" id="areaSelect" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <option value="">-Seleccione área-</option>
                        @if($division->count()>0)
                        @foreach ($areas as $area)
                        <option id="{{ $area->id }}" value="{{ $area->area_clave }}">{{ $area->area_nombre }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>            
                <!-- Centro de costos -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Ce:Co:</label>
                    </div>
                    <select wire:model='selectedCeco' name="centro_costos_id" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        @if($areas->count()>0 && !is_null($selectedDivision) && !is_null($selectedArea))
                        @foreach ($cecos as $ceco)
                        <option id="{{ $ceco->id }}" value="{{ $ceco->id }}">{{ $ceco->ceco_clave . ' - ' . $ceco->ceco_descripcion }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-0" wire:ignore>
                <!-- Descripcion -->
                <div class="grid grid-cols-1 md:col-span-2">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Descripcion:</label>
                    </div>
                    <input name="descripcion" disabled style="border-color: rgb(21 128 61);" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value={{$resguardo->descripcion}} />
                </div>
                <!-- Marca -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Marca:</label>
                    </div>
                    <input name="marca" disabled style="border-color: rgb(21 128 61);" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200" value={{$resguardo->marca}} />
                </div>
                <!-- Modelo -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Modelo:</label>
                    </div>
                    <input name="modelo" disabled style="border-color: rgb(21 128 61);" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-gray-200" value={{$resguardo->modelo}} />
                </div>
                <!-- Cantidad -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Cantidad (Basada en Numeros de Serie Seleccionados):</label>
                        @error('cantidad') <!-- Mensaje de error -->
                        <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div>
                    <input name="cantidadD" style="border-color: rgb(21 128 61);" id="cantD" disabled type="number" min="1" max={{$resguardo->cantidad}} class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value='0' />
                    <input name="cantidad" style="border-color: rgb(21 128 61);" id="cant" hidden type="number" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value={{$resguardo->cantidad}} />
                </div>
                <!-- N° de Serie -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            N° de Serie:</label>
                        @error('n_serief')
                        <p class=" text-red-500 text-sm p-2 text-center ">Seleccionar minimo uno</p>
                        @enderror
                    </div>
                    <div id="divNS" class="grid grid-cols-3 py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <?php $str = substr($resguardo->n_serie, 1, Str::length($resguardo->n_serie) - 2);
                        $arr = explode(',', $str);
                        $i = 0; ?>
                        @foreach ($arr as $num)
                        <?php $i = $i + 1; ?>
                        <label><input name={{"ns_".$i}} type="checkbox" multiple="multiple" id={{"ns_".$i}} title={{str_replace('"','',$num)}} style="font-weight: 600; font-size: 1.25rem;--tw-text-opacity: 1;line-height: 1.25;">
                            {{str_replace('"','',$num)}}</label>
                        @endforeach
                    </div>
                </div>
                <input hidden id="n_serief" name="n_serief" />
                <!--N° provedor: -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Numero proveedor:</label>
                    </div>
                    <input name="n_proveedor" disabled style="border-color: rgb(21 128 61);" class="bg-gray-200 py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{$resguardo->n_proveedor}}" /> <!-- min="1" type="number" -->
                    </select>
                </div>
                <!-- Precio: -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Precio:</label>
                    </div>
                    <input name="precio" disabled class="bg-gray-200 py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{$resguardo->precio}}" />
                    </select>
                </div>
                <!--N° de Factura: -->
                <div class="grid grid-cols-1 ">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            N° de Factura:</label>
                    </div>
                    <input name="n_factura" bg-gray-200 disabled style="border-color: rgb(21 128 61);" class="bg-gray-200 py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{$resguardo->n_factura}}" /> <!-- min="1" type="number" -->
                    </select>
                </div>
                <!--Razon o Denominación Social -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Razon o Denominación Social:</label>
                    </div>
                    <input name="razon" disabled style="border-color: rgb(21 128 61);" class="py-2 px-3 rounded-lg border-2 bg-gray-200 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" value="{{$resguardo->razon}}" />
                </div>
                <!--Obeservaciones -->
                <div class="grid grid-cols-1 md:col-span-2">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Observaciones:</label>
                    </div>
                    <input name="observacion" disabled style="border-color: rgb(21 128 61);" type="textarea" class="py-2 px-3 rounded-lg border-2 bg-gray-200 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" value="{{$resguardo->observacion}}" />
                </div>
                <!-- Costo de activo: -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Costo de activo:</label>
                    </div>
                    <input name="costo" value={{$resguardo->costo}} disabled class="py-2 px-3 rounded-lg border-2 bg-gray-200 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                    </select>
                </div>
                <!-- Vacio por Propositos Visuales-->
                <div class="grid grid-cols-1">

                </div>
                <!--Factura PDF -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Factura (Formato PDF):</label>
                        <embed src={{asset('/facturas/' . $resguardo->facturapdf.'#toolbar=0') }} class="rounded-lg border-2 bg-gray-100 border-green-600" frameborder=0 name="pdf_display" id="pdf_display" width="100%" height="100%" type="application/pdf">
                    </div>
                </div>

                <!--Factura XML -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Factura (Formato XML):</label>
                        <label type='text' class="rounded-lg border-2 bg-gray-100 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <?php header('Content-Type: text/xml');
                            //$ss = file_get_contents(asset('/facturas/' . $resguardo->facturaxml));                                
                            $ss = file_get_contents('facturas/' . $resguardo->facturaxml);
                            echo $ss
                            ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <input hidden name='id_resg' value="{{$resguardo->id}}" />
        <!--Fotografias-->
        <div class="grid grid-cols-1 md:grid-cols-2 mt-5 mx-7" wire:ignore>
            <!--Foto activo 1 -->
            @if($resguardo->photo_act1 != null)
            <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                    <div class='flex flex-col items-center justify-center pt-7'>
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto activos 1 (.png .jpg .jpeg)</label>
                        <img src="{{ asset('imagen_resguardo/'.$resguardo->photo_act1) }}" id="imagenSeleccionada1" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                    </div>
                </label>
            </div>
            @endif
            <!--Foto activo 2 -->
            @if($resguardo->photo_act2 != null)
            <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                    <div class='flex flex-col items-center justify-center pt-7'>
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto activos 2 (.png .jpg .jpeg)</label>
                        <img src="{{ asset('imagen_resguardo/'.$resguardo->photo_act2) }}" id="imagenSeleccionada2" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                    </div>
                </label>
            </div>
            @endif
            <!--Foto activo 3 -->
            @if($resguardo->photo_act3 != null)
            <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                    <div class='flex flex-col items-center justify-center pt-7'>
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto activos 3 (.png .jpg .jpeg)</label>
                        <img src="{{ asset('imagen_resguardo/'.$resguardo->photo_act3) }}" id="imagenSeleccionada3" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                    </div>
                </label>
            </div>
            @endif
            <!--Numero de serie-->
            @if($resguardo->photo_n_fact != null)
            <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                    <div class='flex flex-col items-center justify-center pt-7'>
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto Numero de Serie</label>
                        <img src="{{ asset('imagen_resguardo/'.$resguardo->photo_n_fact) }}" id="imagenSeleccionada4" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;" class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                    </div>
                </label>
            </div>
            @endif
        </div>

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <a href="{{ url()->previous() }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
            <!-- botón enviar -->
            <form action="{{ route('resguardos.storehijo') }}" method="POST" class="formEnviar w-auto bg-green-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                <button type="submit" class="w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-7 py-2">Enviar</button>
            </form>
        </div>
    </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src={{asset('plugins/jquery/jquery-3.5.1.min.js')}}></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script>
    var list = '#ns_1'
    var total = $('#cant').val()
    $('#cant').attr('value', 0)

    for (let index = 2; index <= total; index++) {
        list = list + ',' + ' #ns_' + index;
    }
    $(list).on('change', function() {
        var num = 0
        var arr = new Array();
        num = 0
        for (let index = 1; index <= total; index++) {
            var name = '#ns_' + index
            if ($(name).prop('checked')) {
                arr[num] = $(name).attr('title')
                num = num + 1
            }
        }
        $('#cantD').attr('value', num);
        $('#cant').attr('value', num);
        $('#n_serief').attr('value', arr);
    })
</script>