@extends('layouts.main')

@section('mobileIndex')
    {!! $index ?? '' !!}
@stop

@section('content')
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
