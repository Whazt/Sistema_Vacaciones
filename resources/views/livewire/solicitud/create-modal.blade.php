<div>
    <button wire:click="$set('open','true')" type="button" class=" overflow-hidden whitespace-nowrap text-ellipsis ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Nueva Solicitud
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nueva Solicitud
        </x-slot>
        <x-slot name="content">
            {{-- @if(!(auth()->user()->hasRole("Empleado") || (auth()->user()->hasRole("Jefe"))))
                <div class="mb-5">
                    <label for="empleados" class="block mb-2 text-sm font-medium text-gray-900 ">Empleado</label>
                    <select id="empleados" wire:model.live="id_empleado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required>
                        <option value="">Empleado</option>
                        @foreach($empleados as $item)
                            <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                        @endforeach
                    s</select>
                    @error('id_empleado')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                    @enderror
                </div>  
            @endif --}}
            
            @if( $showSelect )
            <div class="mb-5">
                <label for="empleados" class="block mb-2 text-sm font-medium text-gray-900">Empleado</label>
                <select id="empleados" wire:model.live="id_empleado" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                        required>
                    <option value="">Empleado</option>
                    @foreach($empleados as $item)
                        <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                    @endforeach
                </select>
                @error('id_empleado')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>
            @endif

            
            
            <div class="mb-5">
                <p> {{ $dias_disponibles }} días disponibles</p>
            </div>

            @error('id_empleado')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
            @enderror

            <div class="mb-5">
                <label for="fechainicio" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Inicio</label>
                <input wire:model="fecha_inicio" type="date" id="fechainicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('fecha_inicio')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>

            <div class="mb-5">
                <label for="fechafin" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Fin</label>
                <input wire:model="fecha_fin" type="date" id="fechafin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
               @error('fecha_fin')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>

            @if(!(auth()->user()->hasRole("Empleado") || (auth()->user()->hasRole("Jefe"))))
                <div class="mb-5">
                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 ">Estado</label>
                    <select id="estado" wire:model="estado"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                        <option value="pendiente">Pendiente</option>
                        <option value="Aprobado">Aprobado</option>
                        <option value="Rechazado">Rechazado</option>
                    
                    </select>
                </div>
            @endif
            <div class="mb-5">
                <label for="detalle" class="block mb-2 text-sm font-medium text-gray-900 ">Detalles</label>
                <textarea wire:model="detalles" type="text" id="detalle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required ></textarea>
                @error('detalles')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div> 
        </x-slot>
        
        <x-slot name="footer">
            <button wire:click="cancelar"  class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                Cancelar
            </button>
            <button wire:click="store"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                Guardar
            </button>
        </x-slot>

    </x-dialog-modal>
</div>