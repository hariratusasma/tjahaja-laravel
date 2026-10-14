@extends('layouts.user')

@section('content')

<section class="pt-32 pb-20 bg-neutral-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-8">
        <p class="text-yellow-400 font-semibold mb-3">Special Offer</p>
        <h1 class="text-5xl font-bold mb-10">Promo Tjahaja</h1>

        <div class="grid grid-cols-2 gap-8">
            @foreach($promos as $promo)
                <div class="bg-white/10 rounded-2xl overflow-hidden border border-white/10">
                    @php
    $judul = strtolower($promo->judul);
@endphp

@if(str_contains($judul, 'burger'))

<div class="h-64 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1568901346375-23c9450c58cd');">
</div>

@elseif(str_contains($judul, 'pizza') || str_contains($judul, 'keluarga'))

<div class="h-64 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1513104890138-7c749659a591');">
</div>

@elseif(str_contains($judul, 'tea') || str_contains($judul, 'minuman'))

<div class="h-64 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1544145945-f90425340c7e');">
</div>

@else

<div class="h-64 bg-cover bg-center"
style="background-image:url('https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9');">
</div>

@endif

                    <div class="p-6">
                        <h2 class="text-3xl font-bold mb-3">{{ $promo->judul }}</h2>
                        <p class="text-gray-300 mb-4">{{ $promo->deskripsi }}</p>

                        <p class="text-yellow-400">
                            {{ $promo->tanggal_mulai }} - {{ $promo->tanggal_selesai }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection