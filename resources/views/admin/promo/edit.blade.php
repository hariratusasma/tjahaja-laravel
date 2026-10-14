@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Promo
</h1>

<form action="{{ route('admin.promo.update', $promo->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Judul Promo</label>
        <input type="text"
               name="judul"
               value="{{ $promo->judul }}"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>
        <textarea name="deskripsi"
                  class="w-full border p-2">{{ $promo->deskripsi }}</textarea>
    </div>

    <div class="mb-4">
        <label>Tanggal Mulai</label>
        <input type="date"
               name="tanggal_mulai"
               value="{{ $promo->tanggal_mulai }}"
               class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Tanggal Selesai</label>
        <input type="date"
               name="tanggal_selesai"
               value="{{ $promo->tanggal_selesai }}"
               class="w-full border p-2">
    </div>

    <button class="bg-blue-600 text-white px-5 py-2 rounded">
        Update Promo
    </button>

</form>

@endsection