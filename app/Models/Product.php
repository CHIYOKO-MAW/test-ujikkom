<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'thumbnail',
        'kategori',
        'nama_produk',
        'harga',
    ];

    protected $appends = [
        'thumbnail_url',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        if (! $this->thumbnail) {
            return asset('images/placeholder-product.svg');
        }

        if (str_starts_with($this->thumbnail, 'http://') || str_starts_with($this->thumbnail, 'https://')) {
            return $this->thumbnail;
        }

        if (Storage::disk('public')->exists($this->thumbnail)) {
            return asset('storage/' . $this->thumbnail);
        }

        if (file_exists(public_path($this->thumbnail))) {
            return asset($this->thumbnail);
        }

        $basename = basename($this->thumbnail);
        $publicDummyPath = 'images/products/' . $basename;
        if (file_exists(public_path($publicDummyPath))) {
            return asset($publicDummyPath);
        }

        return asset('images/placeholder-product.svg');
    }
}
