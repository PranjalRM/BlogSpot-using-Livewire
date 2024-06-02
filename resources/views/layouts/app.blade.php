<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BlogSpot')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.6/tailwind.min.css">
    @livewireStyles
</head>
<body>
    <x-header></x-header>

   <main class="py-4">
            @yield('content')
    </main>
    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
