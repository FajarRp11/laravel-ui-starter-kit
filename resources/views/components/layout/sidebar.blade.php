@props([
    'appName' => config('app.name', 'Laravel'),
])

<div
    x-data="{ open: false }"
    @toggle-sidebar.window="open = !open"
    @close-sidebar.window="open = false"
    @keydown.escape.window="open = false"
>
    {{-- Mobile Drawer Overlay & Panel --}}
    <div
        x-show="open"
        x-cloak
        class="relative z-50 lg:hidden"
        role="dialog"
        aria-modal="true"
    >
        {{-- Backdrop --}}
        <div
            x-show="open"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
            class="fixed inset-0 bg-black/60 backdrop-blur-xs"
            aria-hidden="true"
        ></div>

        <div class="fixed inset-0 flex">
            <div
                x-show="open"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                @click.outside="open = false"
                class="relative mr-16 flex w-full max-w-xs flex-1 flex-col bg-surface border-r border-border text-text"
            >
                {{-- Close Button --}}
                <div class="absolute top-0 right-0 -mr-12 pt-4">
                    <button
                        type="button"
                        @click="open = false"
                        aria-label="Tutup sidebar"
                        class="ml-1 flex h-10 w-10 items-center justify-center rounded-full text-white focus:outline-none focus:ring-2 focus:ring-white"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Header / Brand --}}
                <div class="flex h-16 shrink-0 items-center gap-3 px-6 border-b border-border">
                    @if (isset($logo))
                        {{ $logo }}
                    @else
                        <div class="flex h-9 w-9 items-center justify-center rounded bg-primary text-primary-foreground font-bold text-lg shadow-sm">
                            {{ mb_substr($appName, 0, 1) }}
                        </div>
                    @endif
                    <span class="font-bold text-lg text-text tracking-tight">
                        {{ $appName }}
                    </span>
                </div>

                {{-- Navigation Items --}}
                <div class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
                    {{ $nav ?? $slot }}
                </div>

                {{-- Footer / User Info --}}
                @if (isset($footer))
                    <div class="border-t border-border p-4">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Desktop Fixed Sidebar --}}
    <aside
        {{ $attributes->merge(['class' => 'hidden lg:fixed lg:inset-y-0 lg:z-40 lg:flex lg:w-72 lg:flex-col border-r border-border bg-surface text-text transition-colors duration-150']) }}
    >
        {{-- Header / Brand --}}
        <div class="flex h-16 shrink-0 items-center gap-3 px-6 border-b border-border">
            @if (isset($logo))
                {{ $logo }}
            @else
                <div class="flex h-9 w-9 items-center justify-center rounded bg-primary text-primary-foreground font-bold text-lg shadow-sm">
                    {{ mb_substr($appName, 0, 1) }}
                </div>
            @endif
            <span class="font-bold text-lg tracking-tight">
                {{ $appName }}
            </span>
        </div>

        {{-- Nav Area --}}
        <div class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
            {{ $nav ?? $slot }}
        </div>

        {{-- Footer Area --}}
        @if (isset($footer))
            <div class="border-t border-border p-4">
                {{ $footer }}
            </div>
        @endif
    </aside>
</div>
