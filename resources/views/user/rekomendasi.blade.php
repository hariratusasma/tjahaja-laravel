@extends('layouts.user')

@section('content')

<section class="pt-32 pb-20 bg-neutral-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-8">

        <p class="text-yellow-400 font-semibold mb-3">
            Smart Recommendation
        </p>

        <h1 class="text-5xl font-bold mb-6">
            Rekomendasi AI Produk
        </h1>

        <p class="text-gray-400 mb-12 max-w-2xl">
            Sistem menampilkan produk rekomendasi berdasarkan data produk yang
            ditandai sebagai recommended oleh admin.
        </p>

        <div class="grid grid-cols-3 gap-8">
            @foreach($produks as $produk)
                <div class="bg-gradient-to-br from-yellow-500/20 to-white/10 rounded-2xl overflow-hidden border border-yellow-400/30">

                    @if($produk->brand->nama_brand == 'Pizza Tjahaja')
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
                        <span class="text-xs bg-yellow-400 text-black px-3 py-1 rounded-full font-bold">
                            AI Recommended
                        </span>

                        <h2 class="text-2xl font-bold mt-4 mb-2">
                            {{ $produk->nama_produk }}
                        </h2>

                        <p class="text-gray-400 mb-4">
                            {{ $produk->deskripsi }}
                        </p>

                        <p class="text-yellow-400 text-xl font-bold">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection