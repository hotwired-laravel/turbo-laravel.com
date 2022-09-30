@extends('layouts.main')

@section('mobileIndex')
    {!! $index ?? '' !!}
@stop

@section('content')
    <div class="max-w-7xl w-full mx-auto px-5 lg:px-20 my-10 space-y-6">
        <h1 class="text-center text-4xl md:text-8xl font-sans">Turbo Laravel</h1>
        <p class="text-xl text-center text-gray-900">An elegant way to combine <a href="https://hotwired.dev/" class="underline underline-offset-2 decoration-wavy font-semibold">Hotwire</a> and <a href="https://laravel.com/" class="underline underline-offset-2 decoration-wavy font-semibold">Laravel</a>.</p>
    </div>

    <div class="max-w-7xl w-full mx-auto px-5 md:px-20 mt-10 space-y-6">
        <blockquote class="relative py-4 pr-4 pl-4 sm:pl-14  text-2xl italic border-l-4 bg-neutral-100 text-neutral-600 border-neutral-500 quote">
            <div class="fancy-quote-mark" aria-hidden="true">
                &ldquo;
            </div>
            <p class="mb-4 text-gray-900 text-xl sm:text-3xl">Hotwire is an alternative approach to building modern web applications without using much JavaScript by sending HTML instead of JSON over the wire.</p>
            <cite class="flex items-center">
                <div class="flex flex-col items-start">
                    <a
                        href="https://hotwired.dev/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center justify-center space-x-1 text-sm underline underline-offset-2 decoration-wavy"
                    >
                        <span>Hotwire Docs</span>
                        <x-icons.link class="w-4 h-4" />
                    </a>
                </div>
            </cite>
        </blockquote>
    </div>

    <hr class="mt-10" />

    <div class="max-w-7xl w-full mx-auto px-5 lg:px-20 flex md:space-x-6">
        <aside data-nav-highlight-target="nav" class="hidden md:block py-10 sm:shrink-0 w-1/6 sm:w-1/4 overflow-hidden prose prose-sm prose-a:font-light prose-a:no-underline [&_a:hover]:underline prose-a:underline-offset-2 [&>ul]:px-0 [&>ul]:font-semibold [&_a.active]:!font-medium [&_a.active]:text-blue-600 [&_a.active]:underline prose-ul:list-none pr-4 sm:border-r sm:border-gray-200">
            {!! $index !!}
        </aside>

        <x-main-content class="block flex-1 h-full overflow-hidden">
            <article id="docs-content" class="py-10 sm:px-5 prose prose-pre:!p-0 prose-h1:text-center max-w-none w-full sm:prose-h1:text-left">
                {!! $content !!}
            </article>
        </x-main-content>
    </div>
@stop
