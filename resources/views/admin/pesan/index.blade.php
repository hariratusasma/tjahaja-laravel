@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Pesan Masuk
</h1>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">No</th>
            <th class="p-3">Nama</th>
            <th class="p-3">Email</th>
            <th class="p-3">Pesan</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pesans as $pesan)
        <tr class="border-b">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">{{ $pesan->nama }}</td>
            <td class="p-3">{{ $pesan->email }}</td>
            <td class="p-3">{{ $pesan->isi_pesan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection