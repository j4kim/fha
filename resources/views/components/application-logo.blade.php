<svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    @for ($i = 0; $i < 5; $i++)
        @php
            $width = 300 - ($i * 60);
            $center = 316 / 2;
            $x = $center - $width / 2;
        @endphp
        <rect
            x="{{ $x }}"
            y="{{ $x }}"
            width="{{ $width }}"
            height="{{ $width }}"
            stroke="currentColor"
            stroke-width="4"
            fill="none"
            transform="rotate({{ 18 * $i}}, {{$center}}, {{$center}})"
        />
    @endfor
</svg>
