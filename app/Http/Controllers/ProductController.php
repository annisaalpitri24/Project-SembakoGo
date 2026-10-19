<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    private function getStore()
    {
        $store = Auth::user()->store;

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');

        return $store;
    }

    public function index()
    {
        $store = $this->getStore();

        $products = Product::with('category')
            ->where('store_id', $store->id)
            ->latest()
            ->paginate(10);

        return view('penjual.produk.index', compact('products'));
    }

    public function create()
    {
        $store = $this->getStore();

        $categories = Category::where('store_id', $store->id)
            ->orderBy('nama_kategori')
            ->get();

        return view('penjual.produk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $store = $this->getStore();

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('store_id', $store->id),
            ],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'harga' => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('produk', 'public');
        }

        $validated['store_id'] = $store->id;

        Product::create($validated);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $store = $this->getStore();

        abort_if($product->store_id != $store->id, 403);

        $categories = Category::where('store_id', $store->id)
            ->orderBy('nama_kategori')
            ->get();

        return view(
            'penjual.produk.edit',
            compact('product', 'categories')
        );
    }

    public function update(Request $request, Product $product)
    {
        $store = $this->getStore();

        abort_if($product->store_id != $store->id, 403);

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('store_id', $store->id),
            ],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'harga' => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('foto')) {
            if ($product->foto) {
                Storage::disk('public')->delete($product->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('produk', 'public');
        }

        $product->update($validated);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $store = $this->getStore();

        abort_if($product->store_id != $store->id, 403);

        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
