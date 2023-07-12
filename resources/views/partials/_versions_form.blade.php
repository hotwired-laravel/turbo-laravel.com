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
