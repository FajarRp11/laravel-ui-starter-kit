@props([
    'src' => null,
    'name' => null,
    'size' => 'md',
    'shape' => 'circle',
])

@php
    $sizes = [
        'xs' => 'h-6 w-6 text-xs',
        'sm' => 'h-8 w-8 text-xs',
        'md' => 'h-10 w-10 text-sm',
        'lg' => 'h-12 w-12 text-base',
        'xl' => 'h-16 w-16 text-xl',
    ];

    $shapes = [
        'circle' => 'rounded-full',
        'square' => 'rounded',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $shapeClass = $shapes[$shape] ?? $shapes['circle'];

    $initials = '';
    if ($name) {
        $words = preg_split('/\s+/', trim($name));
        if (count($words) >= 2) {
            $initials = mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1);
        } else {
            $initials = mb_substr($words[0], 0, 2);
        }
        $initials = mb_strtoupper($initials);
    }
@endphp

<div
    {{ $attributes->merge(['class' => "relative inline-flex items-center justify-center shrink-0 overflow-hidden font-semibold select-none border border-border {$sizeClass} {$shapeClass}"]) }}
>
    @if ($src)
        <img
            src="{{ $src }}"
            alt="{{ $name ?? 'Avatar' }}"
            class="h-full w-full object-cover"
        />
    @elseif ($initials)
        <span class="bg-primary-light text-primary-text w-full h-full flex items-center justify-center">
            {{ $initials }}
        </span>
    @else
        <span class="bg-surface-muted text-text-muted w-full h-full flex items-center justify-center">
            <svg class="h-1/2 w-1/2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </span>
    @endif
</div>
