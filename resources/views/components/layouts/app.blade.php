<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Style and Scripts -->
        @vite( ['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <livewire:styles />
    </head>
    <body class="bg-gray-100 dark:bg-gray-900">
        {{ $slot }}
        <livewire:scripts />
    </body>
</html>
