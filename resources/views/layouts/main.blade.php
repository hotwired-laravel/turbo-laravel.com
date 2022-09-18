<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', $title ?? __('Turbo Laravel'))</title>

    <link rel="stylesheet" href="{{ tailwindcss('css/app.css') }}" />

    <x-importmap-tags />
</head>
<body class="antialiased">
    <div class="w-full min-h-screen bg-gray-50" data-controller="nav-highlight" data-nav-highlight-css-class="text-indigo-600">
        <x-skip-to-main-content />

        <header class="bg-white shadow-sm py-5">
            <x-navigation>
                <x-slot:mobileIndex>
                    @yield('mobileIndex', $mobileIndex ?? '')
                </x-slot>
            </x-navigation>
            @yield('afterHeader', $afterHeader ?? '')
        </header>

        @yield('content', $slot ?? '')

        <x-footer class="py-4 px-8 sm:px-20 bg-gray-600 text-white" />
    </div>
</body>
</html>
