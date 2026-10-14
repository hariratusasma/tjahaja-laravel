<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_brand' => 'required',
            'logo' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        Brand::create($request->all());

        return redirect()->route('admin.brand.index')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'nama_brand' => 'required',
            'logo' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        $brand->update($request->all());

        return redirect()->route('admin.brand.index')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brand.index')
            ->with('success', 'Brand berhasil dihapus.');
    }
}