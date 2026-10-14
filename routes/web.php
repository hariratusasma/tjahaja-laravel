<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Promo;
use App\Models\Pesan;
use App\Models\Pesanan;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/produk', function () {
    $produks = Produk::with(['brand', 'kategori'])->latest()->get();

    return view('user.produk', compact('produks'));
})->name('produk');

Route::get('/promo', function () {
    $promos = Promo::latest()->get();

    return view('user.promo', compact('promos'));
})->name('promo');

Route::get('/chatbot', [ChatbotController::class, 'index'])
    ->name('chatbot');

Route::post('/chatbot', [ChatbotController::class, 'send'])
    ->name('chatbot.send');

Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');

Route::post('/pesan/{produk}', function (\App\Models\Produk $produk) {

    \App\Models\Pesanan::create([
        'user_id' => Auth::id(),
        'total_harga' => $produk->harga,
        'status' => 'menunggu',
    ]);

    return back()->with('success', 'Pesanan berhasil dibuat');

})->middleware('auth')->name('pesan.produk');

Route::post('/kontak', function (Request $request) {
    Pesan::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'isi_pesan' => $request->isi_pesan,
    ]);

    return redirect()
        ->route('kontak')
        ->with('success', 'Pesan berhasil dikirim.');
})->name('kontak.store');

/*
|--------------------------------------------------------------------------
| LOGIN REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('/brand', BrandController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/produk', ProdukController::class);
        Route::resource('/promo', PromoController::class);
        Route::get('/pesan', [\App\Http\Controllers\Admin\PesanController::class, 'index'])
    ->name('pesan.index');
        Route::get('/pesanan', [PesananController::class, 'index'])
    ->name('pesanan.index');
    Route::patch('/pesanan/{pesanan}/status', [PesananController::class, 'updateStatus'])
    ->name('pesanan.updateStatus');
    });

require __DIR__.'/auth.php';