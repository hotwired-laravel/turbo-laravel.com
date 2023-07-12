@extends('layouts.main')

@section('mobileIndex')
    <form data-controller="autosubmit" data-action="change->autosubmit#submit" action="{{ route('change-version') }}" method="get" class="w-full pr-2">
        <input type="hidden" name="page" value="{{ $page }}" />
        <div class="flex flex-col w-full space-y-2">
            <label for="version" class="text-sm text-gray-400 uppercase">{{ __('Version') }}</label>
            <select name="version" id="version" class="text-sm border border-gray-300 rounded">
                @foreach ($versions as $version)
                <option value="{{ $version }}" @if ($version === $currentVersion) selected @endif >{{ $version }}</option>
                @endforeach
            </select>
        </div>
    </form>
    {!! $index ?? '' !!}
@stop

@section('content')
    <div class="flex w-full px-5 mx-auto max-w-7xl lg:px-20 md:space-x-6">
        <aside data-nav-highlight-target="nav" class="hidden w-1/6 py-10 overflow-hidden md:block sm:shrink-0 sm:w-1/4 sm:border-r sm:border-gray-200">
            @include('partials._versions_form')

            <div class="mt-4 pr-2 prose prose-sm prose-a:font-light prose-a:no-underline [&_a:hover]:underline prose-a:underline-offset-2 [&>ul]:px-0 [&>ul]:font-semibold [&_a.active]:!font-medium [&_a.active]:text-blue-600 [&_a.active]:underline prose-ul:list-none">
                {!! $index !!}
            </div>
        </aside>

        <x-main-content class="flex-1 block h-full overflow-hidden">
            <article id="docs-content" class="py-10 sm:px-5 prose prose-pre:!p-0 prose-h1:text-center max-w-none w-full sm:prose-h1:text-left">
                {!! $content !!}
            </article>
        </x-main-content>
    </div>
@stop
