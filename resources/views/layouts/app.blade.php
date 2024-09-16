<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto min-h-12 sm:min-h-20 px-4 sm:px-6 lg:px-8 flex items-center gap-4 sm:gap-6 lg:gap-8">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-7 sm:h-9 w-auto fill-current text-gray-800" />
                    </a>
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    <div class="grow"></div>
                    <x-dropdown-menu>
                        @if (isset($menu))
                            {{ $menu }}
                        @endif
                    </x-dropdown-menu>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 pb-36">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
