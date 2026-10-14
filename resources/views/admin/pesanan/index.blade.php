@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Data Pesanan
</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Nama Customer</th>
            <th class="p-3">Tanggal</th>
            <th class="p-3">Total</th>
            <th class="p-3">Status</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pesanans as $pesanan)
        <tr class="border-b">
            <td class="p-3">{{ $loop->iteration }}</td>

            <td class="p-3">
                {{ $pesanan->user->name ?? '-' }}
            </td>

            <td class="p-3">
                {{ $pesanan->created_at }}
            </td>

            <td class="p-3">
                Rp {{ number_format($pesanan->total_harga,0,',','.') }}
            </td>

            <td class="p-3">
                {{ ucfirst($pesanan->status) }}
            </td>

            <td class="p-3">
                <form action="{{ route('admin.pesanan.updateStatus', $pesanan) }}"
                      method="POST"
                      class="flex gap-2">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="border rounded px-2 py-1">
                        <option value="menunggu"
                            {{ $pesanan->status == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="diproses"
                            {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="selesai"
                            {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="dibatalkan"
                            {{ $pesanan->status == 'dibatalkan' ? 'selected' : '' }}>
                            Dibatalkan
                        </option>
                    </select>

                    <button type="submit"
                        class="bg-blue-500 text-white px-3 py-1 rounded">
                        Simpan
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection