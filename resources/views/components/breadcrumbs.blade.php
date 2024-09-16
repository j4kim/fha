@props(['items' => []])

<div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
    @foreach ($items as $item)
        <x-breadcrumb :item="$item"/>

        @unless($loop->last)
            <x-icons.chevron class="h-3 sm:h-4" />
        @endunless
    @endforeach
</div>