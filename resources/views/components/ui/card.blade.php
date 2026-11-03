@props([
    'padding' => true,
    'shadow' => true,
])

@php
    $baseClasses = 'rounded-lg border border-border bg-surface text-text transition-colors duration-150 overflow-hidden';
    $shadowClass = $shadow ? 'shadow-sm' : '';
    $classes = trim("{$baseClasses} {$shadowClass}");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($header))
        <div class="px-6 py-4 border-b border-border">
            {{ $header }}
        </div>
    @endif

    <div @class(['px-6 py-5' => $padding])>
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="px-6 py-4 border-t border-border bg-surface-muted/50">
            {{ $footer }}
        </div>
    @endif
</div>
