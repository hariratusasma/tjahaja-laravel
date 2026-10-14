@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Kategori
</h1>

<form action="{{ route('admin.kategori.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">
        <label>Nama Kategori</label>

        <input type="text"
               name="nama_kategori"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>

        <textarea name="deskripsi"
                  class="w-full border p-2"></textarea>
    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">
        Simpan
    </button>

</form>

@endsection