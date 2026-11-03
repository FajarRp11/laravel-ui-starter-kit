@props([
    'type' => 'line',
    'labels' => [],
    'datasets' => [],
    'options' => [],
    'height' => 300,
])

<div
    x-data="{
        chart: null,
        initChart() {
            const render = () => {
                if (typeof Chart === 'undefined') {
                    setTimeout(render, 100);
                    return;
                }
                if (this.chart) {
                    this.chart.destroy();
                }

                const ctx = this.$refs.canvas.getContext('2d');
                const isDark = document.documentElement.classList.contains('dark');
                const textColor = isDark ? '#9ca3af' : '#6b7280';
                const gridColor = isDark ? 'rgba(255, 255, 255, 0.08)' : 'rgba(0, 0, 0, 0.06)';

                const isRadial = ['pie', 'doughnut', 'polarArea', 'radar'].includes('{{ $type }}');

                const defaultOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: {
                                color: textColor,
                                font: {
                                    family: 'inherit',
                                    size: 12
                                }
                            }
                        }
                    },
                    scales: isRadial ? {} : {
                        x: {
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'inherit',
                                    size: 11
                                }
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'inherit',
                                    size: 11
                                }
                            },
                            grid: {
                                color: gridColor
                            }
                        }
                    }
                };

                const customOptions = {{ Js::from($options) }};
                const mergedOptions = Object.assign({}, defaultOptions, customOptions);

                this.chart = new Chart(ctx, {
                    type: '{{ $type }}',
                    data: {
                        labels: {{ Js::from($labels) }},
                        datasets: {{ Js::from($datasets) }}
                    },
                    options: mergedOptions
                });

                // Auto update chart when dark mode toggled
                const observer = new MutationObserver(() => {
                    if (!this.chart) return;
                    const darkNow = document.documentElement.classList.contains('dark');
                    const tColor = darkNow ? '#9ca3af' : '#6b7280';
                    const gColor = darkNow ? 'rgba(255, 255, 255, 0.08)' : 'rgba(0, 0, 0, 0.06)';

                    if (this.chart.options.plugins?.legend?.labels) {
                        this.chart.options.plugins.legend.labels.color = tColor;
                    }
                    if (this.chart.options.scales?.x) {
                        this.chart.options.scales.x.ticks.color = tColor;
                        this.chart.options.scales.x.grid.color = gColor;
                    }
                    if (this.chart.options.scales?.y) {
                        this.chart.options.scales.y.ticks.color = tColor;
                        this.chart.options.scales.y.grid.color = gColor;
                    }
                    this.chart.update();
                });
                observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
            };

            render();
        }
    }"
    x-init="initChart()"
    {{ $attributes->merge(['class' => 'w-full relative']) }}
    style="height: {{ is_numeric($height) ? "{$height}px" : $height }};"
>
    <canvas x-ref="canvas"></canvas>
</div>
