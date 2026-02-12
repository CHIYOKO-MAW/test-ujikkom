@extends('layouts.landing')

@section('content')
    <section class="relative mb-10 overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 p-8 shadow-2xl md:p-12">
        <div class="absolute -right-12 -top-14 h-48 w-48 rounded-full bg-cyan-400/20 blur-2xl"></div>
        <div class="absolute -bottom-10 left-10 h-40 w-40 rounded-full bg-emerald-400/20 blur-2xl"></div>
        <p class="mb-2 text-xs font-bold uppercase tracking-[0.25em] text-blue-200">Premium Mobile Catalog</p>
        <h1 class="font-display max-w-3xl text-3xl font-extrabold leading-tight text-white md:text-5xl">
            Upgrade Gadget Kamu Dengan Koleksi Smartphone Terbaik 2026
        </h1>
        <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-200 md:text-base">
            Landing page ini menggunakan data produk yang sama dari panel admin. Setiap produk dilengkapi kategori,
            harga rupiah, dan halaman detail dengan struktur responsive.
        </p>
        <div class="mt-6 flex flex-wrap items-center gap-3 text-sm">
            <span class="rounded-full bg-white/10 px-4 py-2 font-semibold text-slate-100">3 Produk Wajib</span>
            <span class="rounded-full bg-white/10 px-4 py-2 font-semibold text-slate-100">Responsive 375/768/1024</span>
        </div>
    </section>

    <section>
        <div class="mb-5 flex items-end justify-between">
            <h2 class="font-display text-2xl font-bold text-white md:text-3xl">Featured Products</h2>
            <p class="text-sm text-slate-300">{{ $products->count() }} items</p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($products as $product)
                <article class="group overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-xl backdrop-blur">
                    <div class="relative overflow-hidden">
                        <img src="{{ $product->thumbnail_url }}"
                         alt="{{ $product->nama_produk }}"
                         class="h-52 w-full object-cover transition duration-300 group-hover:scale-105">
                        <span class="absolute left-3 top-3 rounded-full bg-blue-600/90 px-3 py-1 text-xs font-semibold text-white">
                            {{ $product->kategori }}
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-white">{{ $product->nama_produk }}</h3>
                        <p class="mt-2 text-xl font-extrabold text-emerald-400">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('landing.show', $product) }}"
                           class="mt-4 inline-flex rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">
                            Lihat Detail
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-2xl border border-white/10 bg-white/5 p-6 text-center text-slate-300">
                    Produk belum tersedia.
                </div>
            @endforelse
        </div>
    </section>
@endsection
