@extends('layouts.user')

@section('content')

<section class="pt-32 pb-20 bg-neutral-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-8">

        <div class="mb-12">
            <p class="text-yellow-400 font-semibold mb-3">
                Our Menu
            </p>

            <h1 class="text-5xl font-bold">
                Produk Kuliner Tjahaja
            </h1>

            <p class="text-gray-400 mt-4">
                Pilihan menu dari Pizza Tjahaja, Burger Tjahaja, dan Osteria by Tjahaja.
            </p>
        </div>
@if(session('success'))
<div class="bg-green-500 text-white p-4 rounded mb-6">
    {{ session('success') }}
</div>
@endif
        <div class="grid grid-cols-3 gap-8">
            @foreach($produks as $produk)
                <div class="bg-white/10 rounded-2xl overflow-hidden border border-white/10 hover:-translate-y-2 transition">

                   @if($produk->gambar)

<img src="{{ asset('storage/' . $produk->gambar) }}"
     class="w-full h-52 object-cover">

@elseif($produk->brand->nama_brand == 'Pizza Tjahaja')

<div class="h-52 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1513104890138-7c749659a591');">
</div>

@elseif($produk->brand->nama_brand == 'Burger Tjahaja')

<div class="h-52 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1568901346375-23c9450c58cd');">
</div>

@else

<div class="h-52 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9');">
</div>

@endif

                    <div class="p-6">
                        <div class="flex justify-between mb-3">
                            <span class="text-sm text-yellow-400">
                                {{ $produk->brand->nama_brand ?? '-' }}
                            </span>

                            <span class="text-sm text-gray-400">
                                {{ $produk->kategori->nama_kategori ?? '-' }}
                            </span>
                        </div>

                        <h2 class="text-2xl font-bold mb-3">
                            {{ $produk->nama_produk }}
                        </h2>

                        <p class="text-gray-400 mb-4">
                            {{ $produk->deskripsi }}
                        </p>

                        <div class="flex justify-between items-center">
                            <p class="text-xl font-bold text-yellow-400">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>

                            <form action="{{ route('pesan.produk', $produk->id) }}"
      method="POST">
    @csrf

    <button class="bg-yellow-400 text-black px-4 py-2 rounded-full font-bold">
        Pesan
    </button>
</form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection