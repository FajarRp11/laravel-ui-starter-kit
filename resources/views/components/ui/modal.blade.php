@props([
    'id',
    'title' => null,
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    x-init="$watch('open', value => document.body.classList.toggle('overflow-hidden', value))"
    class="inline-block"
>
    @if (isset($trigger))
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endif

    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        role="dialog"
        aria-modal="true"
        aria-labelledby="{{ $id }}-title"
    >
        {{-- Backdrop Overlay --}}
        <div
            x-show="open"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
            class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity"
            aria-hidden="true"
        ></div>

        {{-- Modal Dialog Container --}}
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.outside="open = false"
                {{ $attributes->merge(['class' => "relative w-full {$sizeClass} transform overflow-hidden rounded-lg bg-surface text-left text-text shadow-xl border border-border transition-all"]) }}
            >
                @if ($title)
                    <div class="flex items-center justify-between border-b border-border px-6 py-4">
                        <h3 id="{{ $id }}-title" class="text-lg font-semibold leading-6">
                            {{ $title }}
                        </h3>
                        <button
                            type="button"
                            @click="open = false"
                            aria-label="Tutup modal"
                            tabindex="0"
                            class="rounded p-1 text-text-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-ring transition-colors cursor-pointer"
                        >
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="px-6 py-5">
                    {{ $slot }}
                </div>

                @if (isset($footer))
                    <div class="flex items-center justify-end gap-3 border-t border-border bg-surface-muted/50 px-6 py-4">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
