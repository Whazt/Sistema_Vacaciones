<div>
    <div class="bg-slate-100 min-h-full">
        
        <div class="grid grid-cols-1 lg:grid-cols-5 md:grid-cols-3 items-center min-w-[98%] lg:mx-[1%] md:mx-[1%] md:px-2 lg:px-2 ">
            <div class= "col-span-1 ">
                @livewire('solicitud.create-modal')
            </div>
            <div class="col-span-1 lg:col-span-4 md:col-span-2">
                <input 
                placeholder="Buscar..." 
                wire:model.live="search" 
                class=" w-full rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>            
        </div>
        {{-- carga de registros  --}}
        @if($solicitudes && count($solicitudes) > 0)
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
                                                    <span>Fecha Inicio</span>
    
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                    </svg>
                                                </button>
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Fecha Fin</span>
    
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                    </svg>
                                                </button>
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Detalles</span>
    
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                    </svg>
                                                </button>
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Estado</span>
    
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                    </svg>
                                                </button>
                                            </th>
    
                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        @foreach($solicitudes as $item)
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
    
                                                        <h2 class="text-sm font-normal ">{{$item->empleado->nombres}} {{$item->empleado->apellidos}}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full  ">
    
                                                        <h2 class="text-sm font-normal ">{{$item->fecha_inicio}}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
    
                                                        <h2 class="text-sm font-normal ">{{$item->fecha_fin}}</h2>
                                                    </div>
                                                </td>
    
                                                <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
    
                                                        <h2 class="text-sm font-normal ">{{$item->detalles}}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-1 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2  ">
    
                                                        <h2 class="text-sm font-normal ">{{$item->estado}}</h2>
                                                    </div>
                                                </td>
    
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">
                                                        @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('RH'))
                                                            <button wire:click="edit({{ $item->id }})" class="text-gray-500 transition-colors duration-200  hover:text-yellow-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="confirmDelete({{ $item->id }})" class=" text-gray-500 transition-colors duration-200  hover:text-red-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                            @if($item->aprobacion_jefe == null && $item->aprobacion_rh ==null && $item->estado == 'Pendiente')
                                                                <button wire:click="edit({{ $item->id }})" class="text-gray-500 transition-colors duration-200  hover:text-yellow-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                </button>
                                                                <button onclick="confirmDelete({{ $item->id }})" class=" text-gray-500 transition-colors duration-200  hover:text-red-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                        @endif

                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    
            </section>

            <footer class="mx-5 mt-2">
                <div> 
                    {{$solicitudes->links()}} 
                </div>
            </footer>
        @else
        
            <h1 class="text-center text-3xl font-bold text-gray-800">No hay Solicitudes</h1>
        @endif
        

    </div>

    {{-- modal de edicion --}}
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Crear Nueva Solicitud
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="empleados" class="block mb-2 text-sm font-medium text-gray-900 ">Empleado</label>
                <select id="empleados" wire:model="id_empleado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Empleado</option>
                    @foreach($empleados as $item)
                        <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                    @endforeach
                </select>
                @error('id_empleado')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div>
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
            <div class="mb-5">
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 ">Estado</label>
                <select id="estado" wire:model="estado"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value="">Selecciona un Estado</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aprobada">Aprobada</option>
                    <option value="Rechazado">Rechazado</option>
                    @error('estado')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                    @enderror
                </select>
            </div>
            <div class="mb-5">
                <label for="detalle" class="block mb-2 text-sm font-medium text-gray-900 ">Detalles</label>
                <textarea wire:model="detalles" type="text" id="detalle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required ></textarea>
                @error('detalles')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>                    
                @enderror
            </div> 
           
        </x-slot>
        <x-slot name="footer">
            <button wire:click="cancelar"  class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Cancelar
            </button>
            <button wire:click="update"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Guardar
            </button>
        </x-slot>

    </x-dialog-modal>

</div>


