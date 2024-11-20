<div>
    <button wire:click="$set('open','true')" type="button" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Nuevo Usuario
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Nueva Ususario
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres</label>
                <input wire:model="name" type="nombre" id="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 ">Correo</label>
                <input wire:model="email" type="email" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div> 

            <div class="mb-5">
                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 ">Empleado</label>
                <select id="roles" wire:model="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required>
                    <option value="Empleado">Empleado</option>
                    <option value="Admin">Admin</option>
                    <option value="Jefe">Jefe</option>
                    <option value="RH">Recursos Humanos</option>

                </select>
                @error('role')
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