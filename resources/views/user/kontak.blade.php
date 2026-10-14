@extends('layouts.user')

@section('content')

<section class="pt-32 pb-20 bg-neutral-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-2 gap-12">

        <div>
            <p class="text-yellow-400 font-semibold mb-3">
                Contact Us
            </p>

            <h1 class="text-5xl font-bold mb-6">
                Hubungi Tjahaja Company
            </h1>

            <p class="text-gray-400 mb-8">
                Silakan hubungi kami untuk informasi produk, promo, atau pemesanan.
            </p>

            <div class="space-y-4 text-gray-300">
                <p><b>Alamat:</b> Jl. Gajah Mada No.74, Denpasar, Bali</p>
                <p><b>Instagram:</b> @tjahaja.xiang</p>
                <p><b>Email:</b> info@tjahaja.com</p>
            </div>
        </div>

        <div class="bg-white/10 p-8 rounded-2xl border border-white/10">
            <h2 class="text-2xl font-bold mb-6">
                Kirim Pesan
            </h2>
@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
            <form action="{{ route('kontak.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label>Nama</label>
        <input type="text"
               name="nama"
               class="w-full p-3 rounded bg-white text-black">
    </div>

    <div class="mb-4">
        <label>Email</label>
        <input type="email"
               name="email"
               class="w-full p-3 rounded bg-white text-black">
    </div>

    <div class="mb-4">
        <label>Pesan</label>
        <textarea
            name="isi_pesan"
            class="w-full p-3 rounded bg-white text-black"></textarea>
    </div>

    <button class="bg-yellow-400 text-black px-6 py-3 rounded-full font-bold">
        Kirim Pesan
    </button>
</form>
        </div>

    </div>
</section>

@endsection