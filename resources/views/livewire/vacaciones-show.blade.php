
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if($vacaciones && count($vacaciones) > 0)
            <!-- Loop de las para mostrar las Cards con las Vacaciones (solicitudes aprobadas) -->
            @foreach($vacaciones as $solicitud)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <!-- Nombre del empleado -->
                    <div class="font-bold text-xl mb-2">Empleado: {{ $solicitud->empleado->nombres }} {{ $solicitud->empleado->apellidos }}</div>

                    <!-- Fechas de inicio y fin -->
                    <p class="text-gray-700 text-base">
                        <strong>Fecha de Inicio:</strong> {{$solicitud->fecha_inicio}}
                    </p>
                    <p class="text-gray-700 text-base mb-2">
                        <strong>Fecha de Fin:</strong> {{$solicitud->fecha_fin}}
                    </p>

                    <!-- Días de vacaciones -->
                    <p class="text-gray-700 text-base mb-2">
                        <strong>Días de Vacaciones:</strong> 10 días
                    </p>

                    <!-- Detalles de la solicitud -->
                    <p class="text-gray-700 text-base mb-2">
                        <strong>Detalles:</strong> {{$solicitud->detalles}}
                    </p>

                    <!-- Estado de la solicitud -->
                    <p class="text-gray-700 text-base mb-4">
                        <strong>Estado:</strong>
                        <span class="text-green-500 font-semibold">{{$solicitud->estado}}</span>
                    </p>
                </div>
            </div>
            @endforeach
        @else
            <h1 class="text-center col-span-full text-3xl font-bold text-gray-800">No Hay Vacaciones Para Mostrar</h1>
        @endif
    </div>

