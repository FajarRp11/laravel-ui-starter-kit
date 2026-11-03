@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'helper' => null,
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $inputId = $id ?? ($name ?: 'input-' . uniqid());
    $hasError = (bool) ($error || ($name && isset($errors) && $errors->has($name)));
    $errorMessage = $error ?: (($name && isset($errors)) ? $errors->first($name) : null);

    $baseClasses = 'block w-full rounded text-sm transition-colors duration-150 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed bg-surface text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-offset-2 py-2.5';

    $stateClasses = $hasError
        ? 'border border-danger-border focus:ring-danger-text focus:border-danger-border'
        : 'border border-border focus:ring-ring focus:border-primary';

    $paddingClasses = implode(' ', [
        isset($prefix) ? 'pl-10' : 'px-3.5',
        isset($suffix) ? 'pr-10' : 'px-3.5',
    ]);

    $classes = implode(' ', [
        $baseClasses,
        $stateClasses,
        $paddingClasses,
    ]);
@endphp

<div>
    @if ($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-text mb-1.5">
            {{ $label }}
            @if ($required)
                <span class="text-danger-text" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    <div class="relative rounded">
        @if (isset($prefix))
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-text-muted">
                {{ $prefix }}
            </div>
        @endif

        <input
            id="{{ $inputId }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @disabled($disabled)
            @required($required)
            tabindex="0"
            @if ($hasError) aria-invalid="true" aria-describedby="{{ $inputId }}-error" @endif
            {{ $attributes->merge(['class' => $classes]) }}
        />

        @if (isset($suffix))
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-text-muted">
                {{ $suffix }}
            </div>
        @endif
    </div>

    @if ($hasError)
        <p class="mt-1.5 text-xs text-danger-text" id="{{ $inputId }}-error">
            {{ $errorMessage }}
        </p>
    @elseif ($helper)
        <p class="mt-1.5 text-xs text-text-muted">
            {{ $helper }}
        </p>
    @endif
</div>
