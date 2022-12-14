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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class=" bg-gray-100">

        <div class="flex ">
            <div class="w-[30%] lg:w-[20%]">
                @include('layouts.sidebar')
            </div>

            <div class="w-full min-h-[100vh]">
                @include('layouts.navigation')
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>


    </div>

    <script>
          document.addEventListener('DOMContentLoaded', () => {
            @if (session('status'))
                showToast("{{ session('status') }}")
            @endif


        })
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @stack('script')

</body>

</html>
