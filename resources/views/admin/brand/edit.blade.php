@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Brand
</h1>

<form action="{{ route('admin.brand.update', $brand->id) }}" method="POST">
    @csrf
    @method('PUT')

    @csrf

    <div class="mb-4">
        <label>Nama Brand</label>

        <input type="text"
       name="nama_brand"
       value="{{ $brand->nama_brand }}"
       class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>

        <textarea name="deskripsi"
          class="w-full border p-2">{{ $brand->deskripsi }}</textarea>
    </div>

    <button
    class="bg-blue-600 text-white px-5 py-2 rounded">
    Simpan
</button>

</form>

@endsection