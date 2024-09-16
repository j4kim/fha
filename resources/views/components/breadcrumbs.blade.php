@props(['items' => []])

<div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
    @foreach ($items as $item)
        <x-breadcrumb :item="$item"/>

        @unless($loop->last)
            <svg class="fill-current h-3 sm:h-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.3,14.7c-0.4-0.4-0.4-1,0-1.4l3.3-3.3L7.3,6.7c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0c0,0,0,0,0,0l4,4c0.4,0.4,0.4,1,0,1.4l-4,4C8.3,15.1,7.7,15.1,7.3,14.7z"/>
            </svg>
        @endunless
    @endforeach
</div>