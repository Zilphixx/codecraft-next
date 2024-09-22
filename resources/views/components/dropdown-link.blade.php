@props(['link'])

@php
$isLink = ($link ?? false) ? 'hover:bg-gray-100 dark:hover:bg-gray-800' : '';
@endphp

<a {{ $attributes->merge(['class' => "block w-full px-4 py-2 font-medium text-start text-sm leading-5 transition duration-150 ease-in-out {$isLink}"]) }}>
    {{ $slot }}
</a>
