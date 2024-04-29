<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <div class="border-2 border-black mb-8 p-6 rounded-full">
                        <svg width="48px" height="48px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000"><path d="M10.0503 10.6066L2.97923 17.6777C2.19818 18.4587 2.19818 19.7251 2.97923 20.5061V20.5061C3.76027 21.2872 5.0266 21.2872 5.80765 20.5061L12.8787 13.4351" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.1927 13.7994L21.071 17.6777C21.8521 18.4587 21.8521 19.7251 21.071 20.5061V20.5061C20.29 21.2872 19.0236 21.2872 18.2426 20.5061L12.0341 14.2977" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.73267 5.90381L4.61135 6.61092L2.49003 3.07539L3.90424 1.66117L7.43978 3.78249L6.73267 5.90381ZM6.73267 5.90381L9.5629 8.73404" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.0503 10.6066C9.2065 8.45359 9.37147 5.62861 11.111 3.8891C12.8505 2.14958 16.0607 1.76778 17.8285 2.82844L14.7878 5.86911L14.5052 8.98015L17.6162 8.69754L20.6569 5.65686C21.7176 7.42463 21.3358 10.6349 19.5963 12.3744C17.8567 14.1139 15.0318 14.2789 12.8788 13.435" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
