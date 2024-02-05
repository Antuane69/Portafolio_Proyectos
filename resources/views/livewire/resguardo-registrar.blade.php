<div>
    <form action="{{ route('resguardos.store') }}" method="POST" enctype="multipart/form-data" class="formEnviar">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-8 mx-7">
            <h2 class="font-semibold text-xl text-gray-500 justify-self-center">Información del resguardador físico</h2>
            <!-- RPE de Resguardador Fisico -->
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*RPE de Resguardador Fisico:</label>
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <div class="grid grid-cols-1">
                        <input 
                            wire:model='sumitedRpe'
                            name="rpe_resg" 
                            style="border-color: rgb(21 128 61);"
                            class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen"
                            required
                            value="{{old('rpe_resg')}}"/>
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
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                value = "{{$user->paterno . " " . $user->materno . ", " . $user->nombre}}"
                                disabled
                                />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3  mt-2" >
                        <!--Division-->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Division:</label>
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                disabled 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"  
                                value = "{{$user->getSubarea->area->division->division_nombre}}"
                                />
                        </div>
                        <!-- Area -->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Area:</label>
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                disabled 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"  
                                value = "{{$user->getSubarea->area->area_nombre}}"
                                />
                        </div>
                    <!--Subarea -->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subarea:</label>
                            <input 
                                style="border-color: rgb(21 128 61);"  
                                disabled
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                value = "{{$user->getSubarea->subarea_nombre}}"
                                />
                        </div>
                    </div>
                </div>
            @else
                <h2 class="font-semibold text-l text-gray-400 justify-self-center">Usuario no encontrado</h2>
            @endif

            <!-- RPE de quien autoriza -->
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*RPE de quien autoriza:</label>
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <div class="grid grid-cols-1">
                        <select
                            wire:model='sumitedAutorizador'
                            name="rpe_autoriza" 
                            style="border-color: rgb(21 128 61);"
                            class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen"
                            required
                            value="{{old('rpe_resg')}}"/>
                            <option value="">-Seleccione Jefe de División-</option>
                                @foreach ($jefesDivision as $div)
                                    <option 
                                    id="{{ $div->id }}" 
                                    value="{{ $div->rpe }}">{{ $div->rpe }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rpe_resg')
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
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                value = "{{$usera->paterno . " " . $usera->materno . ", " . $usera->nombre}}"
                                disabled
                                />
                        </div>
                    </div>
            
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3  mt-2" >
                        <!--Division-->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Division:</label>
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                disabled 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"  
                                value = "{{$usera->getSubarea->area->division->division_nombre}}"
                                />
                        </div>
                        <!-- Area -->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Area:</label>
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                disabled 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"  
                                value = "{{$usera->getSubarea->area->area_nombre}}"
                                />
                        </div>
                    <!--Subarea -->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subarea:</label>
                            <input 
                                style="border-color: rgb(21 128 61);"  
                                disabled
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                value = "{{$usera->getSubarea->subarea_nombre}}"
                                />
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
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*Codigo SAP:</label>
                    <div class="grid grid-cols-1">
                        <input 
                            wire:model='sumitedCod'
                            name="clase_activo" 
                            style="border-color: rgb(21 128 61);"
                            class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen"
                            required
                        />
                        @error('clase_activo')
                        <p class=" text-red-500 text-sm p-2 text-center "> {{$message}} </p>
                        @enderror
                    </div>
                </div>
                <!-- Info clasificacion -->
                    <div class="grid grid-cols-1 col-span-2 items-center">
                        @if(!is_null($claseAct))
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clase:</label>
                            <input 
                                style="border-color: rgb(21 128 61);" 
                                class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                value = "{{$claseAct->Nombre}}"
                                disabled
                                />
                            @else
                                <h2 class="font-semibold text-l text-gray-400 justify-self-center ">Clase no encontrada</h2>
                            @endif
                    </div>
        </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-0" wire:ignore>
                <!--fecha de creación -->  
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de creación:</label>
                    <input 
                        name="fecha_cre" 
                        style="border-color: rgb(21 128 61);"
                        class=" py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                        type="text" disabled value=<?php $hoy=date("d/m/Y"); echo $hoy;?> required />
                </div>
                <!--fecha de adquisición -->  
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Fecha de adquisición:</label>
                        @error('fecha_adq') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="fecha_adq" 
                        style="border-color: rgb(21 128 61);" 
                        type="date"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        value="{{old('fecha_adq')}}"
                        required/>
                </div>  
            </div>
            <div class="grid grid-cols-1 gap-5 md:gap-8 md:grid-cols-3 mt-2 ">    
                <!-- División -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *División:</label>
                        @error('division') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <select 
                        wire:model='selectedDivision' 
                        name="division" 
                        id="divisionSelect"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required 
                        @cannot('resguardos.mostrar.todos') 
                            disabled
                        @endcannot
                        > <!--Si el usuario no tiene permiso de cambiar la division -->
                        <option value="">-Seleccione División-</option>
                        @foreach ($division as $div)
                            <option 
                            id="{{ $div->id }}" 
                            value="{{ $div->division_clave }}">{{ $div->division_nombre }}
                            </option>
                        @endforeach
                    </select>
                    @cannot('resguardos.mostrar.todos') 
                        <input name="division" value={{$selectedDivision}} hidden>
                    @endcannot
                </div>
                <!-- Area -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *ÁREA:</label>
                        @error('area') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <select 
                        wire:model='selectedArea' 
                        name="area" 
                        id="areaSelect"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required 
                        @cannot('resguardos.mostrar.division') 
                            disabled
                        @endcannot
                        >
                        <option value="">-Seleccione área-</option>
                    @if($division->count()>0)
                        @foreach ($areas as $area)
                            <option 
                            id="{{ $area->id }}"
                            value="{{ $area->area_clave }}">{{ $area->area_nombre }}
                            </option>
                        @endforeach
                    @endif
                    </select>
                    @cannot('resguardos.mostrar.division') 
                        <input name="area" value={{$selectedArea}} hidden>
                    @endcannot
                </div>
                <!-- Subarea -->
                    <div class="grid grid-cols-1">
                        <div class="grid grid-cols-2}">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                                *SUB ÁREA:</label>
                            @error('subarea') <!-- Mensaje de error -->
                                <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                            @enderror
                        </div> 
                        <select 
                            wire:model='selectedSubarea' 
                            name="subarea"
                            class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required>
                                <option value="">-Seleccione sub área-</option>
                            @if($areas->count()>0 && !is_null($selectedDivision) && !is_null($selectedArea))
                                @foreach ($subareas as $subarea)
                                    <option 
                                    id="{{ $subarea->id }}" 
                                    value="{{ $subarea->subarea_clave }}">{{ $subarea->subarea_nombre }}
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
                            *Descripcion:</label>
                        @error('descripcion') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="descripcion" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        value="{{old('descripcion')}}"
                        required
                        /> <!-- required -->
                </div>
                <!-- Marca -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Marca:</label>
                        @error('marca') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="marca" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        value="{{old('marca')}}"/>
                </div>
                <!-- Modelo -->
                <div class="grid grid-cols-1" >
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Modelo:</label>
                        @error('modelo') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="modelo" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('modelo')}}"/>
                </div>
                <!-- N° de Serie -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *N° de Serie:</label>
                        @error('n_serie') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="n_serie" 
                        style="border-color: rgb(21 128 61);" 
                        id="noSerie"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('n_serie')}}"
                        required/> <!--type="number" min="0" -->
                </div>
                <!-- Cantidad -->
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Cantidad:</label>
                        @error('cantidad') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="cantidad" 
                        style="border-color: rgb(21 128 61);" 
                        id= "cant" 
                        type="number" 
                        min="1" 
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('cantidad')}}"
                        required
                        /> 
                </div>
                <!--N° provedor: -->  
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Numero provedor:</label>
                        @error('n_proveedor') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="n_proveedor" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('n_proveedor')}}"
                        /> <!-- min="1" type="number" -->
                    </select>
                </div>
                <!-- Precio: -->   
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2}">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Precio:</label>
                        @error('precio') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="precio"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('precio')}}"
                        required
                        /> <!-- min="0" required -->
                    </select>
                </div>
                <!--N° de Factura: -->  
                <div class="grid grid-cols-1 ">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *N° de Factura:</label>
                        @error('n_factura') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="n_factura" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('n_factura')}}"
                        required
                        /> <!-- min="1" type="number" -->
                    </select>
                </div>
                <!--Razon o Denominación Social -->  
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Razon o Denominación Social:</label>
                        @error('razon') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="razon" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        value="{{old('razon')}}"
                        required
                        /> <!-- required --> 
                </div>
                <!--Obeservaciones -->  
                <div class="grid grid-cols-1 md:col-span-2">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Observaciones:</label>
                        @error('observacion') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="observacion" 
                        style="border-color: rgb(21 128 61);" 
                        type="textarea"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        value="{{old('observacion')}}"/>
                </div>
                <!-- Costo de activo: -->   
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Costo de activo:</label>
                        @error('costo') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="costo"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        value="{{old('costo')}}"
                        /> <!-- min="0" required -->
                    </select>
                </div>
                <!--Factura -->  
                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            *Subir factura (Formato PDF):</label>
                        @error('factura') <!-- Mensaje de error -->
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                    </div> 
                    <input 
                        name="factura" 
                        style="border-color: rgb(21 128 61);"
                        class="py-2 px-3 rounded-lg border-2 border-green-600 mt-2 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent" 
                        type="file"
                        value="{{old('factura')}}"
                        required/>
                </div>
            </div>
            <!--Fotografias-->
                    <div class="grid grid-cols-1 md:grid-cols-2 mt-5 mx-7" wire:ignore>
                        <!--Foto activo 1 -->
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*Foto activos 1 (.png .jpg .jpeg)</label>
                                    <img id="imagenSeleccionada1" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;"  class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                                    <input name="photo_act1" id="imagen" type='file' class='mt-3' required/>
                                    @error('photo_act1') <!-- Mensaje de error -->
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                                </div>
                            </label>
                        </div>  
                        <!--Foto activo 2 -->
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto activos 2 (.png .jpg .jpeg)</label>
                                <img id="imagenSeleccionada2" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;"  class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                                </p>
                                
                                <input name="photo_act2" id="imagen2" type='file' class='mt-3'/>
                                @error('photo_act2') <!-- Mensaje de error -->
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                                </div>
                            </label>
                        </div> 
                        <!--Foto activo 3 -->
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto activos 3 (.png .jpg .jpeg)</label>
                                <img id="imagenSeleccionada3" style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;"  class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                                </p>
                                
                                <input name="photo_act3" id="imagen3" type='file' class='mt-3'/>
                                @error('photo_act3') <!-- Mensaje de error -->
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                                </div>
                            </label>
                        </div>
                        <!--Numero de serie-->
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col hover:bg-green-7000 hover:border-green-600 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*Foto Numero de Serie (.png .jpg .jpeg)</label>
                                <img id="imagenSeleccionada4"  style="max-height: 200px;max-width: 290px;min-height: 200px;min-width: 290px;"  class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent hover:bg-green-7000 hover:border-green-600">
                                </p>
                                
                                <input name="photo_n_fact" id="imagen4" type='file' class='mt-3 ' required/>
                                @error('photo_n_fact') <!-- Mensaje de error -->
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                                </div>
                            </label>
                        </div>           
                    </div>

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <a href="{{ url()->previous() }}"
                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
            <!-- botón enviar -->
            <form action="{{ route('resguardos.store') }}" method="POST" class="formEnviar w-auto bg-green-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                <button type="submit"
                    class="w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-7 py-2">Enviar</button>
                </form>
        </div>
    </form>
</div>