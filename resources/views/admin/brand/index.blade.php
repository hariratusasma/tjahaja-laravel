@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Data Brand</h1>

    <a href="{{ route('admin.brand.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Tambah Brand
    </a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Nama Brand</th>
            <th class="p-3">Deskripsi</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($brands as $brand)
        <tr class="border-b">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">{{ $brand->nama_brand }}</td>
            <td class="p-3">{{ $brand->deskripsi }}</td>
            <td class="p-3 flex gap-2">

    <a href="{{ route('admin.brand.edit', $brand->id) }}"
       class="bg-blue-500 text-white px-3 py-1 rounded">
        Edit
    </a>

    <form action="{{ route('admin.brand.destroy', $brand->id) }}"
          method="POST"
          onsubmit="return confirm('Hapus brand ini?')">

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