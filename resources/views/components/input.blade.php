@props(['invalid'])


<input {!! $attributes->merge(['class' => "input input-bordered w-full {$invalid}"]) !!} />