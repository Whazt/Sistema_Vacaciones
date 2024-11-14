<div>
    <button wire:click="$set('open','true')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Nueva Solicitud
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <button wire:click="open = false" type="button" class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" x-description="Heroicon name: solid/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            Crear Nueva Solicitud
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="empleados" class="block mb-2 text-sm font-medium text-gray-900 ">Empleado</label>
                <select id="empleados" wire:model="id_empleado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required>
                    <option value="">Empleado</option>
                    @foreach($empleados as $item)
                        <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="fechainicio" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Inicio</label>
                <input wire:model="fecha_inicio" type="date" id="fechainicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                
            </div>

            <div class="mb-5">
                <label for="fechafin" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Fin</label>
                <input wire:model="fecha_fin" type="date" id="fechafin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
               
            </div>
            <div class="mb-5">
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 ">Estado</label>
                <select id="estado" wire:model="estado"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Selecciona un Estado</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                 
                </select>
            </div>
            <div class="mb-5">
                <label for="detalle" class="block mb-2 text-sm font-medium text-gray-900 ">Detalles</label>
                <textarea wire:model="detalles" type="text" id="detalle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required ></textarea>
                
            </div> 
           
        </x-slot>
        <x-slot name="footer">
            <button wire:click="store"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </x-slot>

    </x-dialog-modal>
</div>