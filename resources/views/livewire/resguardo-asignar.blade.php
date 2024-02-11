<div>
    <form action="{{ route('resguardos.status.save', $resguardo->id) }}" method="POST" enctype="multipart/form-data" class="formEnviar">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 col-span-2 bg-green-600 rounded-t-xl mx-10 mt-10 px-10">
            <h2 class="font-semibold text-xl text-white justify-self-start mt-2 mb-2">Asignar status</h2>
        </div>
        <div class="mx-10 px-10 py-10 rounded-b-xl bg-gray-100 mb-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8">
                <!-- Status actual-->
                <div class="grid grid-cols-1 md:col-span-2">
                    <label class="lbl md:text-sm">Status Actual:</label>
                    <h2 class="inf">{{App\Models\Status::where('codigo', $resguardo->status)->first()->nombre}} - {{App\Models\Status::where('codigo', $resguardo->status)->first()->descripcion}}</h2>
                </div>
                @if($statusDisponibles->count()>0)
                <!--Status-->
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Seleccione status:</label>
                            <select
                            wire:model='selectedStatus'
                            name="status"
                            id="statusSelect"
                            class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required>
                                <option value="">-Seleccione Status-</option>
                                @foreach ( $statusDisponibles as $status)
                                    <option value="{{$status->codigo}}">{{$status->nombre}}</option> 
                                @endforeach
                            </select>
                        @error('status')
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror
                </div>

                <!-- Descripcion de Status -->
                <div class="grid grid-cols-1">
                    @if(!is_null($selectedStatus) && $selectedStatus != "")
                        <label class="lbl md:text-sm">Descripcion del Status Seleccionado:</label>                   
                        <h2 class="inf">{{$infoStatus->first()->descripcion}}</h2>
                    @endif 
                </div> 
                <!-- RPE de Resguardador Fisico -->
                @if($selectedStatus == '9')
                    <div class="grid grid-cols-1 md:col-span-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*RPE de Resguardador Fisico:</label>
                        <div class="grid grid-cols-2 md:grid-cols-4">
                            <div class="grid grid-cols-1">
                                <input 
                                    wire:model='sumitedRpe'
                                    name="nuevo_resg" 
                                    style="border-color: rgb(21 128 61);"
                                    class="form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparen"
                                    required
                                    value="{{old('rpe_resg')}}"/>
                            </div>
                        </div>  
                        @error('nuevo_resg')
                            <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                        @enderror          
                    </div>
                    <!-- Mostrar resguardador -->
                    @if (!is_null($user))
                        <div class="grid grid-cols-1 md:col-span-2">
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
                            <!-- Area -->
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2  mt-2" >
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Area:</label>
                                    <input 
                                        style="border-color: rgb(21 128 61);" 
                                        disabled 
                                        class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"  
                                        value = "{{App\Models\Area::where('area_clave', $user->area)->get()->first()->area_nombre}}"
                                        />
                                </div>
                            <!--Subarea -->
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subarea:</label>
                                    <input 
                                        style="border-color: rgb(21 128 61);"  
                                        disabled
                                        class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                        value = "{{App\Models\Subarea::where('subarea_clave', $user->subarea)->first()->subarea_nombre}}"
                                        />
                                </div>
                            </div>
                        </div>
                    @else
                        <h2 class="font-semibold text-l text-gray-400 justify-self-center md:col-span-2">Usuario no encontrado</h2>
                    @endif
                @elseif($selectedStatus == '13') <!--Si se solicita baja -->
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*Dictamen (PDF):</label>
                                <input 
                                    name = "dictamen"
                                    style="border-color: rgb(21 128 61);"  
                                    type="file"
                                    class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                    required
                                    />
                                @error('dictamen')
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">*Formato 13 (PDF):</label>
                                <input 
                                    name = "formato13"
                                    style="border-color: rgb(21 128 61);"  
                                    type="file"
                                    class="uppercase form-control py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent bg-gray-200"
                                    required
                                    />
                                @error('formato13')
                                    <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                                @enderror
                        </div>
                @endif
                <div class="grid grid-cols-1 md:col-span-2">
                <!--Comentario (Se muestra si se selecciono el estatus "Enviar de nuevo")-->
                    <div class="grid grid-cols-1 md:col-span-2">
                        <div class="grid grid-cols-2}">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                                Comentario:</label>
                            @error('comentario') <!-- Mensaje de error -->
                                <p class=" text-red-500 text-sm text-right "> {{$message}} </p>
                            @enderror
                        </div> 
                        <input 
                            name="comentario" maxlength="100"
                            style="border-color: rgb(21 128 61);"
                            class="py-2 px-3 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                            value="{{old('comentario')}}"
                            /> <!-- required -->
                    </div>
            </div>
            </div>
            <div class='flex items-center justify-end  md:gap-8 gap-4 pt-5'>
                <!-- botón enviar -->
                <form action="{{ route('resguardos.status.save', $resguardo->id) }}" method="POST" class="formEnviar w-auto bg-green-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                    <button type="submit"
                        class="w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-7 py-2">Enviar</button>
                    </form>
            </div>
            @else
                <h2 class="font-semibold text-l text-gray-400 justify-self-center md:col-span-2">No hay acciones dispoibles</h2>
            @endif
        </div>
    </form>
</div>
