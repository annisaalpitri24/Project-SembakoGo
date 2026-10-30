<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->orderBy('nama_kategori')
            ->get();

        $products = Product::with(['category', 'store'])
            ->whereHas('store.user', function ($query) {
                $query->where('status', 'active');
            })
            ->when($request->filled('kategori'), function ($query) use ($request) {
                $query->where('category_id', $request->kategori);
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('welcome', compact('categories', 'products'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'store.user']);

        abort_unless(
            $product->store &&
                $product->store->user &&
                $product->store->user->status === 'active',
            404
        );

        return view('produk-detail', compact('product'));
    }
}
