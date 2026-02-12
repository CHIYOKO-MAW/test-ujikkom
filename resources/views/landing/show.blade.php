@extends('layouts.landing')

@section('content')
    <nav class="mb-6 text-sm text-slate-300">
        <a href="{{ route('landing.index') }}" class="hover:text-white">Home</a>
        <span class="mx-2">/</span>
        <span>Produk</span>
        <span class="mx-2">/</span>
        <span class="text-white">{{ $product->nama_produk }}</span>
    </nav>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        <section class="lg:col-span-5">
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-2xl backdrop-blur">
                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->nama_produk }}" class="h-full w-full object-cover">
            </div>
        </section>

        <section class="space-y-4 lg:col-span-4">
            <p class="inline-flex rounded-full bg-blue-500/20 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-blue-200">
                {{ $product->kategori }}
            </p>
            <h1 class="font-display text-3xl font-extrabold text-white md:text-4xl">{{ $product->nama_produk }}</h1>
            <p class="text-3xl font-extrabold text-emerald-400 md:text-5xl">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </p>
            <div class="flex items-center gap-2 text-sm text-amber-400">
                <span>★★★★☆</span>
                <span class="text-slate-300">(4.0/5 - 120 ulasan)</span>
            </div>
            <p class="leading-relaxed text-slate-300">
                Produk elektronik berkualitas dengan performa optimal untuk aktivitas harian. Desain modern, fitur lengkap,
                dan dukungan penggunaan jangka panjang untuk kebutuhan personal maupun profesional.
            </p>
            <ul class="space-y-2 text-sm text-slate-200">
                <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> Garansi resmi 1 tahun</li>
                <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> Original dan tersegel</li>
                <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> Pengiriman cepat seluruh Indonesia</li>
            </ul>
        </section>

        <aside class="lg:col-span-3">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5 shadow-2xl backdrop-blur lg:sticky lg:top-24">
                <p class="text-sm text-slate-300">Harga</p>
                <p class="mt-1 text-2xl font-bold text-emerald-400">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                <div class="mt-4">
                    <label for="qty" class="mb-2 block text-sm font-semibold text-white">Quantity</label>
                    <input id="qty"
                           type="number"
                           min="1"
                           value="1"
                           class="w-full rounded-lg border border-white/20 bg-slate-900/60 px-3 py-2 text-white outline-none focus:border-blue-400">
                </div>

                <button type="button"
                        class="mt-4 w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">
                    Beli Sekarang
                </button>
                <button type="button"
                        class="mt-2 w-full rounded-lg border border-white/25 px-4 py-2 text-sm font-semibold text-slate-100 transition hover:bg-white/10">
                    Tanya Produk
                </button>
            </div>
        </aside>
    </div>
@endsection
