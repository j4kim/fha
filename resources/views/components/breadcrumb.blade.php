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
} else {
    $text = json_encode($item);
}
@endphp

<a href="{{ $href }}" wire:navigate @class(['text-indigo-700' => $href])>
    {{ __($text) }}
</a>