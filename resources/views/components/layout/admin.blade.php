@props([
    'title' => null,
    'appName' => config('app.name', 'Laravel'),
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    :class="{ 'dark': dark }"
    class="h-full scroll-smooth"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? "{$title} - " : '' }}{{ $appName }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            }
            @custom-variant dark (&:where(.dark, .dark *));
        </style>
    @endif

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full bg-background text-text font-sans antialiased transition-colors duration-150">

    {{-- Sidebar Navigation --}}
    <x-layout.sidebar :app-name="$appName">
        <x-slot:logo>
            <div class="flex h-9 w-9 items-center justify-center rounded bg-primary text-primary-foreground font-bold text-lg shadow-sm">
                ⚡
            </div>
        </x-slot:logo>

        <x-slot:nav>
            @if (isset($nav))
                {{ $nav }}
            @else
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded transition-colors {{ request()->routeIs('dashboard') ? 'bg-primary-light text-primary-text' : 'text-text hover:bg-surface-muted' }}"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a
                    href="{{ route('components.demo') }}"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded transition-colors {{ request()->routeIs('components.demo') ? 'bg-primary-light text-primary-text' : 'text-text hover:bg-surface-muted' }}"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Komponen UI</span>
                    <x-ui.badge variant="success" size="sm" class="ml-auto">16</x-ui.badge>
                </a>
            @endif
        </x-slot:nav>

        <x-slot:footer>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    <x-ui.avatar name="Argenesia Developer" size="sm" />
                    <div class="truncate">
                        <p class="text-xs font-semibold text-text truncate">Argenesia</p>
                        <p class="text-[11px] text-text-muted truncate">admin@starterkit.test</p>
                    </div>
                </div>

                <x-ui.button
                    size="icon"
                    variant="ghost"
                    aria-label="Toggle mode gelap"
                    @click="
                        dark = !dark;
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                    "
                >
                    <svg x-show="!dark" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <svg x-show="dark" x-cloak class="h-4 w-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                </x-ui.button>
            </div>
        </x-slot:footer>
    </x-layout.sidebar>

    {{-- Main Wrapper --}}
    <div class="lg:pl-72 flex flex-col min-h-screen">
        {{-- Topbar --}}
        <x-layout.topbar :title="$title">
            <x-slot:actions>
                @if (isset($actions))
                    {{ $actions }}
                @endif

                {{-- Quick Theme Toggle --}}
                <x-ui.button
                    size="icon"
                    variant="ghost"
                    aria-label="Toggle mode gelap"
                    @click="
                        dark = !dark;
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                    "
                >
                    <svg x-show="!dark" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <svg x-show="dark" x-cloak class="h-4 w-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                </x-ui.button>

                {{-- User Profile Dropdown --}}
                <x-ui.dropdown align="right" width="48">
                    <x-slot:trigger>
                        <button type="button" class="flex items-center gap-2 cursor-pointer focus:outline-none">
                            <x-ui.avatar name="Argenesia" size="sm" />
                        </button>
                    </x-slot:trigger>

                    <a href="javascript:void(0)" class="block px-4 py-2 text-xs text-text hover:bg-surface-muted">Profil Saya</a>
                    <a href="javascript:void(0)" class="block px-4 py-2 text-xs text-text hover:bg-surface-muted">Pengaturan</a>
                    <div class="border-t border-border my-1"></div>
                    <a href="javascript:void(0)" class="block px-4 py-2 text-xs text-danger-text hover:bg-surface-muted">Keluar</a>
                </x-ui.dropdown>
            </x-slot:actions>
        </x-layout.topbar>

        {{-- Main Content --}}
        <main {{ $attributes->merge(['class' => 'flex-1 p-6 lg:p-8']) }}>
            {{ $slot }}
        </main>
    </div>

</body>
</html>
