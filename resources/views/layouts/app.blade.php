<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema de Vacaciones</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
 
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-slate-100">
        

        <div class=" min-w-full">
            @livewire('navegationv2')
           
            <x-header>
                {{$titulo}}
            </x-header>
            <!-- Page Content -->
            <main class="min-h-auto lg:ml-[14rem] md:ml-[14rem] ml-0  ">
                @livewire('sidebar')
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
