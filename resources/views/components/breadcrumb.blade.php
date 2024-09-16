@props(['item'])

@php
$href = '';
$text = '';

if (is_string($item)) {
    $text = $item;
    if (Route::has($item)) {
        $href = route($item);
    }
} elseif (is_a($item, App\Models\Breadcrumbable::class)) {
    $text = $item->getTitle();
    $href = $item->getHref();
}
@endphp

<a
    href="{{ $href }}"
    wire:navigate
    @class([
        'text-sm sm:text-lg',
        'text-indigo-700' => $href && $href !== request()->url()
    ])
>
    {{ __($text) }}
</a>