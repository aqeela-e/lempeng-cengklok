<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable',
            'wa' => 'nullable|string',
            'ig' => 'nullable|string',
            'image' => 'nullable|image',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $product = new Product($request->except('image'));

        // Jika tidak memilih mitra, produk dimiliki admin yang sedang login
        $product->user_id = $request->filled('user_id') ? $request->user_id : Auth::id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return back()->with([
            'success' => 'Produk berhasil ditambahkan!',
            'from' => auth()->user()->role === 'admin' ? 'admin' : 'mitra'
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'wa' => 'nullable|string',
            'ig' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $product->fill($validated);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return back()->with([
            'success' => 'Produk berhasil disimpan',
            'from' => $product->user && $product->user->role === 'admin' ? 'admin' : 'mitra'
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $isAdminProduct = $product->user && $product->user->role === 'admin';

        $product->delete();

        // Jika pakai AJAX
        if (request()->expectsJson()) {
            return response()->json(['message' => 'Produk berhasil dihapus.']);
        }

        return redirect()->back()->with([
            'success' => 'Produk berhasil dihapus.',
            'from' => $isAdminProduct ? 'admin' : 'mitra'
        ]);
    }
}
