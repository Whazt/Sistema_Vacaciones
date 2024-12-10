<div>
    <button wire:click="$set('open','true')" type="button" class=" overflow-hidden whitespace-nowrap text-ellipsis ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Agregar Empleado
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <button wire:click="open = false" type="button" class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" x-description="Heroicon name: solid/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            Agregar Nuevo Empleado
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres</label>
                <input wire:model="nombres" type="nombre" id="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('nombres')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 ">Apellidos</label>
                <input wire:model="apellidos" type="nombre" id="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('apellidos')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 ">Correo</label>
                <input wire:model="correo" type="email" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('correo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de Ingreso</label>
                <input wire:model="fecha_ingreso" type="date" id="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('fecha_ingreso')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 ">Días de vacaciones usados</label>
                <input wire:model="dias_vacaciones_usados" type="number" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('dias_vacaciones_usados')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p> 
                @enderror
            </div>
            <div class="mb-5">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 ">Télefono</label>
                <input wire:model="telefono" type="number" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('telefono')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p> 
                @enderror
            </div>

            
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Área</label>
                <select id="area" wire:model="area_selected" wire:change="load_cargos()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Selecciona un Área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Cargo</label>
                <select id="area" wire:model="id_cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Selecciona un Cargo</option>
                    @foreach($cargos_por_area as $cargo_area)
                        <option value="{{ $cargo_area->id }}">{{ $cargo_area->nombre }}</option>
                    @endforeach
                </select>
                
                @error('id_cargo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                
            </div>
           
            <div class="mb-5" x-data="{ show: false }">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Jefe Inmediato</label>
                
                <!-- Input para búsqueda -->
                <input type="text" 
                       wire:model.live="searchEmp"
                       @focus="show = true"
                       @click.away="show = false"
                       @input="show = true"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Buscar jefe inmediato...">
            
                <!-- Select dinámico -->
                <div x-show="show" class="relative mt-2">
                    <ul class="absolute z-10 bg-white border border-gray-300 w-full rounded-lg shadow-lg">
                        @foreach($jefes as $item)
                            <li class="p-2 cursor-pointer hover:bg-gray-200" 
                                @click="$wire.set('id_jefe', '{{ $item->id }}'); $wire.set('searchEmp', '{{ $item->nombres }} {{ $item->apellidos }}'); show = false;">
                                {{ $item->nombres }} {{ $item->apellidos }}
                            </li>
                        @endforeach
                        @if($jefes->isEmpty())
                            <li class="p-2 text-gray-500">No se encontraron resultados</li>
                        @endif
                    </ul>
                </div>
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
