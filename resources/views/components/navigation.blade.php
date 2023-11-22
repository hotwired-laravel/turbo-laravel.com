<div class="w-full px-5 mx-auto font-sans max-w-7xl lg:px-20" data-controller="dropdown" data-dropdown-css-class="hidden">
    <nav>
        <div class="flex items-center justify-between">
            <!-- Left Side -->
            <ul class="flex items-center space-x-4">
                <li>
                    <a href="/" class="flex items-center space-x-2 text-2xl font-semibold">
                        <span>{{ __('Turbo Laravel') }}</span>
                    </a>
                </li>
            </ul>
            <!-- Right Side -->
            <ul class="flex items-center space-x-4 sm:space-x-8">
                <li class="hidden md:block"><a href="{{ route('docs.index') }}" class="transition transform hover:underline underline-offset-4">{{ __('Documentation') }}</a></li>
                <li class="hidden md:block"><a href="{{ route('guides.index') }}" class="transition transform hover:underline underline-offset-4">{{ __('Guides') }}</a></li>
                <li class="hidden md:block"><a href="https://github.com/tonysm/turbo-laravel" class="transition transform hover:underline underline-offset-4">{{ __('GitHub') }}</a></li>
                <li><div data-turbo-permanent id="algolia-search"></div></li>
                <li class="md:hidden"><button data-action="click->dropdown#toggle"><x-icons.bars-3 /></button></li>
            </ul>
        </div>

        <div class="relative">
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
                <ul class="flex flex-col pt-5 mt-5 space-y-2 border-t border-gray-100">
                    <li><a href="{{ route('docs.index') }}">Documentation</a></li>
                    <li><a href="{{ route('guides.index') }}">Guides</a></li>
                    <li><a href="https://github.com/tonysm/turbo-laravel">GitHub</a></li>
                </ul>

                @if ($mobileIndex ?? false)
                <div data-nav-highlight-target="nav" data-action="click->dropdown#close" class="flex flex-col mt-5 pt-5 border-t border-gray-100 space-y-2 prose prose-a:font-light prose-a:no-underline [&_a:hover]:underline prose-a:underline-offset-2 [&>ul]:px-0 [&>ul]:font-semibold [&_a.active]:!font-medium [&_a.active]:text-blue-600 [&_a.active]:underline prose-ul:list-none [&>ul]:px-0">
                    @yield('mobileIndex', $mobileIndex)
                </div>
                @endif
            </div>
        </div>
    </nav>
</div>
