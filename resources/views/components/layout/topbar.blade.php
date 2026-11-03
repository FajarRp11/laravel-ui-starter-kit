@props([
    'title' => null,
])

<header
    {{ $attributes->merge(['class' => 'sticky top-0 z-30 flex h-16 shrink-0 items-center justify-between gap-x-4 border-b border-border bg-surface/95 backdrop-blur-xs px-4 sm:px-6 lg:px-8 transition-colors duration-150']) }}
>
    {{-- Left: Mobile Hamburger & Title / Breadcrumbs --}}
    <div class="flex items-center gap-3">
        <button
            type="button"
            @click="$dispatch('toggle-sidebar')"
            aria-label="Buka navigasi"
            class="lg:hidden -ml-2 rounded p-2 text-text-muted hover:bg-surface-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-ring transition-colors cursor-pointer"
        >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        @if ($title)
            <h1 class="text-lg font-semibold text-text tracking-tight">
                {{ $title }}
            </h1>
        @endif

        @if (isset($left))
            <div class="flex items-center gap-2">
                {{ $left }}
            </div>
        @endif
    </div>

    {{-- Right: Actions Slot --}}
    @if (isset($actions))
        <div class="flex items-center gap-3">
            {{ $actions }}
        </div>
    @endif
</header>
