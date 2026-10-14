@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Data Promo</h1>

    <a href="{{ route('admin.promo.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Tambah Promo
    </a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Judul</th>
            <th class="p-3">Mulai</th>
            <th class="p-3">Selesai</th>
        </tr>
    </thead>

    <tbody>
        @foreach($promos as $promo)
        <tr>
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">{{ $promo->judul }}</td>
            <td class="p-3">{{ $promo->tanggal_mulai }}</td>
            <td class="p-3">{{ $promo->tanggal_selesai }}</td>
            <td class="p-3 flex gap-2">

    <a href="{{ route('admin.promo.edit', $promo->id) }}"
       class="bg-blue-500 text-white px-3 py-1 rounded">
        Edit
    </a>

    <form action="{{ route('admin.promo.destroy', $promo->id) }}"
          method="POST"
          onsubmit="return confirm('Hapus promo ini?')">

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