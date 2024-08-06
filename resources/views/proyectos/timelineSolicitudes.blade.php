<style>
    .dropzone .dz-preview .btn-remove {
        position: absolute;
        top: -30px;
        right: 20px;
        background-color: rgba(255, 0, 0, 0.8);
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        z-index: 10;
        border-radius: 3px;
        margin-bottom: 15px;
    }
</style>

<x-appTimeline>
    @section('title', 'Pixel Perfect - Progreso de la Solicitud')
    <x-slot name="header">
        <div class="flex items-center text-center">
            <div class="text-left">
                <a href="{{route('dashboard')}}"
                class='w-auto rounded-lg shadow-xl font-medium text-white px-4 py-2 bg-green-700
                hover:bg-green-600'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
                Regresar
                </a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-6 mt-2 mr-2">
                {{ __('Progreso del Proyecto: ')}}
            </h2>
            <span style="margin-left:3px;margin-top:2px;font-size:20px;color:#246dc6;font-weight:800">{{$solicitud->nombre}}</span>
        </div>
    </x-slot>

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    @endsection

    <div class="pb-10">
        <x-card class="flex-[2] mb-0">
            <div class="flex justify-between items-center mb-4">
                <div style="margin-left:12%" class="text-center">
                    <span class="text-2xl font-semibold text-black">Fecha de Entrega:<span class="text-blue-800"> {{$solicitud->FechaEntrega}}</span></span>
                    <br>
                    <span class="text-2xl font-semibold text-black">Días Restantes:<span class="text-blue-800"> {{$solicitud->diasFaltantes}}</span></span>
                </div>
                <div class="w-1/2">
                    <div class="w-3/4" style="margin-left: 15%">
                        <div class="progress-container" style="height: 26px;border-radius:10px;border: 0.5px solid black">
                            <div class="progress-bar" style="width: {{$solicitud->ultimaEtapa->Clasificacion->numero_etapa * 14}}%;border-radius:10px;">
                                <span class="text-center content-center justify-center font-bold ml-12">{{$solicitud->ultimaEtapa->Clasificacion->numero_etapa * 14}}%</span>
                            </div>
                        </div>                                                                                                                             
                        <div class="description text-center content-center justify-center font-bold mt-1">Etapa: {{$solicitud->ultimaEtapa->Clasificacion->numero_etapa}}/7</div>
                    </div>
                </div>
            </div>
            <div class="my-3">
                @if (session()->has('success'))
                    <style>
                        .auto-fade {
                            animation: fadeOut 2s ease-in-out forwards;
                        }

                        @keyframes fadeOut {
                            0% {
                                opacity: 1;
                            }
                            90% {
                                opacity: 1;
                            }
                            100% {
                                opacity: 0;
                                display: none;
                            }
                        }
                    </style>
                    <div class="alert alert-success auto-fade px-2 inline-flex flex-row text-green-600" style="width:80%;margin-left:10%">
                        {{ session()->get('success') }}
                    </div> 
                @endif
            </div>
            <x-timeline.container>
                @foreach($solicitud->Etapas->reverse() as $etapa)
                    <x-timeline.item :estado="$etapa->estatus">
                        @csrf
                        <x-slot name="title">
                            {{$solicitud->nombre}}
                        </x-slot>
                        <x-slot name="date">
                            {{$etapa->fecha}}
                        </x-slot>
                        <x-slot name="duration">
                            {{$etapa->dias}}
                        </x-slot>
                        <div class="flex gap-3">
                            <div class="w-[50em] flex-1 mt-3">
                                <div class="border-t border-1 border-gray-700 mb-4" style="width: 100%;"></div>
                                <div class="text-m font-bold">Requerimientos</div>
                                <div class="font-thin">{{$solicitud->requerimientos}}</div>
                                <br>
                            </div>
                        </div>
                        <div class="text-m font-bold">Comentarios Sobre la Solicitud</div>
                        <div class="w-full h-[1px] bg-gray-300 rounded-full"></div>
                        <div class="mb-4">{{$etapa->comentarios}}</div>
                        <form action="{{ route('proyectos.update',$solicitud->id) }}" method="POST" class="mt-2" enctype="multipart/form-data">
                            @csrf
                            @if ($etapa->Clasificacion->numero_etapa >= 3)                                
                                <div class="text-m font-bold">Requerimientos Completados</div>
                                <div>
                                    <textarea name="requerimientos" style="height: 150px" required 
                                    class="w-full p-2 px-3 rounded-lg border-2 mt-1 mb-4 focus:outline-none focus:ring-2 focus:border-transparent"
                                    placeholder="Ingrese los requerimientos completados">{{ old('requerimientos') }}</textarea>
                                </div>
                                <div class="mb-3 mt-1">
                                    <div class="text-m font-bold">Adjuntar Evidencias</div>
                                    <div id="dropzone" class="dropzone rounded-lg focus:outline-none focus:ring-2 mb-1 focus:ring-green-500 border-green-600 focus:border-transparent border-2 mt-2"></div>
                                    <div id="archivos" style="width:90%;margin-top:4%;margin-left:4%;margin-bottom:10%">
                                        <p class="text-gray-800 text-center" style="font-weight:800;font-size:16px;">Adjuntados Correctamente:</p>
                                        <x-file-row id="spare-file-row" class="hidden" />
                                    </div>
                                </div>
                                <button class='shadow-xl px-4 py-2'
                                    style="color:#fff;font-weight:600;background-color:#15803d;transition: color 0.3s ease, background-color 0.3s ease;
                                    border-radius:10px;margin-left:56%" 
                                    onmouseover="this.style.backgroundColor='#06662a'; this.style.color='#ffffff';" 
                                    onmouseout="this.style.backgroundColor='#15803d'; this.style.color='#ffffff';" 
                                    type="submit" id="opcionesButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Siguiente Etapa {{$etapa->Clasificacion->numero_etapa}}/7
                                </button> 
                            @else
                                @if ($solicitud->ultimaEtapa->Clasificacion->numero_etapa == $etapa->numero_etapa)                                    
                                    <div class="text-m font-bold mb-2">Solicitar Información Adicional</div>
                                    <div>
                                        <textarea name="adicional" style="height: 150px" 
                                        class="w-full p-2 px-3 rounded-lg border-2 mt-1 mb-4 focus:outline-none focus:ring-2 focus:border-transparent"
                                        placeholder="Ingrese que otra información requiere (Opcional)">{{ old('adicional') }}</textarea>
                                    </div>
                                    <button class='shadow-xl px-4 py-2'
                                        style="color:#fff;font-weight:600;background-color:#15803d;transition: color 0.3s ease, background-color 0.3s ease;
                                        border-radius:10px;margin-left:56%" 
                                        onmouseover="this.style.backgroundColor='#06662a'; this.style.color='#ffffff';" 
                                        onmouseout="this.style.backgroundColor='#15803d'; this.style.color='#ffffff';" 
                                        type="submit" id="opcionesButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Siguiente Etapa {{$etapa->Clasificacion->numero_etapa}}/7
                                    </button> 
                                @else
                                    <div class="text-m font-bold mb-2">Información Adicional Solicitada</div>
                                    <div class="w-full h-[1px] bg-gray-300 rounded-full"></div>
                                    <div class="mb-4">{{$solicitud->ultimaEtapa->comentarios}}</div>
                                @endif
                            @endif
                        </form>
                    </x-timeline.item>
                @endforeach
                <x-timeline.item :estado="'Creada'">
                    <x-slot name="duration">
                        {{$solicitud->dias}}
                    </x-slot>
                    <x-slot name="title">
                        Solicitud Creada
                    </x-slot>
                    <x-slot name="date">
                        {{$solicitud->created_at->format('d/m/Y')}}
                    </x-slot>
                    <div class="mb-4 text-sm font-thin text-gray-400">Solicitante: {{$solicitud->nombre_usuario}}</div>
                    <div class="border-t border-1 border-gray-700 mb-4" style="width: 100%;"></div>
                    <span style="font-weight: 800;">Archivos Adjuntos</span>
                    <div>
                        @if (isset($solicitud->Evidencias))                                           
                            <div id="{{ $solicitud->id ? 'archivos' : '' }}">
                                @foreach($solicitud->Evidencias as $archivo)
                                    <x-file-row url="{{ $archivo->url }}" nombre="{{ $archivo->nombre }}" id="evidencia-{{$archivo->id}}" on-remove="globals.dropzone.removeEvidencia('{{$archivo->id}}', '{{$archivo->remove}}')" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </x-timeline.item>
            </x-timeline.container>
        </x-card>
    </div>
</x-appTimeline>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('js/custom-dropzone.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
    const globals = {
        dropzone: new CustomDropzone({
            dropzoneSelector: 'div#dropzone',
            token: "{{ csrf_token() }}",
            url: "{{ route('upload',$solicitud->id) }}",
            spareId: 'div#spare-file-row',
            listId: 'archivos',
            dictDefaultMessage: 'Arrastre los archivos o haga click para subirlos',
            acceptedFiles: '.pdf,.xls,.doc,.docx,.jpg,.jpeg,.png'
        })
    };

    document.addEventListener('DOMContentLoaded', () => {
        globals.dropzone.init();
    })
</script>