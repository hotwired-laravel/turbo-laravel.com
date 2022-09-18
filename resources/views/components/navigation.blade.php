<div class="max-w-7xl mx-auto w-full font-sans px-5 lg:px-20">
    <nav class="hidden md:flex items-center justify-between">
        <!-- Left Side -->
        <ul class="flex items-center space-x-4">
            <li><a href="#home" class="font-semibold text-2xl">{{ __('Turbo Laravel') }}</a></li>
        </ul>

        <!-- Right Side -->
        <ul class="flex items-center space-x-5">
            <li>
                <form action="">
                    <x-inputs.text type="search" placeholder="Search..." name="search" class="w-40 focus:w-60" />
                </form>
            </li>
            <li><a href="https://github.com/tonysm/turbo-laravel" class="font-medium underline underline-offset-4">{{ __('GitHub') }}</a></li>
        </ul>
    </nav>

    <nav class="md:hidden" data-controller="dropdown" data-dropdown-css-class="hidden">
        <div class="relative">
            <ul class="flex items-center justify-between">
                <li><a href="#home" class="font-bold">Turbo Laravel</a></li>
                <li><button data-action="click->dropdown#toggle"><x-icons.bars-3 /></button></li>
            </ul>

            <div
                data-dropdown-target="content"
                class="hidden transition transform"
                data-transition-enter="transition ease-out duration-200"
                data-transition-enter-start="transform opacity-0 scale-95"
                data-transition-enter-end="transform opacity-100 scale-200"
                data-transition-leave="transition ease-in duration-75"
                data-transition-leave-start="transform opacity-100 scale-200"
                data-transition-leave-end="transform opacity-0 scale-95"
            >
                <ul class="flex flex-col mt-5 pt-5 border-t border-gray-100 space-y-2">
                    <li><a href="https://github.com/tonysm/turbo-laravel">GitHub</a></li>
                </ul>

                <div data-nav-highlight-target="nav" data-action="click->dropdown#close" class="flex flex-col mt-5 pt-5 border-t border-gray-100 space-y-2 prose [&>ul]:list-none [&>ul]:px-0">
                    @yield('mobileIndex', $mobileIndex ?? '')
                </div>
            </div>
        </div>
    </nav>
</div>
