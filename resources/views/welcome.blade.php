@extends('layouts.main')

@section('mobileIndex')
    {!! $index ?? '' !!}
@stop

@section('content')
    <div class="bg-red-50 w-full py-16 px-5 lg:px-20">
        <div class="max-w-7xl w-full mx-auto space-y-8">
            <div class="space-y-4">
                <img src="{{ asset('/images/turbo-laravel-hero.png') }}" alt="Hero Image" class="w-40 h-40 mx-auto" />

                <h1 class="text-3xl sm:text-5xl text-center leading-none">
                    An elegant way to combine<br>
                    <span class="text-red-500 font-semibold">Hotwire and Laravel</span>
                </h1>
            </div>

            <blockquote class="text-lg max-w-lg mx-auto text-center" cite="https://hotwired.dev">
                <p>"Hotwire is an alternative approach to building modern web applications without using much JavaScript by sending HTML instead of JSON over the wire."</p>
                <br>
                <a class="underline font-semibold underline-offset-4" href="https://hotwired.dev">Hotwire Docs</a>
            </blockquote>
        </div>
    </div>

    <div class="py-16 space-y-12 px-5 lg:px-20">
        <div class="max-w-7xl mx-auto space-y-8">
            <h2 class="text-center text-4xl sm:text-5xl font-bold">Introduction</h2>

            <p class="max-w-md mx-auto text-center">This package gives you a set of conventions to make the most out of <a href="https://hotwired.dev" class="text-red-500 font-semibold underline underline-offset-4">Hotwire</a> in <a href="https://laravel.com" class="text-red-500 font-semibold underline underline-offset-4">Laravel</a>.</p>
        </div>

        <hr class="w-32 mx-auto" />

        <div class="max-w-4xl mx-auto">
            <div class="grid space-y-12 md:space-y-0 md:grid-cols-2">
                <div class="space-y-4">
                    <h4 class="text-xl sm:text-2xl font-semibold flex items-center space-x-2"><x-icons.light-bulb class="w-8 h-8 text-red-400" /> <span>Inspiration</span></h4>
                    <p>This package was inspired by the <a href="https://github.com/hotwired/turbo-rails" class="text-red-500 font-semibold underline underline-offset-4">turbo rails</a> gem.</p>
                </div>

                <div class="space-y-4">
                    <h4 class="text-xl sm:text-2xl font-semibold flex items-center space-x-2"><x-icons.computer class="w-8 h-8 text-red-400" /> <span>Bootcamp</span></h4>
                    <p>
                        If you want a more hands-on introduction, head out to <a href="https://bootcamp.turbo-laravel.com" class="text-red-500 font-semibold underline underline-offset-4">Bootcamp</a>. It covers building a multi-platform app in Turbo.
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center"><a href="/docs/installation" class="font-semibold underline underline-offset-4">Continue to installation...</a></div>
    </div>
@stop
