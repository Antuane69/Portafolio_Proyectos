<div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                        <div class="flex items-center">
                            Centro de trabajo
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1.5 text-gray-700"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                        <div class="flex items-center">
                            Realizadas
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1.5 text-gray-700"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                        <div class="flex items-center">
                            Esperadas
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1.5 text-gray-700"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($rijsTabla as $rijsTabla)
                    <tr>
                        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $rijsTabla['subarea'] }}
                        </td>
                        <td class="p-4 text-gray-700 whitespace-nowrap">
                            @if ($rijsTabla['realizadas'] >= $rijsTabla['esperadas'])
                                <strong class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">
                                    {{ $rijsTabla['realizadas'] }}
                                </strong>
                            @else
                                <strong class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">
                                    {{ $rijsTabla['realizadas'] }}
                                </strong>
                            @endif
                                
                        </td>
                        <td class="p-4 text-gray-700 whitespace-nowrap">
                            {{ $rijsTabla['esperadas'] }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
