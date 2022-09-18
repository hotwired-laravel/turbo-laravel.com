@props([
    'type' => 'text',
])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm'])}} />
