@props(['invalid'])


<input type="file" {!! $attributes->merge(['class' => "file-input file-input-bordered w-full {$invalid}"]) !!} />