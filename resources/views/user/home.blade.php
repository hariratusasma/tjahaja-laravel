@extends('layouts.user')

@section('content')

<section class="min-h-screen flex items-center bg-cover bg-center relative"
    style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591');">

    <div class="absolute inset-0 bg-black/70"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-8 pt-24">
        <p class="text-yellow-400 font-semibold mb-4">
            Tjahaja Group Company
        </p>

        <h1 class="text-6xl font-extrabold leading-tight mb-6 max-w-3xl">
            Discover Your Favorite Food with AI Chatbot Assistance
        </h1>

        <p class="text-gray-300 text-lg max-w-xl mb-8">
            Temukan berbagai produk kuliner terbaik dari Pizza Tjahaja,
    Burger Tjahaja, dan Osteria by Tjahaja.
    Gunakan AI Chatbot untuk memperoleh informasi produk,
    harga, promo, dan layanan secara cepat.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('produk') }}"
               class="bg-yellow-400 text-black px-6 py-3 rounded-full font-bold">
                Lihat Produk
            </a>

            <a href="#"
               class="border border-white px-6 py-3 rounded-full">
                AI Chatbot
            </a>
        </div>
    </div>
</section>
<section class="bg-neutral-950 py-10">
    <div class="max-w-7xl mx-auto px-8">
        <img src="{{ asset('images/banner-tjahaja.png') }}"
             class="w-full rounded-3xl shadow-xl">
    </div>
</section>
<section class="py-20 bg-neutral-950">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-4xl font-bold mb-10">
            Our Brands
        </h2>

        <div class="grid grid-cols-3 gap-8">
            <div class="bg-red-900/40 p-8 rounded-2xl border border-red-500/30">
                <h3 class="text-2xl font-bold mb-3">Pizza Tjahaja</h3>
                <p class="text-gray-300">Pizza premium dengan rasa khas Tjahaja.</p>
            </div>

            <div class="bg-blue-900/40 p-8 rounded-2xl border border-blue-500/30">
                <h3 class="text-2xl font-bold mb-3">Burger Tjahaja</h3>
                <p class="text-gray-300">Burger lezat dengan bahan pilihan.</p>
            </div>

            <div class="bg-green-900/40 p-8 rounded-2xl border border-green-500/30">
                <h3 class="text-2xl font-bold mb-3">Osteria by Tjahaja</h3>
                <p class="text-gray-300">Menu pasta dan western food modern.</p>
            </div>
        </div>
    </div>
</section>

@endsection