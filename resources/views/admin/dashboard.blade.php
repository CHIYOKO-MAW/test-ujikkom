@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-display text-3xl font-bold text-slate-800">Dashboard</h1>
        <a href="{{ route('admin.products.index') }}"
           class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">
            Generate Report
        </a>
    </div>

    <section class="mb-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-xl border-l-4 border-blue-600 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-blue-600">Products</p>
            <p class="mt-2 text-2xl font-bold text-slate-800">{{ $totalProduk }}</p>
        </article>
        <article class="rounded-xl border-l-4 border-emerald-500 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-emerald-600">Categories</p>
            <p class="mt-2 text-2xl font-bold text-slate-800">{{ $totalKategori }}</p>
        </article>
        <article class="rounded-xl border-l-4 border-cyan-500 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-cyan-600">Tasks</p>
            <p class="mt-2 text-2xl font-bold text-slate-800">50%</p>
            <div class="mt-3 h-2 w-full rounded-full bg-slate-200">
                <div class="h-2 w-1/2 rounded-full bg-cyan-500"></div>
            </div>
        </article>
        <article class="rounded-xl border-l-4 border-amber-500 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-amber-600">Pending Requests</p>
            <p class="mt-2 text-2xl font-bold text-slate-800">{{ max(0, 20 - $totalProduk) }}</p>
        </article>
    </section>

    <section class="grid gap-6 xl:grid-cols-3">
        <article class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">
            <h2 class="mb-4 text-sm font-bold uppercase tracking-wide text-blue-600">Earnings Overview</h2>
            <div class="h-72">
                <canvas id="lineChart"></canvas>
            </div>
        </article>

        <article class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="mb-4 text-sm font-bold uppercase tracking-wide text-blue-600">Revenue Sources</h2>
            <div class="mx-auto h-72 max-w-[280px]">
                <canvas id="donutChart"></canvas>
            </div>
        </article>
    </section>
@endsection

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
@endpush

@push('scripts')
    <script>
        const lineCtx = document.getElementById('lineChart');
        if (lineCtx) {
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Sales (in K)',
                        data: [2, 10, 6, 15, 11, 20, 16, 25, 20, 30, 26, 40],
                        borderColor: '#2563EB',
                        backgroundColor: 'rgba(37, 99, 235, 0.15)',
                        fill: true,
                        tension: 0.35,
                        pointRadius: 3,
                        pointBackgroundColor: '#2563EB'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { beginAtZero: true, grid: { color: '#E2E8F0' } }
                    }
                }
            });
        }

        const donutCtx = document.getElementById('donutChart');
        if (donutCtx) {
            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Direct', 'Social', 'Referral'],
                    datasets: [{
                        data: [55, 30, 15],
                        backgroundColor: ['#2563EB', '#10B981', '#06B6D4'],
                        borderWidth: 0
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                boxWidth: 8
                            }
                        }
                    }
                }
            });
        }
    </script>
@endpush
