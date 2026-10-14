@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Data Kategori</h1>

    <a href="{{ route('admin.kategori.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Tambah Kategori
    </a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Nama Kategori</th>
            <th class="p-3">Deskripsi</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kategoris as $kategori)
        <tr class="border-b">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">{{ $kategori->nama_kategori }}</td>
            <td class="p-3">{{ $kategori->deskripsi }}</td>
            <td class="p-3 flex gap-2">

    <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
       class="bg-blue-500 text-white px-3 py-1 rounded">
        Edit
    </a>

    <form action="{{ route('admin.kategori.destroy', $kategori->id) }}"
          method="POST"
          onsubmit="return confirm('Hapus kategori ini?')">

        @csrf
        @method('DELETE')

        <button class="bg-red-500 text-white px-3 py-1 rounded">
            Hapus
        </button>

    </form>

</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection