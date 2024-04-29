<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QA HUB</title>
                <!-- Fonts -->
                <link rel="preconnect" href="https://fonts.bunny.net">
                <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
                <!-- Scripts -->
                @vite(['resources/css/app.css', 'resources/js/app.js'])
                @livewireStyles
    </head>
    <body class="font-sans antialiased bg-neutral-800">
        <main style="height: 100vh" class="h-full w-full flex justify-center items-center">
          <div style="max-width: 600px;" class="text-center w-full rounded mx-auto bg-white py-10">
            <h3 class="font-bold text-xl">Account Pending Approval</h3>
            <p>Please try logging in again soon to access your dashboard.</p>
          </div>
        </main>
        @livewireScripts
    </body>
</html>
