@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Produk
</h1>

<form action="{{ route('admin.produk.update', $produk->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Brand</label>

        <select name="brand_id" class="w-full border p-2">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{ $produk->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->nama_brand }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Kategori</label>

        <select name="kategori_id" class="w-full border p-2">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Nama Produk</label>
        <input type="text"
               name="nama_produk"
               value="{{ $produk->nama_produk }}"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Harga</label>
        <input type="number"
               name="harga"
               value="{{ $produk->harga }}"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>
        <textarea name="deskripsi"
                  class="w-full border p-2">{{ $produk->deskripsi }}</textarea>
    </div>

    <div class="mb-4">
        <label>
            <input type="checkbox"
                   name="recommended"
                   value="1"
                   {{ $produk->recommended ? 'checked' : '' }}>
            AI Recommended
        </label>
    </div>
<div class="mb-4">
    <label>Gambar Produk</label>

    @if($produk->gambar)
        <img src="{{ asset('storage/' . $produk->gambar) }}"
             class="w-32 h-24 object-cover mb-2 rounded">
    @endif

    <input type="file"
           name="gambar"
           class="w-full border p-2">
</div>
    <button class="bg-blue-600 text-white px-5 py-2 rounded">
        Update
    </button>

    <a href="{{ route('admin.produk.index') }}"
       class="ml-3 text-gray-600">
        Batal
    </a>

</form>

@endsection