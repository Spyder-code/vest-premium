@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} style="background-color: oklch(0.54 0.01 16.2 / 0.5) !important;">
