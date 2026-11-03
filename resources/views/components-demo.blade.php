<!DOCTYPE html>
<html
    lang="id"
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    :class="{ 'dark': dark }"
    class="scroll-smooth h-full"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blade UI Starter Kit - Component Showcase</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
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
<body class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-50 min-h-screen font-sans antialiased transition-colors duration-150">

    {{-- Topbar Header --}}
    <header class="sticky top-0 z-40 w-full border-b border-gray-200 dark:border-gray-800 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold text-xl shadow-md">
                    ⚡
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-base sm:text-lg tracking-tight">Blade UI Starter Kit</span>
                        <x-ui.badge variant="success" size="sm" :pill="true">Laravel 13</x-ui.badge>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 hidden sm:block">Tailwind v4 & Alpine.js Documentation Showcase</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="https://github.com"
                    target="_blank"
                    class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 hidden md:inline-flex items-center gap-1.5"
                >
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                    GitHub
                </a>

                {{-- Dark Mode Toggle --}}
                <button
                    type="button"
                    @click="
                        dark = !dark;
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                    "
                    aria-label="Ganti mode gelap/terang"
                    class="inline-flex items-center gap-2 px-3 py-2 text-xs font-medium rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-colors cursor-pointer"
                >
                    <span x-show="!dark" class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        <span>Light</span>
                    </span>
                    <span x-show="dark" x-cloak class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                        <span>Dark</span>
                    </span>
                </button>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-8 items-start">

            {{-- Sticky Anchor Sidebar --}}
            <nav class="hidden lg:block w-64 shrink-0 sticky top-24 max-h-[calc(100vh-8rem)] overflow-y-auto pr-4 space-y-6">
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Foundation</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#button" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">1. Button</a></li>
                        <li><a href="#badge" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">2. Badge</a></li>
                        <li><a href="#spinner" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">3. Spinner</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Form Elements</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#input" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">4. Form Input</a></li>
                        <li><a href="#select" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">5. Form Select</a></li>
                        <li><a href="#textarea" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">6. Form Textarea</a></li>
                        <li><a href="#checkbox" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">7. Form Checkbox</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Feedback & Overlay</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#alert" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">8. Alert</a></li>
                        <li><a href="#card" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">9. Card</a></li>
                        <li><a href="#modal" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">10. Modal</a></li>
                        <li><a href="#dropdown" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">11. Dropdown</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Data Display</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#avatar" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">12. Avatar</a></li>
                        <li><a href="#table" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">13. Table</a></li>
                        <li><a href="#empty-state" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">14. Empty State</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Layout</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#layout" class="block px-2 py-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">15 & 16. Sidebar & Topbar</a></li>
                    </ul>
                </div>
            </nav>

            {{-- Main Content Sections --}}
            <main class="flex-1 min-w-0 space-y-12">

                {{-- 1. BUTTON --}}
                <section id="button" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">1. Button Component</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.button&gt; &bull; Variants, Sizes, Loading, Disabled & Pill</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/button</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Variants</h4>
                                <div class="flex flex-wrap items-center gap-3">
                                    <x-ui.button variant="primary">Primary</x-ui.button>
                                    <x-ui.button variant="secondary">Secondary</x-ui.button>
                                    <x-ui.button variant="outline">Outline</x-ui.button>
                                    <x-ui.button variant="ghost">Ghost</x-ui.button>
                                    <x-ui.button variant="danger">Danger</x-ui.button>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Sizes & Shape</h4>
                                <div class="flex flex-wrap items-center gap-3">
                                    <x-ui.button size="sm">Small (sm)</x-ui.button>
                                    <x-ui.button size="md">Medium (md)</x-ui.button>
                                    <x-ui.button size="lg">Large (lg)</x-ui.button>
                                    <x-ui.button :pill="true">Pill Shape</x-ui.button>
                                    <x-ui.button size="icon" aria-label="Setting">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    </x-ui.button>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">States</h4>
                                <div class="flex flex-wrap items-center gap-3">
                                    <x-ui.button :loading="true">Loading State</x-ui.button>
                                    <x-ui.button :disabled="true">Disabled Button</x-ui.button>
                                    <x-ui.button href="https://laravel.com" target="_blank" variant="outline">Anchor Link Tag</x-ui.button>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 2. BADGE --}}
                <section id="badge" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">2. Badge Component</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.badge&gt; &bull; Semantic Colors, Dots, Dismissible & Shapes</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/badge</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Semantic Variants</h4>
                                <div class="flex flex-wrap items-center gap-2">
                                    <x-ui.badge variant="primary">Primary</x-ui.badge>
                                    <x-ui.badge variant="success">Success</x-ui.badge>
                                    <x-ui.badge variant="warning">Warning</x-ui.badge>
                                    <x-ui.badge variant="danger">Danger</x-ui.badge>
                                    <x-ui.badge variant="info">Info</x-ui.badge>
                                    <x-ui.badge variant="neutral">Neutral</x-ui.badge>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Indicator Dots</h4>
                                <div class="flex flex-wrap items-center gap-2">
                                    <x-ui.badge variant="success" :dot="true">Online</x-ui.badge>
                                    <x-ui.badge variant="warning" :dot="true">Pending</x-ui.badge>
                                    <x-ui.badge variant="danger" :dot="true">Offline</x-ui.badge>
                                    <x-ui.badge variant="info" :dot="true">In Progress</x-ui.badge>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Sizes, Non-Pill & Dismissible</h4>
                                <div class="flex flex-wrap items-center gap-2">
                                    <x-ui.badge size="sm" variant="primary">Small</x-ui.badge>
                                    <x-ui.badge size="md" variant="primary">Medium</x-ui.badge>
                                    <x-ui.badge size="lg" variant="primary">Large</x-ui.badge>
                                    <x-ui.badge :pill="false" variant="neutral">Rounded-lg</x-ui.badge>
                                    <x-ui.badge variant="neutral" :dismissible="true">Alpine Dismissible</x-ui.badge>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 3. SPINNER --}}
                <section id="spinner" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">3. Spinner Component</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.spinner&gt; &bull; Accessible SVG Loading Spinners</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/spinner</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Sizes</h4>
                                <div class="flex items-center gap-4">
                                    <x-ui.spinner size="xs" />
                                    <x-ui.spinner size="sm" />
                                    <x-ui.spinner size="md" />
                                    <x-ui.spinner size="lg" />
                                    <x-ui.spinner size="xl" />
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Colors</h4>
                                <div class="flex items-center gap-4 p-4 rounded-lg bg-gray-100 dark:bg-gray-800">
                                    <x-ui.spinner color="primary" />
                                    <x-ui.spinner color="neutral" />
                                    <div class="bg-gray-900 p-2 rounded">
                                        <x-ui.spinner color="white" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 4. FORM INPUT --}}
                <section id="input" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">4. Form Input</h2>
                                    <p class="text-xs text-gray-500">&lt;x-form.input&gt; &bull; Labels, Slots, Errors, Disabled</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">form/input</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form.input
                                label="Nama Lengkap"
                                name="full_name"
                                placeholder="Masukkan nama..."
                                helper="Sesuai kartu identitas resmi."
                                :required="true"
                            />

                            <x-form.input
                                label="Email Address (Prefix Icon)"
                                name="email"
                                type="email"
                                placeholder="nama@domain.com"
                            >
                                <x-slot:prefix>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                </x-slot:prefix>
                            </x-form.input>

                            <x-form.input
                                label="Harga Produk (Suffix Text)"
                                name="price"
                                placeholder="0"
                            >
                                <x-slot:suffix>
                                    <span class="text-xs font-semibold">IDR</span>
                                </x-slot:suffix>
                            </x-form.input>

                            <x-form.input
                                label="Username (Error State)"
                                name="username"
                                value="admin_utama"
                                error="Username ini telah digunakan oleh pengguna lain."
                            />

                            <x-form.input
                                label="Disabled Field"
                                name="disabled_demo"
                                value="Tidak dapat diedit"
                                :disabled="true"
                            />
                        </div>
                    </x-ui.card>
                </section>

                {{-- 5. FORM SELECT --}}
                <section id="select" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">5. Form Select</h2>
                                    <p class="text-xs text-gray-500">&lt;x-form.select&gt; &bull; Dropdown Select Input</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">form/select</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form.select
                                label="Pilih Provinsi"
                                name="province"
                                placeholder="-- Silakan Pilih --"
                                :required="true"
                            >
                                <option value="jkt">DKI Jakarta</option>
                                <option value="jbr">Jawa Barat</option>
                                <option value="jtm">Jawa Timur</option>
                            </x-form.select>

                            <x-form.select
                                label="Role Pengguna (Error State)"
                                name="role"
                                error="Harap pilih hak akses pengguna."
                            >
                                <option value="">Pilih role...</option>
                                <option value="superadmin">Super Administrator</option>
                                <option value="operator">Operator</option>
                            </x-form.select>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 6. FORM TEXTAREA --}}
                <section id="textarea" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">6. Form Textarea</h2>
                                    <p class="text-xs text-gray-500">&lt;x-form.textarea&gt; &bull; Multi-line text field</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">form/textarea</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form.textarea
                                label="Catatan Tambahan"
                                name="notes"
                                placeholder="Tulis instruksi khusus pengiriman di sini..."
                                helper="Maksimal 250 karakter."
                                :rows="3"
                            />

                            <x-form.textarea
                                label="Alasan Penolakan (Error State)"
                                name="rejection_reason"
                                error="Alasan penolakan wajib dicantumkan secara detail."
                                :rows="3"
                            >Pengajuan belum lengkap</x-form.textarea>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 7. FORM CHECKBOX --}}
                <section id="checkbox" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">7. Form Checkbox</h2>
                                    <p class="text-xs text-gray-500">&lt;x-form.checkbox&gt; &bull; Checkbox selection with helpers & rich labels</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">form/checkbox</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-4">
                            <x-form.checkbox
                                label="Langganan Buletin Mingguan"
                                name="newsletter"
                                helper="Dapatkan update fitur terbaru setiap hari Senin."
                                :checked="true"
                            />

                            <x-form.checkbox name="agree_terms">
                                Saya setuju dengan <a href="#" class="text-emerald-600 dark:text-emerald-400 underline font-medium">Syarat & Ketentuan</a> serta Kebijakan Privasi.
                            </x-form.checkbox>

                            <x-form.checkbox
                                label="Opsi Dinonaktifkan"
                                name="disabled_option"
                                :disabled="true"
                                :checked="true"
                            />
                        </div>
                    </x-ui.card>
                </section>

                {{-- 8. ALERT --}}
                <section id="alert" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">8. Alert Feedback</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.alert&gt; &bull; Informative messages & dismissible transitions</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/alert</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-4">
                            <x-ui.alert variant="info" title="Pembaruan Sistem" :dismissible="true">
                                Pemeliharaan rutin server dijadwalkan pada hari Minggu pukul 02:00 WIB.
                            </x-ui.alert>

                            <x-ui.alert variant="success" title="Transaksi Berhasil!" :dismissible="true">
                                Pembayaran untuk tagihan #INV-8829 telah diverifikasi oleh sistem.
                            </x-ui.alert>

                            <x-ui.alert variant="warning" title="Perhatian" :dismissible="true">
                                Kapasitas penyimpanan cloud Anda telah mencapai 85%.
                            </x-ui.alert>

                            <x-ui.alert variant="danger" title="Akses Ditolak" :dismissible="true">
                                Anda tidak memiliki izin untuk mengedit konfigurasi database ini.
                            </x-ui.alert>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 9. CARD --}}
                <section id="card" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">9. Card Container</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.card&gt; &bull; Headers, Footers, Shadow & Padding Options</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/card</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-ui.card>
                                <x-slot:header>
                                    <h4 class="font-semibold text-sm">Card Header</h4>
                                </x-slot:header>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Card standard dengan slot header dan footer terintegrasi rapi.</p>
                                <x-slot:footer>
                                    <x-ui.button size="sm">Aksi Footer</x-ui.button>
                                </x-slot:footer>
                            </x-ui.card>

                            <x-ui.card :shadow="false" class="border-dashed">
                                <h4 class="font-semibold text-sm mb-2">Tanpa Shadow / Custom Border</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Card dapat dikustomisasi border-style dan elevasi shadow sesuai kebutuhan layout.</p>
                            </x-ui.card>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 10. MODAL --}}
                <section id="modal" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">10. Modal Dialog</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.modal&gt; &bull; Accessible Dialog with Backdrop & Transitions</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/modal</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="flex flex-wrap items-center gap-4">
                            {{-- Small Modal --}}
                            <x-ui.modal id="demo-modal-sm" title="Modal Kecil (sm)" size="sm">
                                <x-slot:trigger>
                                    <x-ui.button variant="secondary">Buka Modal (sm)</x-ui.button>
                                </x-slot:trigger>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Ini adalah contoh dialog modal berukuran kecil (max-w-sm).</p>
                                <x-slot:footer>
                                    <x-ui.button variant="primary" size="sm" @click="open = false">Tutup</x-ui.button>
                                </x-slot:footer>
                            </x-ui.modal>

                            {{-- Medium Standard Modal --}}
                            <x-ui.modal id="demo-modal-md" title="Konfirmasi Tindakan" size="md">
                                <x-slot:trigger>
                                    <x-ui.button variant="primary">Buka Modal (md)</x-ui.button>
                                </x-slot:trigger>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Apakah Anda yakin ingin memproses data ini sekarang?</p>
                                <x-slot:footer>
                                    <x-ui.button variant="ghost" size="sm" @click="open = false">Batal</x-ui.button>
                                    <x-ui.button variant="primary" size="sm" @click="open = false">Konfirmasi</x-ui.button>
                                </x-slot:footer>
                            </x-ui.modal>

                            {{-- Large Modal --}}
                            <x-ui.modal id="demo-modal-lg" title="Form Modal (lg)" size="lg">
                                <x-slot:trigger>
                                    <x-ui.button variant="outline">Buka Modal (lg)</x-ui.button>
                                </x-slot:trigger>
                                <form class="space-y-4">
                                    <x-form.input label="Judul Pengumuman" name="ann_title" placeholder="Tuliskan judul..." />
                                    <x-form.textarea label="Isi Pengumuman" name="ann_body" :rows="3" />
                                </form>
                                <x-slot:footer>
                                    <x-ui.button variant="ghost" size="sm" @click="open = false">Batal</x-ui.button>
                                    <x-ui.button variant="primary" size="sm" @click="open = false">Simpan</x-ui.button>
                                </x-slot:footer>
                            </x-ui.modal>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 11. DROPDOWN --}}
                <section id="dropdown" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">11. Dropdown Menu</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.dropdown&gt; &bull; Popups with click-outside and alignment options</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/dropdown</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="flex flex-wrap items-center gap-6">
                            {{-- Left Align --}}
                            <x-ui.dropdown align="left" width="48">
                                <x-slot:trigger>
                                    <x-ui.button variant="secondary">
                                        Dropdown Kiri
                                        <svg class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </x-ui.button>
                                </x-slot:trigger>
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Edit Profil</a>
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Pengaturan</a>
                                <div class="border-t border-gray-200 dark:border-gray-800 my-1"></div>
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">Keluar Akun</a>
                            </x-ui.dropdown>

                            {{-- Right Align --}}
                            <x-ui.dropdown align="right" width="56">
                                <x-slot:trigger>
                                    <x-ui.button variant="primary">
                                        Dropdown Kanan
                                        <svg class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </x-ui.button>
                                </x-slot:trigger>
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Ekspor PDF</a>
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Ekspor Excel</a>
                            </x-ui.dropdown>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 12. AVATAR --}}
                <section id="avatar" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">12. Avatar Component</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.avatar&gt; &bull; Images, initials fallback, sizes & shapes</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/avatar</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Sizes (Initials Fallback)</h4>
                                <div class="flex items-center gap-3">
                                    <x-ui.avatar name="Argenesia" size="xs" />
                                    <x-ui.avatar name="Argenesia Dev" size="sm" />
                                    <x-ui.avatar name="Argenesia Dev" size="md" />
                                    <x-ui.avatar name="Argenesia Dev" size="lg" />
                                    <x-ui.avatar name="Argenesia Dev" size="xl" />
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-3">Image & Shapes</h4>
                                <div class="flex items-center gap-4">
                                    <x-ui.avatar
                                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150"
                                        name="Sarah Connor"
                                        size="lg"
                                        shape="circle"
                                    />
                                    <x-ui.avatar
                                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150"
                                        name="Sarah Connor"
                                        size="lg"
                                        shape="square"
                                    />
                                    <x-ui.avatar shape="square" size="lg" />
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 13. TABLE --}}
                <section id="table" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">13. Data Table</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.table&gt; &bull; Responsive, hoverable & striped rows</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/table</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="space-y-6">
                            <x-ui.table :striped="true">
                                <x-slot:head>
                                    <tr>
                                        <th class="px-6 py-3.5">Pengguna</th>
                                        <th class="px-6 py-3.5">Status</th>
                                        <th class="px-6 py-3.5">Role</th>
                                        <th class="px-6 py-3.5 text-right">Aksi</th>
                                    </tr>
                                </x-slot:head>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <x-ui.avatar name="Ahmad Fauzi" size="sm" />
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-gray-100">Ahmad Fauzi</p>
                                                <p class="text-xs text-gray-500">ahmad@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-ui.badge variant="success" size="sm" :dot="true">Aktif</x-ui.badge>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-medium">Administrator</td>
                                    <td class="px-6 py-4 text-right">
                                        <x-ui.button variant="ghost" size="sm">Detail</x-ui.button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <x-ui.avatar name="Budi Santoso" size="sm" />
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-gray-100">Budi Santoso</p>
                                                <p class="text-xs text-gray-500">budi@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-ui.badge variant="warning" size="sm" :dot="true">Tertunda</x-ui.badge>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-medium">Editor</td>
                                    <td class="px-6 py-4 text-right">
                                        <x-ui.button variant="ghost" size="sm">Detail</x-ui.button>
                                    </td>
                                </tr>
                            </x-ui.table>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 14. EMPTY STATE --}}
                <section id="empty-state" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">14. Empty State</h2>
                                    <p class="text-xs text-gray-500">&lt;x-ui.empty-state&gt; &bull; Friendly placeholders for empty datasets</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">ui/empty-state</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-ui.empty-state
                                icon="inbox"
                                title="Kotak Masuk Kosong"
                                description="Anda telah membaca semua pesan. Tidak ada tugas baru saat ini."
                            >
                                <x-slot:action>
                                    <x-ui.button variant="primary" size="sm">Kirim Pesan</x-ui.button>
                                </x-slot:action>
                            </x-ui.empty-state>

                            <x-ui.empty-state
                                icon="search"
                                title="Tidak Ada Hasil"
                                description="Coba sesuaikan kata kunci atau gunakan filter yang berbeda."
                            >
                                <x-slot:action>
                                    <x-ui.button variant="secondary" size="sm">Hapus Filter</x-ui.button>
                                </x-slot:action>
                            </x-ui.empty-state>
                        </div>
                    </x-ui.card>
                </section>

                {{-- 15 & 16. LAYOUT (SIDEBAR & TOPBAR PREVIEW) --}}
                <section id="layout" class="scroll-mt-24">
                    <x-ui.card>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">15 & 16. Layout Components</h2>
                                    <p class="text-xs text-gray-500">&lt;x-layout.topbar&gt; & &lt;x-layout.sidebar&gt; &bull; Responsive Application Shell</p>
                                </div>
                                <x-ui.badge variant="info" size="sm">layout</x-ui.badge>
                            </div>
                        </x-slot:header>

                        <div class="border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-950 p-4">
                            <p class="text-xs text-gray-500 mb-3 font-medium">Contoh Tampilan Topbar:</p>
                            <x-layout.topbar title="Dashboard Overview" class="rounded-lg shadow-sm border">
                                <x-slot:actions>
                                    <x-ui.button variant="secondary" size="sm">Unduh CSV</x-ui.button>
                                    <x-ui.button variant="primary" size="sm">Data Baru</x-ui.button>
                                </x-slot:actions>
                            </x-layout.topbar>

                            <div class="mt-4 p-4 rounded-lg bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-xs text-gray-600 dark:text-gray-400">
                                <p class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Catatan Integrasi Sidebar:</p>
                                <p>Komponen <code class="font-mono text-emerald-600 dark:text-emerald-400">&lt;x-layout.sidebar&gt;</code> telah dilengkapi listener Alpine <code class="font-mono">@toggle-sidebar.window</code>. Klik ikon hamburger di topbar mobile untuk membuka drawer navigasi dengan animasi slide.</p>
                            </div>
                        </div>
                    </x-ui.card>
                </section>

            </main>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="mt-16 border-t border-gray-200 dark:border-gray-800 py-8 bg-white dark:bg-gray-900 text-center text-xs text-gray-500 dark:text-gray-400">
        <p>Laravel Blade UI Starter Kit &bull; Built with Tailwind CSS v4 & Alpine.js</p>
    </footer>

</body>
</html>
