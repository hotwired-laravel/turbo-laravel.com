<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? __('Turbo Laravel'))</title>

    <link rel="stylesheet" href="{{ tailwindcss('css/app.css') }}" />

    <x-importmap-tags />
</head>
<body class="w-full min-h-screen antialiased bg-gray-100">
    <x-skip-to-main-content />

    <x-navigation />

    <x-main-content>
        @yield('content', $slot ?? '')
    </x-main-content>

    <x-footer />
</body>
</html>
