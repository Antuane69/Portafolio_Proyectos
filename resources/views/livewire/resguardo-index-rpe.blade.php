<div>
    <div class="mt-4 px-4 py-3 ml-11 leading-normal text-green-500 rounded-lg" role="alert">
        <div class="text-left">
            <a href="{{ route('resguardos.inicio') }}"
                class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
            </a>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-5"
        style="width:95%; margin-top: 22px; margin-bottom: 5em; margin-right:auto; margin-left:auto ">
        <div class="grid grid-cols-2 gap-5 md:gap-8 mt-2">
            <div>
            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold">RPE del resguardador: </label>
            <input wire:model="rpeSelected" style="border-color: rgb(21 128 61);"
            class="form-control pb-2 px-3 rounded-lg border-2 border-green-600 my-1 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent">
            </div>
        </div>
        <table id="data-table" class="stripe hover translate-table"
            style="width:100%; padding-top: 1em; padding-bottom: 1em;" >
            <thead class="text-white">
                <tr class="bg-gray-800 text-white uppercase">
                    <th>NO. ACTIVO</th>
                    <!--<th>FECHA CREACIÓN</th>-->
                    <th>DESCRIPCIÓN</th>
                    <th>RESGUARDADOR</th>
                    <!--<th>AREA</th>-->
                    <th>ZONA</th>
                    <th>PRECIO</th>
                    <th>STATUS</th>
                    <th>ACCIONES</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($resguardosT as $resguardo)
                    <tr data-id="{{ $resguardo->n_factura }}">
                        <td>{{ $resguardo->n_activo }}</td>
                        <!--<td>{ { $resguardo->fecha_cre }}</td>-->
                        <td class="uppercase">{{ $resguardo->descripcion }}</td>
                        @if($resguardo->rpe_resg == null)
                            <td class="uppercase">N/A</td>
                        @else
                            <?php
                            $user = App\Models\Datosuser::whereRpe($resguardo->rpe_resg)->first();
                                    if($user != null){
					$nombre = $user->paterno . " " . $user->materno . ", " . $user->nombre;
				    }
				    else{
					$nombre = "Desconocido - ". $inventario->rpe;
				    }

                            ?>
                            <td class="uppercase">{{$nombre}}</td>
                        @endif
                        <!--td class="uppercase">{ {$resguardo->area}}</td>-->
                        <td class="uppercase">{{App\Models\Area::where('area_clave',$resguardo->area)->first()->area_nombre}}</td>
                        <td>${{ $resguardo->precio }}</td>
                        <td>{{ App\Models\status::where('codigo', $resguardo->status)->first()->nombre}}</td>
                        <td class="border-l px-1 py-2">
                            <div class="flex justify-center rounded-lg text-small" role="group">
                                <!--  botón detalles -->
                                <a href="{{ route('resguardos.ver', $resguardo->id) }}" style="text-decoration:none;"
                                class="rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 mx-2 ml-2">Ver</a>
                                <!-- botón descargar pdf  -->
                                <a href="{{ route('resguardos.ver.generarpdf', $resguardo->id) }}" style="text-decoration:none;"
                                class="rounded bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-2.5 mx-2 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg></a>

                                <!--  botón editar -->
                                @can('resguardos.modificar')
                                @if($resguardo->status != 14)
                                    <a href="{{ route('resguardos.modificar', $resguardo->id) }}" style="text-decoration:none;"
                                        class="rounded bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-2 mx-2 ml-2">Editar</a>
                                @endif
                                @endcan
                                    <!-- botón borrar  -->
                                @can('resguardos.delete')
                                <form action="{{  route('resguardos.delete', $resguardo->id) }}"
                                    class="rounded formEliminar bg-red-600 hover:bg-red-700 ml-2">
                                    <button type="submit"
                                        class="rounded text-white font-bold py-2 px-1 mx-2 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        <div class="grid place-content-end mt-5 mb-3">
            <a type="button" href="{{ route('resguardos.create') }}"
                class="bg-blue-600 px-12 py-2 rounded text-white font-semibold hover:bg-blue-700 transition duration-200 each-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="20" height="20"
                viewBox="0 0 30 30"
                class="h-5 w-5 inline-flex"
                style=" fill:#ffffff;">    <path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M21,16h-5v5 c0,0.553-0.448,1-1,1s-1-0.447-1-1v-5H9c-0.552,0-1-0.447-1-1s0.448-1,1-1h5V9c0-0.553,0.448-1,1-1s1,0.447,1,1v5h5 c0.552,0,1,0.447,1,1S21.552,16,21,16z"></path></svg>
                 Crear 
                </a>
                
        </div>
    </div>
</div>