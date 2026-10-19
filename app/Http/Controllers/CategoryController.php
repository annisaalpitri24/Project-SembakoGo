<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private function getStore()
    {
        return Auth::user()->store;
    }

    public function index()
    {
        $store = $this->getStore();

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');

        $categories = Category::where('store_id', $store->id)
            ->latest()
            ->get();

        return view('penjual.kategori.index', compact('categories'));
    }

    public function create()
    {
        abort_if(!$this->getStore(), 403, 'Data toko tidak ditemukan.');

        return view('penjual.kategori.create');
    }

    public function store(Request $request)
    {
        $store = $this->getStore();

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $store->categories()->create($validated);

        return redirect()
            ->route('penjual.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $kategori)
    {
        $store = $this->getStore();

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');
        abort_if((int) $kategori->store_id !== (int) $store->id, 403);

        return view('penjual.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Category $kategori)
    {
        $store = $this->getStore();

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');
        abort_if((int) $kategori->store_id !== (int) $store->id, 403);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($validated);

        return redirect()
            ->route('penjual.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $kategori)
    {
        $store = $this->getStore();

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');
        abort_if((int) $kategori->store_id !== (int) $store->id, 403);

        $kategori->delete();

        return redirect()
            ->route('penjual.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
