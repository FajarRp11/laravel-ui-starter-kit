@props([
    'striped' => false,
])

<div class="w-full overflow-x-auto rounded-lg border border-border bg-surface shadow-sm">
    <table {{ $attributes->merge(['class' => 'w-full text-left text-sm text-text divide-y divide-border']) }}>
        @if (isset($head))
            <thead class="bg-surface-muted/80 text-xs font-semibold uppercase tracking-wider text-text-muted">
                {{ $head }}
            </thead>
        @endif

        <tbody class="divide-y divide-border {{ $striped ? '[&>tr:nth-child(even)]:bg-surface-muted/50' : '' }} [&>tr]:transition-colors [&>tr]:duration-150 [&>tr:hover]:bg-surface-muted/60">
            {{ $slot }}
        </tbody>

        @if (isset($foot))
            <tfoot class="border-t border-border bg-surface-muted/80 font-semibold text-text">
                {{ $foot }}
            </tfoot>
        @endif
    </table>
</div>
