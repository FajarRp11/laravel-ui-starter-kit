@props([
    'align' => 'left',
    'width' => '48',
])

@php
    $alignClasses = [
        'left' => 'left-0 origin-top-left',
        'right' => 'right-0 origin-top-right',
    ];

    $widthClasses = [
        '48' => 'w-48',
        '56' => 'w-56',
        '64' => 'w-64',
    ];

    $alignClass = $alignClasses[$align] ?? $alignClasses['left'];
    $widthClass = $widthClasses[(string) $width] ?? 'w-48';
@endphp

<div
    x-data="{ open: false }"
    @keydown.escape.stop="open = false"
    @click.outside="open = false"
    class="relative inline-block text-left"
>
    @if (isset($trigger))
        <div @click="open = !open">
            {{ $trigger }}
        </div>
    @endif

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        {{ $attributes->merge(['class' => "absolute z-50 mt-2 {$widthClass} {$alignClass} rounded bg-surface text-text border border-border shadow-lg py-1 focus:outline-none"]) }}
        role="menu"
        aria-orientation="vertical"
        tabindex="-1"
    >
        {{ $slot }}
    </div>
</div>
