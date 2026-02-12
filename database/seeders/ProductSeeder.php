<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->insert([
            [
                'thumbnail' => 'products/iphone-13-pro.svg',
                'kategori' => 'Iphone',
                'nama_produk' => 'Iphone 13 Pro',
                'harga' => 12000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'thumbnail' => 'products/samsung-x-flip.svg',
                'kategori' => 'Samsung',
                'nama_produk' => 'Samsung X Flip',
                'harga' => 20000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'thumbnail' => 'products/xiaomi-redmi-note-11-pro.svg',
                'kategori' => 'Xiaomi',
                'nama_produk' => 'Xiaomi Redmi Note 11 Pro',
                'harga' => 3200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
