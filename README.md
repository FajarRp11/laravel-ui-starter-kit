# Laravel UI Starter Kit

Starter kit modern untuk Laravel yang dilengkapi dengan kumpulan komponen Blade native, sistem token warna OKLCH, Tailwind CSS v4, Alpine.js, serta Chart.js.

Didesain khusus untuk mempercepat pembuatan antarmuka aplikasi web dan dashboard admin tanpa ketergantungan pada framework JavaScript frontend yang berat.

---

## 🚀 Fitur Utama

- **Laravel 13 & PHP 8.3+**: Menggunakan arsitektur Laravel terbaru dengan performa optimal.
- **Tailwind CSS v4 (@tailwindcss/vite)**: Konfigurasi styling berbasis CSS first tanpa overhead file konfigurasi legacy.
- **Design Tokens (OKLCH)**: Sistem variabel warna modern pada `resources/css/app.css` untuk transisi Light Mode dan Dark Mode yang konsisten.
- **Alpine.js v3**: Interaktivitas ringan (modal, dropdown, dark mode toggle, mobile navigation drawer).
- **Chart.js v4**: Komponen chart terintegrasi yang otomatis menyesuaikan palet warna dark/light mode.
- **16+ Reusable Blade Components**: Komponen siap pakai untuk form, feedback, navigasi, dan visualisasi data.
- **Responsive Admin Layout**: Template dashboard lengkap dengan sidebar yang dapat diciutkan dan topbar responsif.
- **Halaman Demo Siap Pakai**:
  - `/` — Halaman landing / welcome.
  - `/components` — Showcase interaktif seluruh komponen dan dokumentasi kodenya.
  - `/dashboard` — Halaman dashboard analitik bisnis lengkap dengan metrik, grafik, dan tabel transaksi.

---

## 📦 Daftar Komponen Blade

Semua komponen terletak di direktori `resources/views/components/`:

### 1. Form Components (`x-form.*`)
| Komponen | Deskripsi | Parameter Utama |
| :--- | :--- | :--- |
| `<x-form.input>` | Input teks fleksibel dengan ikon prefix/suffix, label, dan validasi error | `label`, `name`, `type`, `placeholder`, `error`, `helper`, `disabled`, `required` |
| `<x-form.select>` | Dropdown pilihan form | `label`, `name`, `options` (array/key-value), `placeholder`, `error`, `selected` |
| `<x-form.textarea>` | Area teks multi-baris | `label`, `name`, `rows`, `placeholder`, `error`, `helper` |
| `<x-form.checkbox>` | Checkbox kustom dengan label dan deskripsi | `label`, `name`, `description`, `checked`, `value` |

### 2. UI Components (`x-ui.*`)
| Komponen | Deskripsi | Parameter Utama |
| :--- | :--- | :--- |
| `<x-ui.button>` | Tombol aksi dengan indikator loading | `variant` (primary, secondary, outline, ghost, danger), `size` (sm, md, lg, icon), `href`, `loading`, `disabled`, `pill` |
| `<x-ui.badge>` | Label status / badge | `variant` (primary, success, warning, danger, info), `size` (sm, md), `pill` |
| `<x-ui.card>` | Kontainer kartu konten | `padding` (bool), `shadow` (bool), slot: `header`, `default`, `footer` |
| `<x-ui.modal>` | Dialog interaktif (Alpine.js) | `id`, `title`, `size` (sm, md, lg, xl), slot: `trigger`, `default`, `footer` |
| `<x-ui.alert>` | Notifikasi alert yang dapat ditutup | `variant` (info, success, warning, danger), `title`, `dismissible` |
| `<x-ui.dropdown>` | Menu dropdown popover | `align` (left, right), `width`, slot: `trigger`, `default` |
| `<x-ui.avatar>` | Avatar gambar pengguna atau inisial | `src`, `name`, `size` (xs, sm, md, lg, xl), `status` (online, offline, busy, away) |
| `<x-ui.table>` | Wrapper tabel responsif | `striped`, `hoverable`, slot: `head`, `default` |
| `<x-ui.empty-state>` | Tampilan state kosong ketika data nihil | `title`, `description`, slot: `icon`, `actions` |
| `<x-ui.spinner>` | Indikator loading SVG berputar | `size` (sm, md, lg), `color` |
| `<x-ui.chart>` | Wrapper visualisasi grafik Chart.js | `type` (line, bar, doughnut, pie), `labels`, `datasets`, `height` |

### 3. Layout Components (`x-layout.*`)
| Komponen | Deskripsi | Parameter Utama |
| :--- | :--- | :--- |
| `<x-layout.admin>` | Shell layout admin utama | `title`, `appName`, slot: `actions`, `default` |
| `<x-layout.sidebar>` | Sidebar navigasi responsif | `appName`, slot: `logo`, `nav`, `footer` |
| `<x-layout.topbar>` | Bar atas navigasi dengan pencarian dan profil | slot: `search`, `actions` |

---

## 🛠️ Persyaratan Sistem

- **PHP**: ^8.3
- **Composer**: ^2.x
- **Node.js**: ^18.x atau ^20.x
- **NPM**: ^9.x atau ^10.x

---

## ⚙️ Instalasi & Menjalankan Proyek

1. **Clone repositori**:
   ```bash
   git clone <url-repository>
   cd laravel-ui-starter-kit
   ```

2. **Pasang dependensi PHP**:
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Pasang dependensi Node.js & bangun asset**:
   ```bash
   npm install
   npm run build
   ```

5. **Jalankan server pengembangan**:
   ```bash
   # Opsi 1: Menjalankan dev server Laravel dan Vite sekaligus
   composer run dev

   # Opsi 2: Menjalankan secara terpisah
   php artisan serve
   npm run dev
   ```

6. **Akses aplikasi di browser**:
   - Beranda: `http://localhost:8000`
   - Showcase Komponen: `http://localhost:8000/components`
   - Dashboard Admin: `http://localhost:8000/dashboard`

---

## 💡 Contoh Penggunaan Komponen

### Tombol (Button)
```blade
<x-ui.button variant="primary" size="md">
    Simpan Perubahan
</x-ui.button>

<x-ui.button variant="danger" size="sm" :loading="true">
    Menghapus...
</x-ui.button>
```

### Input Form
```blade
<x-form.input
    name="email"
    type="email"
    label="Alamat Email"
    placeholder="nama@domain.com"
    :required="true"
    helper="Kami tidak akan membagikan email Anda kepada siapa pun."
/>
```

### Modal Dialog
```blade
<x-ui.modal id="delete-confirm" title="Konfirmasi Hapus" size="md">
    <x-slot:trigger>
        <x-ui.button variant="danger">Hapus Akun</x-ui.button>
    </x-slot:trigger>

    <p class="text-sm text-text-muted">
        Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan.
    </p>

    <x-slot:footer>
        <x-ui.button variant="secondary" @click="open = false">Batal</x-ui.button>
        <x-ui.button variant="danger">Ya, Hapus</x-ui.button>
    </x-slot:footer>
</x-ui.modal>
```

### Grafik (Chart.js)
```blade
<x-ui.chart
    type="line"
    :labels="['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun']"
    :datasets="[
        [
            'label' => 'Penjualan 2026',
            'data' => [120, 190, 300, 500, 420, 650],
            'borderColor' => '#10b981',
            'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
            'fill' => true,
            'tension' => 0.4
        ]
    ]"
    :height="280"
/>
```

### Halaman dengan Layout Admin
```blade
<x-layout.admin title="Dashboard Ringkasan">
    <x-slot:actions>
        <x-ui.button variant="primary" size="sm">Ekspor PDF</x-ui.button>
    </x-slot:actions>

    <div class="space-y-6">
        <x-ui.card>
            <h4 class="font-semibold text-lg text-text">Konten Utama</h4>
            <p class="text-sm text-text-muted mt-1">Isi konten dashboard di sini.</p>
        </x-ui.card>
    </div>
</x-layout.admin>
```

---

## 🧪 Testing & Code Quality

- **Menjalankan Test (Pest)**:
  ```bash
  composer test
  # atau
  php artisan test
  ```

- **Format Kode (Laravel Pint)**:
  ```bash
  vendor/bin/pint
  ```

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [Lisensi MIT](LICENSE).
