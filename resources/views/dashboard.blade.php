<x-layout.admin title="Dashboard Analytics">
    <x-slot:actions>
        <x-ui.button variant="secondary" size="sm">
            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
            Unduh Laporan
        </x-ui.button>
        <x-ui.button variant="primary" size="sm">
            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            Transaksi Baru
        </x-ui.button>
    </x-slot:actions>

    <div class="space-y-6">

        {{-- Top Metrics Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-text-muted">Total Pendapatan</p>
                        <h3 class="text-2xl font-bold text-text mt-1">Rp 128.450.000</h3>
                        <p class="text-xs text-primary-text font-semibold flex items-center gap-1 mt-2">
                            <span>&uarr; 14.8%</span>
                            <span class="text-text-muted font-normal">dari bulan lalu</span>
                        </p>
                    </div>
                    <div class="flex h-11 w-11 items-center justify-center rounded bg-primary-light text-primary">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-text-muted">Pengguna Aktif</p>
                        <h3 class="text-2xl font-bold text-text mt-1">8.642</h3>
                        <p class="text-xs text-primary-text font-semibold flex items-center gap-1 mt-2">
                            <span>&uarr; 8.2%</span>
                            <span class="text-text-muted font-normal">pengguna baru</span>
                        </p>
                    </div>
                    <div class="flex h-11 w-11 items-center justify-center rounded bg-info-bg text-info-text">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-text-muted">Total Pesanan</p>
                        <h3 class="text-2xl font-bold text-text mt-1">1.240</h3>
                        <p class="text-xs text-danger-text font-semibold flex items-center gap-1 mt-2">
                            <span>&darr; 2.1%</span>
                            <span class="text-text-muted font-normal">pembatalan</span>
                        </p>
                    </div>
                    <div class="flex h-11 w-11 items-center justify-center rounded bg-warning-bg text-warning-text">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-text-muted">Tingkat Konversi</p>
                        <h3 class="text-2xl font-bold text-text mt-1">3.48%</h3>
                        <p class="text-xs text-primary-text font-semibold flex items-center gap-1 mt-2">
                            <span>&uarr; 0.6%</span>
                            <span class="text-text-muted font-normal">minggu ini</span>
                        </p>
                    </div>
                    <div class="flex h-11 w-11 items-center justify-center rounded bg-success-bg text-success-text">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    </div>
                </div>
            </x-ui.card>
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- 1. Main Line/Area Chart --}}
            <div class="lg:col-span-2">
                <x-ui.card>
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-base text-text">Tren Performa Finansial</h3>
                                <p class="text-xs text-text-muted">Perbandingan pendapatan dan pengeluaran 7 bulan terakhir</p>
                            </div>
                            <x-ui.badge variant="success" size="sm" :dot="true">Live Data</x-ui.badge>
                        </div>
                    </x-slot:header>

                    <x-ui.chart
                        type="line"
                        :height="320"
                        :labels="['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']"
                        :datasets="[
                            [
                                'label' => 'Pendapatan (Juta Rp)',
                                'data' => [65, 78, 90, 85, 110, 118, 128],
                                'borderColor' => '#10b981',
                                'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                                'fill' => true,
                                'tension' => 0.4,
                                'borderWidth' => 2,
                                'pointRadius' => 4,
                            ],
                            [
                                'label' => 'Pengeluaran (Juta Rp)',
                                'data' => [40, 45, 55, 50, 62, 60, 68],
                                'borderColor' => '#ef4444',
                                'backgroundColor' => 'rgba(239, 68, 68, 0.05)',
                                'fill' => true,
                                'tension' => 0.4,
                                'borderWidth' => 2,
                                'pointRadius' => 4,
                            ]
                        ]"
                    />
                </x-ui.card>
            </div>

            {{-- 2. Doughnut Chart --}}
            <div class="lg:col-span-1">
                <x-ui.card>
                    <x-slot:header>
                        <div>
                            <h3 class="font-bold text-base text-text">Kategori Penjualan</h3>
                            <p class="text-xs text-text-muted">Distribusi pendapatan produk</p>
                        </div>
                    </x-slot:header>

                    <x-ui.chart
                        type="doughnut"
                        :height="320"
                        :labels="['SaaS', 'Services', 'Lisensi', 'Hardware']"
                        :datasets="[
                            [
                                'data' => [45, 25, 20, 10],
                                'backgroundColor' => ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6'],
                                'borderWidth' => 0,
                            ]
                        ]"
                    />
                </x-ui.card>
            </div>

        </div>

        {{-- Bottom Bar Chart & Recent Activity --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- 3. Bar Chart --}}
            <div class="lg:col-span-2">
                <x-ui.card>
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-base text-text">Target vs Realisasi Penjualan</h3>
                                <p class="text-xs text-text-muted">Target kuartal berjalan tahun 2026</p>
                            </div>
                        </div>
                    </x-slot:header>

                    <x-ui.chart
                        type="bar"
                        :height="280"
                        :labels="['Q1-M1', 'Q1-M2', 'Q1-M3', 'Q2-M1', 'Q2-M2', 'Q2-M3']"
                        :datasets="[
                            [
                                'label' => 'Target (Juta)',
                                'data' => [80, 85, 90, 95, 100, 110],
                                'backgroundColor' => 'rgba(156, 163, 175, 0.3)',
                                'borderRadius' => 6,
                            ],
                            [
                                'label' => 'Realisasi (Juta)',
                                'data' => [85, 92, 88, 102, 115, 128],
                                'backgroundColor' => '#10b981',
                                'borderRadius' => 6,
                            ]
                        ]"
                    />
                </x-ui.card>
            </div>

            {{-- Quick Summary Card --}}
            <div class="lg:col-span-1">
                <x-ui.card>
                    <x-slot:header>
                        <h3 class="font-bold text-base text-text">Status Sistem</h3>
                    </x-slot:header>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-text-muted">API Server</span>
                            <x-ui.badge variant="success" size="sm" :dot="true">Online</x-ui.badge>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-text-muted">Database Replica</span>
                            <x-ui.badge variant="success" size="sm" :dot="true">Synched</x-ui.badge>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-text-muted">Storage Backup</span>
                            <x-ui.badge variant="warning" size="sm" :dot="true">In Progress</x-ui.badge>
                        </div>

                        <div class="border-t border-border pt-4">
                            <x-ui.alert variant="info">
                                Semua layanan analitik berjalan optimal tanpa latensi terdeteksi.
                            </x-ui.alert>
                        </div>
                    </div>
                </x-ui.card>
            </div>

        </div>

    </div>
</x-layout.admin>
