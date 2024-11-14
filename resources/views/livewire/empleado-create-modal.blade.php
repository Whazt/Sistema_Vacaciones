<div>
    <button wire:click="$set('open','true')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                
            </div>
            <div class="mb-5">
                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 ">Apellidos</label>
                <input wire:model="apellidos" type="nombre" id="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                
            </div>

            <div class="mb-5">
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 ">Correo</label>
                <input wire:model="correo" type="email" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
               
            </div>
            <div class="mb-5">
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de Ingreso</label>
                <input wire:model="fecha_ingreso" type="date" id="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                
            </div>
            <div class="mb-5">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 ">Télefono</label>
                <input wire:model="telefono" type="number" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                
            </div>

            
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Área</label>
                <select id="area" wire:model="area_selected" wire:change="loadCargosYEmpleados()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
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
                
            </div>
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Jefe Inmediato</label>
                <select id="area" wire:model="id_jefe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Jefe Inmediato</option>
                    @foreach($jefes as $item)
                        <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                    @endforeach
                </select>
                
            </div>
           
        </x-slot>
        <x-slot name="footer">
            <button wire:click="store"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </x-slot>

    </x-dialog-modal>
</div>
