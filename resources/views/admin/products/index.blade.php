@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-cyan-300">Catalog</p>
            <h1 class="font-display text-3xl font-bold text-white">Products</h1>
        </div>
        <a href="{{ route('admin.products.create') }}"
           class="rounded-full bg-cyan-500 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-400">
            Tambah Produk
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-white/10 bg-slate-900/80 shadow-2xl backdrop-blur">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-slate-200">
                <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-4 py-3">Thumbnail</th>
                        <th class="px-4 py-3">Nama Produk</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-4 py-3">
                                <img src="{{ $product->thumbnail_url }}"
                                     alt="{{ $product->nama_produk }}"
                                     class="h-14 w-20 rounded-lg object-cover ring-1 ring-white/20">
                            </td>
                            <td class="px-4 py-3 font-semibold text-white">{{ $product->nama_produk }}</td>
                            <td class="px-4 py-3">{{ $product->kategori }}</td>
                            <td class="px-4 py-3 font-semibold text-emerald-300">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="rounded-full bg-amber-500 px-3 py-1.5 text-xs font-semibold text-slate-950 transition hover:bg-amber-400">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-400">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-slate-400">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
