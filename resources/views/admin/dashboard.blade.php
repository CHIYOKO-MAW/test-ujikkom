@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-cyan-300">Admin Analytics</p>
            <h1 class="font-display text-3xl font-bold text-white md:text-4xl">Control Center</h1>
        </div>
        <a href="{{ route('admin.products.index') }}"
           class="rounded-full border border-cyan-400/40 bg-cyan-500/20 px-4 py-2 text-sm font-semibold text-cyan-100 transition hover:bg-cyan-500/30">
            Manage Product
        </a>
    </div>

    <section class="mb-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-2xl border border-white/10 bg-gradient-to-br from-slate-900 to-slate-800 p-5 shadow-xl">
            <p class="text-xs font-bold uppercase tracking-wider text-cyan-300">Total Products</p>
            <p class="mt-2 text-3xl font-bold text-white">{{ $totalProduk }}</p>
            <p class="mt-2 text-xs text-slate-400">Active catalog items</p>
        </article>
        <article class="rounded-2xl border border-white/10 bg-gradient-to-br from-slate-900 to-slate-800 p-5 shadow-xl">
            <p class="text-xs font-bold uppercase tracking-wider text-emerald-300">Total Categories</p>
            <p class="mt-2 text-3xl font-bold text-white">{{ $totalKategori }}</p>
            <p class="mt-2 text-xs text-slate-400">Unique category labels</p>
        </article>
        <article class="rounded-2xl border border-white/10 bg-gradient-to-br from-slate-900 to-slate-800 p-5 shadow-xl">
            <p class="text-xs font-bold uppercase tracking-wider text-fuchsia-300">Average Price</p>
            <p class="mt-2 text-3xl font-bold text-white">Rp {{ number_format($averageHarga, 0, ',', '.') }}</p>
            <p class="mt-2 text-xs text-slate-400">Rata-rata harga seluruh produk</p>
        </article>
        <article class="rounded-2xl border border-white/10 bg-gradient-to-br from-slate-900 to-slate-800 p-5 shadow-xl">
            <p class="text-xs font-bold uppercase tracking-wider text-amber-300">Top Product</p>
            <p class="mt-2 text-xl font-bold text-white">{{ $mostExpensive }}</p>
            <p class="mt-2 text-xs text-slate-400">Produk dengan harga tertinggi</p>
        </article>
    </section>

    <section class="grid gap-6 xl:grid-cols-3">
        <article class="rounded-2xl border border-white/10 bg-slate-900/80 p-5 shadow-xl xl:col-span-2">
            <h2 class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-cyan-300">Traffic & Sales Trend</h2>
            <div class="h-72">
                <canvas id="lineChart"></canvas>
            </div>
        </article>

        <article class="rounded-2xl border border-white/10 bg-slate-900/80 p-5 shadow-xl">
            <h2 class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-cyan-300">Source Mix</h2>
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
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Penjualan (x100rb)',
                        data: [6, 9, 12, 10, 14, 17, 15, 20, 22, 21, 25, 29],
                        borderColor: '#22D3EE',
                        backgroundColor: 'rgba(34, 211, 238, 0.16)',
                        fill: true,
                        tension: 0.42,
                        pointRadius: 3,
                        pointBackgroundColor: '#22D3EE'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0F172A',
                            titleColor: '#E2E8F0',
                            bodyColor: '#E2E8F0'
                        }
                    },
                    scales: {
                        x: { ticks: { color: '#CBD5E1' }, grid: { color: 'rgba(148, 163, 184, 0.08)' } },
                        y: { beginAtZero: true, ticks: { color: '#CBD5E1' }, grid: { color: 'rgba(148, 163, 184, 0.12)' } }
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
                        data: [52, 29, 19],
                        backgroundColor: ['#22D3EE', '#34D399', '#A78BFA'],
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
                                boxWidth: 8,
                                color: '#CBD5E1'
                            }
                        }
                    }
                }
            });
        }
    </script>
@endpush
