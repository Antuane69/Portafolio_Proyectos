<div class="py-6">
    <div class="mt-2 px-4 py-3 ml-11 mb-6 leading-normal text-green-500 rounded-lg" role="alert">
        <div class="text-left">
            <a href="{{ route('inventarios.inicio') }}"
                class='w-auto bg-green-500 hover:bg-green-600 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
            </a>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-2">
            <select
                wire:model='selectedArea' 
                name="area" 
                id="areaSelect"
                class="py-2 px-3 w-96 rounded-lg border-2 border-green-600 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                @foreach ($areas as $area)
                    <option 
                    id="{{ $area->id }}"
                    value="{{ $area->area_clave }}">{{ $area->area_nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table id="data-table"
                class="table table-striped table-bordered shadow-lg table-fixed w-full  translate-table">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border px-4 py-2">ALMACEN</th>
                        <th class="border px-4 py-2">ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $almacen)
                        <tr>
                            <td>{{ $almacen->almacen_nombre }}</td>
                            <td class="border px-4 py-2">
                                <label class="switch">
                                    @if ($almacen->habilitado)
                                        <input value='$almacen->id'
                                            wire:change="update({{ $almacen->id }})" type="checkbox" checked>
                                    @else
                                        <input value='$almacen->id' wire:change="update({{ $almacen->id }})"
                                            type="checkbox" uncheked>
                                    @endif
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
