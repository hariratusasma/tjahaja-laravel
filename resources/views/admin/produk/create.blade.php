@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Produk
</h1>

<form action="{{ route('admin.produk.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-4">
        <label>Brand</label>

        <select name="brand_id"
                class="w-full border p-2">

            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">
                    {{ $brand->nama_brand }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-4">
        <label>Kategori</label>

        <select name="kategori_id"
                class="w-full border p-2">

            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-4">
        <label>Nama Produk</label>

        <input type="text"
               name="nama_produk"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Harga</label>

        <input type="number"
               name="harga"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>

        <textarea name="deskripsi"
                  class="w-full border p-2"></textarea>
    </div>

    <div class="mb-4">
        <label>
            <input type="checkbox"
                   name="recommended"
                   value="1">

            AI Recommended
        </label>
    </div>
<div class="mb-4">
    <label>Gambar Produk</label>
    <input type="file"
           name="gambar"
           class="w-full border p-2">
</div>
    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">
        Simpan
    </button>

</form>

@endsection