
<x-app-layout>
    <x-slot name="titulo">
        Mis Solicitudes
    </x-slot>

    <x-slot name="slot">    
        @livewire('solicitud.show-mis-solicitudes')

        {{-- @livewire('solicitud.show-mis-solicitudes') --}}
    </x-slot>

</x-app-layout>

