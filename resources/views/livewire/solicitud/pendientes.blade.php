<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @if($solicitudes && count($solicitudes) > 0)
        <!-- Loop de las para mostrar las Cards con las Vacaciones (solicitudes aprobadas) -->
        @foreach($solicitudes as $item)
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
            <div class="px-6 py-4">
                <!-- Nombre del empleado -->
                <div class="font-bold text-xl mb-2">Empleado: {{ $item->empleado->nombres }} {{ $item->empleado->apellidos }}</div>
                <!-- Fechas de inicio y fin -->
                <p class="text-gray-700 text-base">
                    <strong>Fecha de Inicio:</strong> {{$item->fecha_inicio}}
                </p>
                <p class="text-gray-700 text-base mb-2">
                    <strong>Fecha de Fin:</strong> {{$item->fecha_fin}}
                </p>
                <!-- Días de vacaciones -->
                <p class="text-gray-700 text-base mb-2">
                    <strong>Días de Vacaciones:</strong> 
                </p>
                <!-- Detalles de la solicitud -->
                <p class="text-gray-700 text-base mb-2">
                    <strong>Detalles:</strong> {{$item->detalles}}
                </p>
                <!-- Estado de la solicitud -->
                <p class="text-gray-700 text-base mb-4">
                    <strong>Estado:</strong>
                    <span class="text-green-500 font-semibold">{{$item->estado}}</span>
                </p>
                <div class="flex ">
                    @if(auth()->user()->hasRole("Jefe"))
                        @if( empty($item->aprobacion_jefe))
                            <button wire:click="aprobar({{$item->id}})" class="mx-2 bg-blue-600 p-2 text-white rounded-md">
                                Aprobar
                            </button>
                            <button wire:click="rechazar({{$item->id}})" class="mx-2 bg-red-600 p-2 text-white rounded-md ">
                                Rechazar
                            </button>
                        @endif
                    @elseif(auth()->user()->hasRole("RH"))
                        @if( empty($item->aprobacion_rh))
                            <button wire:click="aprobar({{$item->id}})" class="mx-2 bg-blue-600 p-2 text-white rounded-md">
                                Aprobar
                            </button>
                            <button wire:click="rechazar({{$item->id}})" class="mx-2 bg-red-600 p-2 text-white rounded-md ">
                                Rechazar
                            </button>
                        @endif
                    @endif                  
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h1 class="text-center col-span-full text-3xl font-bold text-gray-800">No Hay Vacaciones Para Mostrar</h1>
    @endif
</div>