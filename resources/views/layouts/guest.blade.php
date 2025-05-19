<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QueikChat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="relative">
            <img class="w-20 h-20 rounded-full mx-auto z-10 relative"
                src="{{ asset('images/quick-chat-speedometer-logotype-theme-vector-8668912.jpg') }}" alt="Logo">

            <div
                class="absolute left-1/2 -translate-x-1/2 top-full w-0 h-0
                border-l-[12px] border-l-transparent
                border-r-[12px] border-r-transparent
                border-t-[12px] border-t-gray-800 dark:border-t-white">
            </div>
        </div>



        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
