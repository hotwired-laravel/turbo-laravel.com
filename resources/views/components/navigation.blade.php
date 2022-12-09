<div class="max-w-7xl mx-auto w-full font-sans px-5 lg:px-20">
    <nav class="hidden md:flex items-center justify-between">
        <!-- Left Side -->
        <ul class="flex items-center space-x-4">
            <li>
                <a href="/" class="font-semibold text-2xl flex items-center space-x-2">
                    <img class="w-12 h-12" src="{{ asset('/images/nav-logo.png') }}" alt="Nav Logo" />
                    <span>{{ __('Turbo Laravel') }}</span>
                </a>
            </li>
        </ul>

        <!-- Right Side -->
        <ul class="flex items-center space-x-8">
            <li><a href="https://bootcamp.turbo-laravel.com" class="font-mono font-semibold transition transform hover:underline underline-offset-4">{{ __('Bootcamp') }}</a></li>
            <li><a href="https://github.com/tonysm/turbo-laravel" class="font-mono font-semibold transition transform hover:underline underline-offset-4">{{ __('GitHub') }}</a></li>
            <li>
                <form action="">
                    <x-inputs.text type="search" placeholder="Search..." name="search" class="w-50 focus:w-60" />
                </form>
            </li>
        </ul>
    </nav>

    <nav class="md:hidden" data-controller="dropdown" data-dropdown-css-class="hidden">
        <div class="relative">
            <ul class="flex items-center justify-between">
                <li><a href="/" class="font-bold">Turbo Laravel</a></li>
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

                <div data-nav-highlight-target="nav" data-action="click->dropdown#close" class="flex flex-col mt-5 pt-5 border-t border-gray-100 space-y-2 prose prose-a:font-light prose-a:no-underline [&_a:hover]:underline prose-a:underline-offset-2 [&>ul]:px-0 [&>ul]:font-semibold [&_a.active]:!font-medium [&_a.active]:text-blue-600 [&_a.active]:underline prose-ul:list-none [&>ul]:px-0">
                    @yield('mobileIndex', $mobileIndex ?? '')
                </div>
            </div>
        </div>
    </nav>
</div>
