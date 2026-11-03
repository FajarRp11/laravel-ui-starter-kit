@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'value' => '1',
    'checked' => false,
    'disabled' => false,
    'helper' => null,
    'error' => null,
])

@php
    $checkboxId = $id ?? ($name ?: 'checkbox-' . uniqid());
    $hasError = (bool) ($error || ($name && isset($errors) && $errors->has($name)));
    $errorMessage = $error ?: (($name && isset($errors)) ? $errors->first($name) : null);
    $isChecked = (bool) old($name, $checked);

    $baseClasses = 'h-4 w-4 rounded-sm transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-primary disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer';

    $stateClasses = $hasError
        ? 'border-danger-border'
        : 'border-border bg-surface';

    $classes = implode(' ', [
        $baseClasses,
        $stateClasses,
    ]);
@endphp

<div>
    <div class="flex items-start">
        <div class="flex h-5 items-center">
            <input
                id="{{ $checkboxId }}"
                name="{{ $name }}"
                type="checkbox"
                value="{{ $value }}"
                @checked($isChecked)
                @disabled($disabled)
                tabindex="0"
                @if ($hasError) aria-invalid="true" aria-describedby="{{ $checkboxId }}-error" @endif
                {{ $attributes->merge(['class' => $classes]) }}
            />
        </div>

        @if ($label || $slot->isNotEmpty())
            <div class="ml-3 text-sm leading-5">
                <label for="{{ $checkboxId }}" class="font-medium text-text cursor-pointer">
                    {{ $label ?? $slot }}
                </label>

                @if ($helper && !$hasError)
                    <p class="text-xs text-text-muted">
                        {{ $helper }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    @if ($hasError)
        <p class="mt-1.5 text-xs text-danger-text" id="{{ $checkboxId }}-error">
            {{ $errorMessage }}
        </p>
    @endif
</div>
