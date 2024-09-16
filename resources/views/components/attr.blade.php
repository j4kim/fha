@props(['label', 'value', 'valueclass' => ''])

<div {{ $attributes }}>
    <div class="text-sm opacity-50">{{ $label }}</div>
    <div class="{{ $valueclass }}">{{ $value }}</div>
</div>