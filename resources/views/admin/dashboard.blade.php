@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Dashboard Admin
</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Produk</h2>
        <p class="text-4xl font-bold">{{ $totalProduk }}</p>
    </div>

    <div class="bg-green-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Brand</h2>
        <p class="text-4xl font-bold">{{ $totalBrand }}</p>
    </div>

    <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Kategori</h2>
        <p class="text-4xl font-bold">{{ $totalKategori }}</p>
    </div>

    <div class="bg-red-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Promo</h2>
        <p class="text-4xl font-bold">{{ $totalPromo }}</p>
    </div>

    <div class="bg-purple-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Pesanan</h2>
        <p class="text-4xl font-bold">{{ $totalPesanan }}</p>
    </div>

    <div class="bg-gray-800 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Pesan Masuk</h2>
        <p class="text-4xl font-bold">{{ $totalPesan }}</p>
    </div>

</div>

@endsection