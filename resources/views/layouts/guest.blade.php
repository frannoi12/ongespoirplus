<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EspoirPlus') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

    <!-- Container principal avec une grille à deux colonnes -->

    <div class="min-h-screen grid-cols-1 md:grid-cols-2 bg-cover bg-center" style="background-image: url('{{ asset('images/hollywood-md.jpg') }}');">

    <!--div class="min-h-screen grid grid-cols-1 "-->

        <!-- Section de l'image -->
        {{-- <div class="hidden md:block">
            <img src="{{ asset('images/images.jpeg') }}" alt="Description de l'image" class="object-cover w-full h-full">
        </div> --}}

        <!-- Section du formulaire de connexion -->
        <div class="flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 bg-opacity-50 p-6">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
