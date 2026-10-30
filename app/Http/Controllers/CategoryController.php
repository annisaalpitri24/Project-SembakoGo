<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private function pastikanAdmin(): void
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403,
            'Akses hanya untuk admin.'
        );
    }

    public function index()
    {
        $this->pastikanAdmin();

        $categories = Category::withCount('products')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.kategori.index', compact('categories'));
    }
    public function sellerIndex()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'penjual',
            403,
            'Akses hanya untuk penjual.'
        );

        $categories = Category::withCount('products')
            ->orderBy('nama_kategori')
            ->get();

        return view('penjual.kategori.index', compact('categories'));
    }

    public function create()
    {
        $this->pastikanAdmin();

        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $this->pastikanAdmin();

        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'unique:categories,nama_kategori',
            ],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Category::create($validated);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $kategori)
    {
        $this->pastikanAdmin();

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Category $kategori)
    {
        $this->pastikanAdmin();

        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'unique:categories,nama_kategori,' . $kategori->id,
            ],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $kategori->update($validated);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $kategori)
    {
        $this->pastikanAdmin();

        $kategori->delete();

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
