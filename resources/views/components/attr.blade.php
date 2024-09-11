@props(['label', 'value'])

<div>
    <div class="text-sm opacity-50">{{ $label }}</div>
    <div {{ $attributes }}>{{ $value }}</div>
</div>