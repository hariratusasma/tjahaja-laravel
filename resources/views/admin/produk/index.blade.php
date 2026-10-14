@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Data Produk</h1>

    <a href="{{ route('admin.produk.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Tambah Produk
    </a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Gambar</th>
            <th class="p-3">Produk</th>
            <th class="p-3">Brand</th>
            <th class="p-3">Kategori</th>
            <th class="p-3">Harga</th>
            <th class="p-3">AI</th>
            
        </tr>
    </thead>

    <tbody>
        @foreach($produks as $produk)
        <tr>
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">
    @if($produk->gambar)
        <img src="{{ asset('storage/'.$produk->gambar) }}"
             class="w-20 h-16 object-cover rounded">
    @endif
</td>
            <td class="p-3">{{ $produk->nama_produk }}</td>
            <td class="p-3">{{ $produk->brand->nama_brand ?? '-' }}</td>
            <td class="p-3">{{ $produk->kategori->nama_kategori ?? '-' }}</td>
            <td class="p-3">Rp {{ number_format($produk->harga) }}</td>
            <td class="p-3">
                {{ $produk->recommended ? 'Ya' : 'Tidak' }}
            </td>
            <td class="p-3 flex gap-2">

    <a href="{{ route('admin.produk.edit', $produk->id) }}"
       class="bg-blue-500 text-white px-3 py-1 rounded">
        Edit
    </a>

    <form action="{{ route('admin.produk.destroy', $produk->id) }}"
          method="POST"
          onsubmit="return confirm('Hapus produk ini?')">

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