<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::latest()->get();

        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,dibatalkan',
        ]);

        $pesanan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}