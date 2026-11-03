@props([
    'variant' => 'info',
    'title' => null,
    'dismissible' => false,
])

@php
    $variants = [
        'info' => [
            'wrapper' => 'bg-info-bg border-info-border text-info-text',
            'icon' => 'text-info-text',
        ],
        'success' => [
            'wrapper' => 'bg-success-bg border-success-border text-success-text',
            'icon' => 'text-success-text',
        ],
        'warning' => [
            'wrapper' => 'bg-warning-bg border-warning-border text-warning-text',
            'icon' => 'text-warning-text',
        ],
        'danger' => [
            'wrapper' => 'bg-danger-bg border-danger-border text-danger-text',
            'icon' => 'text-danger-text',
        ],
    ];

    $active = $variants[$variant] ?? $variants['info'];
    $classes = "relative flex gap-3 p-4 rounded-lg border text-sm transition-colors duration-150 {$active['wrapper']}";
@endphp

<div
    role="alert"
    @if ($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    <div class="shrink-0 {{ $active['icon'] }}">
        @if ($variant === 'success')
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
            </svg>
        @elseif ($variant === 'warning')
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
            </svg>
        @elseif ($variant === 'danger')
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
            </svg>
        @else
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .247.25v3.25a.75.75 0 0 0 1.5 0v-3.5A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
            </svg>
        @endif
    </div>

    <div class="flex-1">
        @if ($title)
            <h4 class="font-semibold mb-1 leading-5">
                {{ $title }}
            </h4>
        @endif
        <div class="leading-relaxed">
            {{ $slot }}
        </div>
    </div>

    @if ($dismissible)
        <button
            type="button"
            @click="show = false"
            aria-label="Tutup pemberitahuan"
            tabindex="0"
            class="shrink-0 -mr-1 -mt-1 p-1 rounded text-current opacity-70 hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-current transition-opacity duration-150 cursor-pointer"
        >
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    @endif
</div>
