<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Swaecc') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mt-5 bg-green-200">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center items-center ">
            <img src='/storage/fuoye.png' alt="fuoye_logo">
        </div>

        <div class="p-6 ">
            @auth
                <div class="grid mt-10 justify-center align-items-center cursor-pointer">
                    <a href="{{ route('dashboard') }}"
                        class="rounded-sm mt-2 text-gray-600 dark:text-white p-10 bg-green-600 text-white">
                        Dashboard
                    </a>
                </div>
            @else
                <div class="flex justify-evenly">
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-white bg-green-600 p-7 rounded-sm mt-2 cursor-pointer">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                        class="ml-4 text-sm text-white bg-green-600 p-7 rounded-sm mt-2 cursor-pointer">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>

</body>

</html>
