# 🎨 Blade UI Kit — Style Guide

> Stack: Laravel 13 + Blade + Alpine.js + Tailwind CSS v4
> Vibe: Rounded & Friendly | Primary: Emerald | Dark Mode: ✅

---

## 📦 Tech Stack

- **Framework**: Laravel 13
- **Templating**: Blade Components (`<x-component>`)
- **CSS**: Tailwind CSS v4
- **JS Interactivity**: Alpine.js (no Vue, no React)
- **Icons**: Heroicons (via SVG inline atau blade-heroicons package)

---

## 🎨 Color Palette

### Primary — Emerald

| Token              | Light         | Dark          |
| ------------------ | ------------- | ------------- |
| Primary            | `emerald-600` | `emerald-500` |
| Primary Hover      | `emerald-700` | `emerald-400` |
| Primary Light (bg) | `emerald-50`  | `emerald-950` |
| Primary Text on bg | `emerald-700` | `emerald-300` |

### Neutral — Gray

| Token                 | Light               | Dark       |
| --------------------- | ------------------- | ---------- |
| Background            | `white` / `gray-50` | `gray-950` |
| Surface (card, input) | `white`             | `gray-900` |
| Border                | `gray-200`          | `gray-800` |
| Text Default          | `gray-900`          | `gray-50`  |
| Text Muted            | `gray-500`          | `gray-400` |
| Text Placeholder      | `gray-400`          | `gray-600` |

### Semantic Colors

| Variant           | Light bg     | Light text    | Dark bg       | Dark text     |
| ----------------- | ------------ | ------------- | ------------- | ------------- |
| Success           | `emerald-50` | `emerald-700` | `emerald-950` | `emerald-300` |
| Warning           | `yellow-50`  | `yellow-700`  | `yellow-950`  | `yellow-300`  |
| Danger            | `red-50`     | `red-700`     | `red-950`     | `red-300`     |
| Info              | `blue-50`    | `blue-700`    | `blue-950`    | `blue-300`    |
| Default/Secondary | `gray-100`   | `gray-700`    | `gray-800`    | `gray-300`    |

---

## 📐 Border Radius

> Vibe: Rounded & Friendly — semua elemen punya radius yang cukup terasa

| Token          | Value  | Dipakai di                      |
| -------------- | ------ | ------------------------------- |
| `rounded-xl`   | 12px   | Card, Modal, Dropdown           |
| `rounded-lg`   | 8px    | Button, Input, Select, Textarea |
| `rounded-md`   | 6px    | Badge, Alert (inner)            |
| `rounded-full` | 9999px | Avatar, Pill badge, Toggle      |

---

## 📝 Typography

### Font

- **Font family**: Inter (Google Fonts) — fallback: `ui-sans-serif, system-ui, sans-serif`
- **Base size**: `text-sm` (14px) untuk body & form elements
- **Line height**: `leading-relaxed` untuk paragraf

### Text Scale

| Usage           | Class                                                     |
| --------------- | --------------------------------------------------------- |
| Page title      | `text-2xl font-bold text-gray-900 dark:text-gray-50`      |
| Section heading | `text-lg font-semibold text-gray-900 dark:text-gray-50`   |
| Card title      | `text-base font-semibold text-gray-900 dark:text-gray-50` |
| Body / default  | `text-sm text-gray-700 dark:text-gray-300`                |
| Label (form)    | `text-sm font-medium text-gray-700 dark:text-gray-300`    |
| Helper / hint   | `text-xs text-gray-500 dark:text-gray-400`                |
| Error message   | `text-xs text-red-600 dark:text-red-400`                  |
| Placeholder     | `placeholder-gray-400 dark:placeholder-gray-600`          |

---

## 🔘 Button

### Sizes

| Size           | Class                   |
| -------------- | ----------------------- |
| `sm`           | `px-3 py-1.5 text-xs`   |
| `md` (default) | `px-4 py-2 text-sm`     |
| `lg`           | `px-5 py-2.5 text-base` |

### Variants

| Variant       | Light                                                   | Dark                                                     |
| ------------- | ------------------------------------------------------- | -------------------------------------------------------- |
| `primary`     | `bg-emerald-600 text-white hover:bg-emerald-700`        | `bg-emerald-500 text-white hover:bg-emerald-400`         |
| `outline`     | `border border-gray-300 text-gray-700 hover:bg-gray-50` | `border border-gray-700 text-gray-300 hover:bg-gray-800` |
| `ghost`       | `text-gray-700 hover:bg-gray-100`                       | `text-gray-300 hover:bg-gray-800`                        |
| `destructive` | `bg-red-600 text-white hover:bg-red-700`                | `bg-red-500 text-white hover:bg-red-400`                 |
| `secondary`   | `bg-gray-100 text-gray-700 hover:bg-gray-200`           | `bg-gray-800 text-gray-300 hover:bg-gray-700`            |

### Rules

- Semua button: `rounded-lg font-medium transition-colors duration-150 inline-flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2`
- Loading state: tampilkan spinner SVG di kiri, disable button

---

## 📋 Form Elements

### Input / Textarea / Select

**Base class (semua form element):**

```
w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
placeholder-gray-400 shadow-sm transition
focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20
disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
dark:placeholder-gray-600
dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20
dark:disabled:bg-gray-800
```

**Error state (tambahan):**

```
border-red-500 focus:border-red-500 focus:ring-red-500/20
dark:border-red-500
```

### Label

```
block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5
```

### Helper text

```
mt-1.5 text-xs text-gray-500 dark:text-gray-400
```

### Error message

```
mt-1.5 text-xs text-red-600 dark:text-red-400
```

---

## 🏷️ Badge

### Base

```
inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
```

### Variants

| Variant   | Light                            | Dark                              |
| --------- | -------------------------------- | --------------------------------- |
| `default` | `bg-gray-100 text-gray-700`      | `bg-gray-800 text-gray-300`       |
| `success` | `bg-emerald-50 text-emerald-700` | `bg-emerald-950 text-emerald-300` |
| `warning` | `bg-yellow-50 text-yellow-700`   | `bg-yellow-950 text-yellow-300`   |
| `danger`  | `bg-red-50 text-red-700`         | `bg-red-950 text-red-300`         |
| `info`    | `bg-blue-50 text-blue-700`       | `bg-blue-950 text-blue-300`       |

---

## 🃏 Card

### Structure

```blade
<div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
    {{-- Header (optional) --}}
    <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
        <h3>Title</h3>
    </div>
    {{-- Content --}}
    <div class="px-6 py-5">
        ...
    </div>
    {{-- Footer (optional) --}}
    <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
        ...
    </div>
</div>
```

---

## 🔔 Alert

### Base

```
flex items-start gap-3 rounded-xl p-4 text-sm
```

### Variants

| Variant   | Light                                                      | Dark                                                        |
| --------- | ---------------------------------------------------------- | ----------------------------------------------------------- |
| `success` | `bg-emerald-50 text-emerald-800 border border-emerald-200` | `bg-emerald-950 text-emerald-200 border border-emerald-800` |
| `warning` | `bg-yellow-50 text-yellow-800 border border-yellow-200`    | `bg-yellow-950 text-yellow-200 border border-yellow-800`    |
| `danger`  | `bg-red-50 text-red-800 border border-red-200`             | `bg-red-950 text-red-200 border border-red-800`             |
| `info`    | `bg-blue-50 text-blue-800 border border-blue-200`          | `bg-blue-950 text-blue-200 border border-blue-800`          |

---

## 🪟 Modal

### Overlay

```
fixed inset-0 z-50 flex items-center justify-center
bg-black/50 backdrop-blur-sm
```

### Panel

```
w-full max-w-md rounded-2xl bg-white p-6 shadow-xl
dark:bg-gray-900
```

### Behavior (Alpine.js)

```html
<div x-data="{ open: false }">
    <!-- Trigger -->
    <button @click="open = true">Open</button>

    <!-- Overlay -->
    <div x-show="open" x-transition @click.self="open = false">
        <!-- Panel -->
        <div @click.stop>...</div>
    </div>
</div>
```

---

## 🌗 Dark Mode

### Setup (Tailwind v4)

```css
/* app.css */
@import "tailwindcss";

@custom-variant dark (&:where(.dark, .dark *));
```

### Toggle mechanism

Pakai Alpine.js + localStorage:

```html
<html
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    :class="{ 'dark': dark }"
>
    <button
        @click="
    dark = !dark;
    localStorage.setItem('theme', dark ? 'dark' : 'light')
"
    >
        Toggle Dark
    </button>
</html>
```

---

## ♿ Accessibility Rules

- Semua form element HARUS punya `id` yang match sama `for` label-nya
- Button dengan icon only HARUS punya `aria-label`
- Modal HARUS punya `role="dialog"` dan `aria-modal="true"`
- Focus trap di modal saat terbuka
- Semua interactive element HARUS bisa di-tab
- Color contrast minimum 4.5:1 untuk text normal

---

## 📁 Konvensi Penamaan Komponen

```
// Single word
<x-button>
<x-input>
<x-badge>
<x-card>
<x-modal>
<x-alert>
<x-avatar>
<x-spinner>
<x-tooltip>

// Multi word (pakai titik)
<x-form.input>
<x-form.select>
<x-form.textarea>
<x-form.checkbox>
<x-card.header>
<x-card.content>
<x-card.footer>
```

---

## 🔧 Props Convention

```php
// Selalu gunakan @props() di atas komponen
@props([
    'variant' => 'primary',   // dengan default value
    'size' => 'md',
    'disabled' => false,
    'label' => null,          // null kalau optional
])

// Selalu gunakan $attributes->merge() untuk class
// agar user bisa tambah class dari luar:
// <x-button class="w-full"> → works!
{{ $attributes->merge(['class' => "base-class {$variantClass}"]) }}
```

---

## 💡 Contoh Pemakaian Lengkap

```blade
{{-- Button --}}
<x-button>Submit</x-button>
<x-button variant="outline" size="sm">Cancel</x-button>
<x-button variant="destructive" :loading="true">Deleting...</x-button>
<x-button variant="primary" class="w-full">Login</x-button>

{{-- Input --}}
<x-input label="Email" name="email" type="email" placeholder="john@example.com" />
<x-input label="Password" name="password" type="password" :error="$errors->first('password')" />
<x-input label="Username" name="username" helper="Minimal 3 karakter" />

{{-- Badge --}}
<x-badge>Default</x-badge>
<x-badge variant="success">Paid</x-badge>
<x-badge variant="danger">Overdue</x-badge>
<x-badge variant="warning">Pending</x-badge>

{{-- Alert --}}
<x-alert variant="success" title="Berhasil!">Data berhasil disimpan.</x-alert>
<x-alert variant="danger" title="Error!" :dismissible="true">Terjadi kesalahan.</x-alert>

{{-- Card --}}
<x-card>
    <x-slot:header>Judul Card</x-slot:header>
    Konten card di sini.
    <x-slot:footer>
        <x-button size="sm">Action</x-button>
    </x-slot:footer>
</x-card>

{{-- Modal --}}
<x-modal id="delete-modal" title="Hapus Data?">
    <x-slot:trigger>
        <x-button variant="destructive">Hapus</x-button>
    </x-slot:trigger>
    Yakin ingin menghapus data ini?
    <x-slot:footer>
        <x-button variant="outline">Batal</x-button>
        <x-button variant="destructive">Ya, Hapus</x-button>
    </x-slot:footer>
</x-modal>
```
