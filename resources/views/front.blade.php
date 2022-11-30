<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/front.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

</head>

<body class="relative h-fit" x-data="{ random: false }">
    <div x-show="random" class="fixed w-full h-full top-0 z-40  bg-black opacity-70 brightness-50 bg-blur">

    </div>
    @include('layouts.navbarsub.buzz')
    @include('layouts.navbar')
    <div class="font-sans text-gray-900">
        @yield('content')
    </div>
    @include('foot')




    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('status'))
                showToast("{{ session('status') }}")
            @endif


        })
    </script>
    @stack('script')
</body>

</html>
