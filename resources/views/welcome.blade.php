@extends('layouts.main')

@section('content')
    <div class="max-w-7xl mx-auto w-full py-16 px-5 lg:px-20">
        <div class="space-y-12 min-h-[50vh] md:min-h-[65vh] flex flex-col justify-center">
            <h1 class="text-4xl sm:text-5xl text-center">
                An elegant way to combine<br />
                <span class="text-red-500 font-semibold">Hotwire and Laravel</span>
            </h1>

            <p class="text-lg max-w-lg mx-auto text-center">
                An alternative way of building web and hybrid native applications with minimal JavaScript that relies on sending HTML over the wire.
            </p>

            <div class="flex items-center justify-center">
                <a href="/docs" class="text-xl px-4 py-2 border border-2 border-black rounded-full">Get Started</a>
            </div>
        </div>

        <div class="mt-20 space-y-8 md:space-y-[16em]">
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-8">
                <div class="max-w-sm space-y-4">
                    <h3 class="text-3xl font-semibold">Turbo Streams Response Builders</h3>
                    <p class="font-lg">Turbo Laravel ships with a set of helper functions, response macros, and Blade components and directives to help constructing Turbo Streams.</p>
                    <a href="/docs/turbo-streams" class="inline-block text-sm rounded-full border-2 border-black px-4 py-2">Learn More</a>
                </div>
                <div class="flex-1 flex items-center justify-end">
                    <img loading="lazy" class="-rotate-3 mix-blend-darken md:rotate-0" src="{{ asset('/images/turbo-streams-home.jpg') }}" alt="Turbo Streams example code" />
                </div>
            </div>
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-8">
                <div class="flex-1 hidden md:flex items-center justify-start">
                    <img loading="lazy" class="rotate-3 mix-blend-darken md:rotate-0" src="{{ asset('/images/broadcasting-home.jpg') }}" alt="Example of broadcasting code using the lib." />
                </div>

                <div class="max-w-sm space-y-4">
                    <h3 class="text-3xl font-semibold">Broadcasting of Your Models' Turbo Streams</h3>
                    <p class="font-lg">Whenever a model changes, you may want to generate Turbo Streams from those changes and broadcast them to all interested users connected to Laravel Echo channels.</p>
                    <p class="font-lg">It also ships with a Blade component that allows listening to these broadcasts without the need to write any JS.</p>
                    <a href="/docs/broadcasting" class="inline-block text-sm rounded-full border-2 border-black px-4 py-2">Learn More</a>
                </div>

                <div class="flex-1 flex md:hidden items-center justify-start">
                    <img loading="lazy" class="rotate-3 mix-blend-darken md:rotate-0" src="{{ asset('/images/broadcasting-home.jpg') }}" alt="Example of broadcasting code using the lib." />
                </div>
            </div>
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-8">
                <div class="max-w-sm space-y-4">
                    <h3 class="text-3xl font-semibold">Testing Helpers</h3>
                    <p class="font-lg">Turbo Laravel ships with a set of traits that helps you testing the many aspects of your Hotwired app!</p>
                    <a href="/docs/testing" class="inline-block text-sm rounded-full border-2 border-black px-4 py-2">Learn More</a>
                </div>
                <div class="flex-1 flex items-center justify-end">
                    <img loading="lazy" class="-rotate-3 mix-blend-darken md:rotate-0" src="{{ asset('/images/testing-home.jpg') }}" alt="Example code of testing helpers" />
                </div>
            </div>
        </div>

        <hr class="my-20 w-32 mx-auto border-gray-300 shadow-sm rounded-full" />

        <div class="md:max-w-5xl mx-auto space-y-8">
            <h4 class="text-5xl font-semibold text-center">The Bootcamp</h4>
            <p class="text-lg text-center">In order to help you to get a better understanding of the many sides of Hotwire, we offer a free Bootcamp inspired by the oficial Laravel Bootcamp. In the Turbo Laravel Bootcamp, you’ll get a hands-on introduction to Hotwire and Turbo Laravel building a web application from scratch and then building the hybrid native app for it.</p>
            <div class="flex items-center justify-center"><a href="https://bootcamp.turbo-laravel.com" class="text-2xl px-4 py-2 rounded-full border-2 border-black">Start Learning</a></div>
        </div>
    </div>
@stop
