<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        return view('landing.index', [
            'products' => Product::query()->latest()->get(),
        ]);
    }

    public function show(Product $product): View
    {
        return view('landing.show', compact('product'));
    }
}
