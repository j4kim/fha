@props(['disabled' => false, 'textarea' => false])

@php
    $attrs = $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']);
@endphp

@if($textarea)
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attrs !!}></textarea>
@else
<input {{ $disabled ? 'disabled' : '' }} {!! $attrs !!}>
@endif
