@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
    'disabled' => false,
    'loading' => false,
    'pill' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none disabled:cursor-not-allowed cursor-pointer';

    $radiusClass = $pill ? 'rounded-full' : 'rounded';

    $variants = [
        'primary' => 'bg-primary hover:bg-primary-hover text-primary-foreground shadow-sm',
        'secondary' => 'bg-surface hover:bg-surface-muted text-text border border-border shadow-sm',
        'outline' => 'border border-primary text-primary-text hover:bg-primary-light',
        'ghost' => 'text-text hover:bg-surface-muted',
        'danger' => 'bg-danger-bg text-danger-text border border-danger-border hover:opacity-90 shadow-sm',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs gap-1.5',
        'md' => 'px-4 py-2 text-sm gap-2',
        'lg' => 'px-5 py-2.5 text-base gap-2.5',
        'icon' => 'p-2 aspect-square',
    ];

    $classes = implode(' ', [
        $baseClasses,
        $radiusClass,
        $variants[$variant] ?? $variants['primary'],
        $sizes[$size] ?? $sizes['md'],
    ]);
@endphp

@if ($href)
    <a
        href="{{ $href }}"
        tabindex="0"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if ($loading)
            <svg class="animate-spin -ml-0.5 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        :disabled="{{ $disabled || $loading ? 'true' : 'false' }}"
        @disabled($disabled || $loading)
        tabindex="0"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if ($loading)
            <svg class="animate-spin -ml-0.5 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif
        {{ $slot }}
    </button>
@endif
