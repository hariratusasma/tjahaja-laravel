<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['brand','kategori'])->latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $brands = Brand::all();
        $kategoris = Kategori::all();

        return view('admin.produk.create', compact('brands','kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'recommended' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create([
            'brand_id' => $request->brand_id,
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'recommended' => $request->recommended ? 1 : 0,
            'gambar' => $gambar,
        ]);

        return redirect()->route('admin.produk.index');
    }

    public function edit(Produk $produk)
    {
        $brands = Brand::all();
        $kategoris = Kategori::all();

        return view('admin.produk.edit', compact('produk', 'brands', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'brand_id' => 'required',
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'recommended' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $produk->gambar;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update([
            'brand_id' => $request->brand_id,
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'recommended' => $request->recommended ? 1 : 0,
            'gambar' => $gambar,
        ]);

        return redirect()->route('admin.produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('admin.produk.index');
    }
}