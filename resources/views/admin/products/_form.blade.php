@php
    $isEdit = isset($product);
    $thumbnailUrl = $isEdit ? $product->thumbnail_url : asset('images/placeholder-product.svg');
@endphp

<div class="grid gap-5 md:grid-cols-2">
    <div class="space-y-2">
        <label for="thumbnail" class="block text-sm font-semibold text-slate-700">
            Thumbnail {{ $isEdit ? '(Opsional)' : '' }}
        </label>
        <input type="file"
               id="thumbnail"
               name="thumbnail"
               accept=".jpg,.jpeg,.png,.webp,.svg"
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-blue-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-blue-700">
        @if ($isEdit)
            <p class="text-xs text-slate-500">Kosongkan jika tidak ingin mengganti gambar.</p>
        @endif
    </div>

    <div>
        <p class="mb-2 block text-sm font-semibold text-slate-700">Preview</p>
        <img src="{{ $thumbnailUrl }}" alt="Preview Thumbnail" class="h-40 w-full rounded-lg object-cover ring-1 ring-slate-200">
    </div>
</div>

<div class="mt-5 space-y-4">
    <div>
        <label for="nama_produk" class="mb-2 block text-sm font-semibold text-slate-700">Nama Produk</label>
        <input type="text"
               id="nama_produk"
               name="nama_produk"
               value="{{ old('nama_produk', $product->nama_produk ?? '') }}"
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
    </div>

    <div>
        <label for="kategori" class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
        <input type="text"
               id="kategori"
               name="kategori"
               value="{{ old('kategori', $product->kategori ?? '') }}"
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
    </div>

    <div>
        <label for="harga" class="mb-2 block text-sm font-semibold text-slate-700">Harga</label>
        <input type="number"
               id="harga"
               name="harga"
               min="0"
               value="{{ old('harga', $product->harga ?? '') }}"
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
    </div>
</div>

<div class="mt-6 flex items-center gap-2">
    <button type="submit"
            class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">
        Simpan
    </button>
    <a href="{{ route('admin.products.index') }}"
       class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
        Batal
    </a>
</div>
