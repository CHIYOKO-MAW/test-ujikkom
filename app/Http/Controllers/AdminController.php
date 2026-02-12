<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $mostExpensive = Product::query()->orderByDesc('harga')->first();
        $averageHarga = (int) Product::query()->avg('harga');

        return view('admin.dashboard', [
            'totalProduk' => Product::query()->count(),
            'totalKategori' => Product::query()->distinct('kategori')->count('kategori'),
            'averageHarga' => $averageHarga,
            'mostExpensive' => $mostExpensive?->nama_produk ?? '-',
        ]);
    }

    public function index(Request $request): View
    {
        $keyword = trim((string) $request->query('q', ''));

        $products = Product::query()
            ->when($keyword !== '', function ($query) use ($keyword): void {
                $query->where(function ($subQuery) use ($keyword): void {
                    $subQuery
                        ->where('nama_produk', 'like', '%' . $keyword . '%')
                        ->orWhere('kategori', 'like', '%' . $keyword . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', [
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'thumbnail' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'kategori' => ['required', 'string', 'max:100'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        $validated['thumbnail'] = $request->file('thumbnail')->store('products', 'public');

        Product::query()->create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'kategori' => ['required', 'string', 'max:100'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
                Storage::disk('public')->delete($product->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        } else {
            unset($validated['thumbnail']);
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
