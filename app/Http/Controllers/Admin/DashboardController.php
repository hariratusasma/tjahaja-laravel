<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Promo;
use App\Models\Pesanan;
use App\Models\Pesan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBrand = Brand::count();
        $totalKategori = Kategori::count();
        $totalProduk = Produk::count();
        $totalPromo = Promo::count();
        $totalPesanan = Pesanan::count();
        $totalPesan = Pesan::count();

        return view('admin.dashboard', compact(
            'totalBrand',
            'totalKategori',
            'totalProduk',
            'totalPromo',
            'totalPesanan',
            'totalPesan'
        ));
    }
}