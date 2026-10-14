<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::latest()->get();

        return view('admin.promo.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
    'judul' => 'required',
    'kode_promo' => 'required|unique:promos,kode_promo',
    'jenis_diskon' => 'required',
    'nilai_diskon' => 'required|numeric',
    'minimal_pembelian' => 'required|numeric',
    'deskripsi' => 'required',
    'tanggal_mulai' => 'required|date',
    'tanggal_selesai' => 'required|date',
]);

        Promo::create($request->all());

        return redirect()->route('admin.promo.index');
    }
    public function edit(Promo $promo)
{
    return view('admin.promo.edit', compact('promo'));
}

public function update(Request $request, Promo $promo)
{
    $request->validate([
    'judul' => 'required',
    'kode_promo' => 'required|unique:promos,kode_promo,' . $promo->id,
    'jenis_diskon' => 'required',
    'nilai_diskon' => 'required|numeric',
    'minimal_pembelian' => 'required|numeric',
    'deskripsi' => 'required',
    'tanggal_mulai' => 'required|date',
    'tanggal_selesai' => 'required|date',
]);

    $promo->update($request->all());

    return redirect()->route('admin.promo.index');
}

public function destroy(Promo $promo)
{
    $promo->delete();

    return redirect()->route('admin.promo.index');
}
}