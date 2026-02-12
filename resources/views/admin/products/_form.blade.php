@php
    $isEdit = isset($product);
    $thumbnailUrl = $isEdit ? $product->thumbnail_url : asset('images/placeholder-product.svg');
@endphp

<div class="grid gap-5 md:grid-cols-2">
    <div class="space-y-2">
        <label for="thumbnail" class="block text-sm font-semibold text-slate-200">
            Thumbnail {{ $isEdit ? '(Opsional)' : '' }}
        </label>
        <input type="file"
               id="thumbnail"
               name="thumbnail"
               accept=".jpg,.jpeg,.png,.webp,.svg"
               class="w-full rounded-lg border border-white/20 bg-slate-900/70 px-3 py-2 text-sm text-slate-200 file:mr-3 file:rounded file:border-0 file:bg-cyan-500/20 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-cyan-200">
        @if ($isEdit)
            <p class="text-xs text-slate-400">Kosongkan jika tidak ingin mengganti gambar.</p>
        @endif
    </div>

    <div>
        <p class="mb-2 block text-sm font-semibold text-slate-200">Preview</p>
        <img src="{{ $thumbnailUrl }}" alt="Preview Thumbnail" class="h-40 w-full rounded-lg object-cover ring-1 ring-white/20">
    </div>
</div>

<div class="mt-5 space-y-4">
    <div>
        <label for="nama_produk" class="mb-2 block text-sm font-semibold text-slate-200">Nama Produk</label>
        <input type="text"
               id="nama_produk"
               name="nama_produk"
               value="{{ old('nama_produk', $product->nama_produk ?? '') }}"
               class="w-full rounded-lg border border-white/20 bg-slate-900/70 px-3 py-2 text-sm text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20">
    </div>

    <div>
        <label for="kategori" class="mb-2 block text-sm font-semibold text-slate-200">Kategori</label>
        <input type="text"
               id="kategori"
               name="kategori"
               value="{{ old('kategori', $product->kategori ?? '') }}"
               class="w-full rounded-lg border border-white/20 bg-slate-900/70 px-3 py-2 text-sm text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20">
    </div>

    <div>
        <label for="harga" class="mb-2 block text-sm font-semibold text-slate-200">Harga</label>
        <input type="number"
               id="harga"
               name="harga"
               min="0"
               value="{{ old('harga', $product->harga ?? '') }}"
               class="w-full rounded-lg border border-white/20 bg-slate-900/70 px-3 py-2 text-sm text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20">
    </div>
</div>

<div class="mt-6 flex items-center gap-2">
    <button type="submit"
            class="rounded-full bg-cyan-500 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-400">
        Simpan
    </button>
    <a href="{{ route('admin.products.index') }}"
       class="rounded-full border border-white/25 px-4 py-2 text-sm font-semibold text-slate-100 transition hover:bg-white/10">
        Batal
    </a>
</div>
