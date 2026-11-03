@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'value' => null,
    'placeholder' => null,
    'helper' => null,
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $selectId = $id ?? ($name ?: 'select-' . uniqid());
    $hasError = (bool) ($error || ($name && isset($errors) && $errors->has($name)));
    $errorMessage = $error ?: (($name && isset($errors)) ? $errors->first($name) : null);
    $selectedValue = old($name, $value);

    $baseClasses = 'block w-full appearance-none rounded text-sm transition-colors duration-150 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed bg-surface text-text focus:outline-none focus:ring-2 focus:ring-offset-2 py-2.5 pl-3.5 pr-10 cursor-pointer';

    $stateClasses = $hasError
        ? 'border border-danger-border focus:ring-danger-text focus:border-danger-border'
        : 'border border-border focus:ring-ring focus:border-primary';

    $classes = implode(' ', [
        $baseClasses,
        $stateClasses,
    ]);
@endphp

<div>
    @if ($label)
        <label for="{{ $selectId }}" class="block text-sm font-medium text-text mb-1.5">
            {{ $label }}
            @if ($required)
                <span class="text-danger-text" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    <div class="relative rounded">
        <select
            id="{{ $selectId }}"
            name="{{ $name }}"
            @disabled($disabled)
            @required($required)
            tabindex="0"
            @if ($hasError) aria-invalid="true" aria-describedby="{{ $selectId }}-error" @endif
            {{ $attributes->merge(['class' => $classes]) }}
        >
            @if ($placeholder)
                <option value="" disabled @selected($selectedValue === null || $selectedValue === '') class="text-text-muted">
                    {{ $placeholder }}
                </option>
            @endif

            {{ $slot }}
        </select>

        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-text-muted">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    @if ($hasError)
        <p class="mt-1.5 text-xs text-danger-text" id="{{ $selectId }}-error">
            {{ $errorMessage }}
        </p>
    @elseif ($helper)
        <p class="mt-1.5 text-xs text-text-muted">
            {{ $helper }}
        </p>
    @endif
</div>
