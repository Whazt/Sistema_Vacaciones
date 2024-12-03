<div>
    <div class="bg-slate-100 min-h-full">
        @can('crear-Empleados')
          @livewire('empleado.create-modal')
        @endcan

        {{-- carga de registros  --}}
        <section class="container ">

            <div class="flex flex-col mt-6">
                <div class=" -my-2 overflow-x-auto  ">
                    <div class="lg:mx-[1%] md:mx-[1%] inline-block min-w-[98%] py-2 align-middle md:px-2 lg:px-2">	
                        <div class="overflow-hidden border border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y  divide-gray-700">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-x-3">
                                                {{-- <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700"> --}}
                                                <span>Id</span>
                                            </div>
                                        </th>
        
                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Nombre</span>
        
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                    <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                    <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </svg>
                                            </button>
                                        </th>
        
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Correo</span>
        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Cargo</span>
        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Fecha Ingreso</span>
        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Días Disponibles</span>
        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                </svg>
                                            </button>
                                        </th>
        
                                        @can('editar-Empleados')
                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 ">
                                    @foreach($empleados as $item)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                                    {{-- <input type="checkbox" class="text-blue-500 border-gray-300 rounded "> --}}
            
                                                    <div class="flex items-center gap-x-2">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800 ">{{$item->id}}</h2>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-2 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 ">
            
                                                    <h2 class="text-sm font-normal ">{{$item->nombres}} {{$item->apellidos}}</h2>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full  ">
            
                                                    <h2 class="text-sm font-normal ">{{$item->correo}}</h2>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
            
                                                    <h2 class="text-sm font-normal ">{{optional($item->cargo)->nombre ?? 'No Asignado'}}</h2>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
            
                                                    <h2 class="text-sm font-normal ">{{$item->fecha_ingreso}}</h2>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
            
                                                    <h2 class="text-sm font-normal ">{{$item->dias_disponibles}}</h2>
                                                </div>
                                            </td>
                                            @can('editar-Empleados')
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                    <button wire:click="edit({{ $item->id }})" class="text-gray-500 transition-colors duration-200  hover:text-yellow-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>  
                                                    <button wire:click="delete({{ $item->id }})" class="text-gray-500 transition-colors duration-200  hover:text-red-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
          
        </section>
        <footer>
            <div> 
                {{$empleados->links()}} 
            </div>
        </footer>
    </div>

    {{-- modal de edicion --}}
    <x-dialog-modal wire:model="open_edit" wire:click.away="cancelar">
        <x-slot name="title">
           
            Editar Empleado
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
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 ">Télefono</label>
                <input wire:model="telefono" type="number" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required />
                @error('telefono')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>

            
            <div class="mb-5">
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">Área</label>
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
                    @foreach($cargos_por_area as $cargo)
                        <option value="{{ $cargo->id }}" >{{ $cargo->nombre }}</option>
                    @endforeach
                </select>
                <p> {{$id_cargo}} </p>
                @error('id_cargo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Jefe Inmediato</label>
                <select id="area" wire:model="id_jefe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Jefe Inmediato</option>
                    @foreach($jefes as $item)
                        <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                    @endforeach
                </select>
                <p> {{$id_jefe}} </p>
                @error('id_jefe')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
                
            </div>
           
        </x-slot>
        <x-slot name="footer">
            <button wire:click="cancelar"  class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                Cancelar
            </button>
            <button wire:click="update"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                Guardar
            </button>
        </x-slot>

    </x-dialog-modal>
    
</div>
 