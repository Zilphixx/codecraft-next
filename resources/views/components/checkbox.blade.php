@props(['invalid'])

<input type="checkbox" {!! $attributes->merge(['class' => "checkbox {$invalid}"]) !!} />