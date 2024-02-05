<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row m-5">
                    <div class="relative mr-5">
                        <label class="block text-xs font-medium text-gray-500" for="email"> Division </label>
    
                        <select class="w-full p-3 mt-1 text-sm border-2 border-gray-200 rounded" wire:model="divisionSeleccionada">
                            @foreach ($divisiones as $division)
                                <option value="{{ $division->division_clave }}">{{ $division->division_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <label class="block text-xs font-medium text-gray-500" for="datepicker"> Fecha inicio </label>
    
                        <input class="w-full p-3 mt-1 text-sm border-2 border-gray-200 rounded"
                            type="text" id="datepicker" wire:model.lazy="fechaInicio"/>
                    </div>
                    <div class="relative ml-5">
                        <label class="block text-xs font-medium text-gray-500" for="datepicker1"> Fecha fin </label>
    
                        <input class="w-full p-3 mt-1 text-sm border-2 border-gray-200 rounded"
                            type="text" id="datepicker1" wire:model.lazy="fechaFin"/>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200" style="height: 48rem;">
                    <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
                </div>
            </div>
            @livewire('reporte-rij-area-tabla', ['rijsTabla' => $rijsTabla])
        </div>
    </div>
</div>
