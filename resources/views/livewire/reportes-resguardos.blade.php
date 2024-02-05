<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row m-5">
                    <div class="grid grid-cols-3 relative mr-5">
                        <div>
                            <label class="block text-m font-medium text-gray-600"> Division </label>
                            <select class="w-full p-3 mt-1 text-sm border-2 border-gray-200 rounded" wire:model="divisionSeleccionada" >
                                @foreach ($divisiones as $division)
                                    <option value={{$division->division_clave}}>{{ $division->division_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                        </div>
                        <div>
                            <label class="block text-m font-medium text-gray-600"> Status </label>
                            <select class="w-full p-3 mt-1 text-sm border-2 border-gray-200 rounded" wire:model="statusSeleccionado" >
                                <option value=0>Todos los Status</option>
                                @foreach ($status as $estado)
                                    <option value={{$estado->id}}>{{ $estado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200" style="height: 48rem;">
                    <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
                </div>
            </div>
        </div>
    </div>
</div>
