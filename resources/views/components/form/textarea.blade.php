@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'value' => null,
    'rows' => 4,
    'placeholder' => null,
    'helper' => null,
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $textareaId = $id ?? ($name ?: 'textarea-' . uniqid());
    $hasError = (bool) ($error || ($name && isset($errors) && $errors->has($name)));
    $errorMessage = $error ?: (($name && isset($errors)) ? $errors->first($name) : null);

    $baseClasses = 'block w-full rounded text-sm transition-colors duration-150 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed bg-surface text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-offset-2 px-3.5 py-2.5';

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
        <label for="{{ $textareaId }}" class="block text-sm font-medium text-text mb-1.5">
            {{ $label }}
            @if ($required)
                <span class="text-danger-text" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    <textarea
        id="{{ $textareaId }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @disabled($disabled)
        @required($required)
        tabindex="0"
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $textareaId }}-error" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >{{ old($name, $value ?? $slot->toHtml()) }}</textarea>

    @if ($hasError)
        <p class="mt-1.5 text-xs text-danger-text" id="{{ $textareaId }}-error">
            {{ $errorMessage }}
        </p>
    @elseif ($helper)
        <p class="mt-1.5 text-xs text-text-muted">
            {{ $helper }}
        </p>
    @endif
</div>
