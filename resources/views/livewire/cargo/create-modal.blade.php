<div>
    <button wire:click="$set('open','true')" type="button" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Crear Cargo
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nuevo Cargo
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
                <input wire:model="nombre" type="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('nombre')
                    <x-input-error :message="$errors->first('nombre')" />
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripción</label>
                <textarea wire:model="descripcion" type="descripcion" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required /></textarea>
                @error('descripcion')
                    <x-input-error :message="$errors->first('descripcion')" />
                @enderror
            </div>
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Área</label>
                <select id="area" wire:model="id_area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Selecciona un área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
                @error('id_area')
                    <x-input-error :message="$errors->first('id_area')" />
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
