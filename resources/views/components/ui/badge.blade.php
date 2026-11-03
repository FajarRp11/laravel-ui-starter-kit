@props([
    'variant' => 'primary',
    'size' => 'md',
    'pill' => true,
    'dot' => false,
    'dismissible' => false,
])

@php
    $baseClasses = 'inline-flex items-center font-medium transition-colors duration-150';

    $radiusClass = $pill ? 'rounded-full' : 'rounded';

    $variants = [
        'primary' => 'bg-primary text-primary-foreground',
        'success' => 'bg-success-bg text-success-text',
        'warning' => 'bg-warning-bg text-warning-text',
        'danger' => 'bg-danger-bg text-danger-text',
        'info' => 'bg-info-bg text-info-text',
        'neutral' => 'bg-surface-muted text-text',
    ];

    $dotColors = [
        'primary' => 'bg-primary-foreground',
        'success' => 'bg-success-text',
        'warning' => 'bg-warning-text',
        'danger' => 'bg-danger-text',
        'info' => 'bg-info-text',
        'neutral' => 'bg-text-muted',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs gap-1',
        'md' => 'px-2.5 py-1 text-xs gap-1.5',
        'lg' => 'px-3 py-1.5 text-sm gap-2',
    ];

    $dotSizes = [
        'sm' => 'h-1.5 w-1.5',
        'md' => 'h-2 w-2',
        'lg' => 'h-2.5 w-2.5',
    ];

    $classes = implode(' ', [
        $baseClasses,
        $radiusClass,
        $variants[$variant] ?? $variants['primary'],
        $sizes[$size] ?? $sizes['md'],
    ]);
@endphp

<span
    @if ($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if ($dot)
        <span class="inline-block rounded-full {{ $dotSizes[$size] ?? $dotSizes['md'] }} {{ $dotColors[$variant] ?? $dotColors['primary'] }}" aria-hidden="true"></span>
    @endif

    {{ $slot }}

    @if ($dismissible)
        <button
            type="button"
            @click="show = false"
            aria-label="Hapus badge"
            tabindex="0"
            class="-mr-1 inline-flex items-center justify-center rounded-full p-0.5 text-current opacity-70 hover:opacity-100 focus:outline-none focus:ring-1 focus:ring-current transition-opacity duration-150 cursor-pointer"
        >
            <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    @endif
</span>
