<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Tjahaja</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <aside class="w-64 bg-gray-900 text-white p-6">
        <h1 class="text-2xl font-bold mb-8">Tjahaja Admin</h1>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-yellow-400">Dashboard</a>
            <a href="{{ route('admin.brand.index') }}"
   class="block hover:text-yellow-400">
   Brand
</a>
            <a href="{{ route('admin.kategori.index') }}"
   class="block hover:text-yellow-400">
   Kategori
</a>
            <a href="{{ route('admin.produk.index') }}"
   class="block hover:text-yellow-400">
   Produk
</a>
            <a href="{{ route('admin.promo.index') }}"
   class="block hover:text-yellow-400">
   Promo
</a>
<a href="{{ route('admin.pesan.index') }}"
   class="block py-2 hover:text-yellow-400">
   Pesan
</a>
            <a href="{{ route('admin.pesanan.index') }}"
   class="block py-2 hover:text-yellow-400">
   Pesanan
</a>
            <a href="#" class="block hover:text-yellow-400">Pesan Masuk</a>
        <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="w-full text-left py-2 text-red-400 hover:text-red-300">
        Logout
    </button>
</form>
        </nav>
    </aside>

    <main class="flex-1 p-8 bg-white text-gray-900">
        @yield('content')
    </main>
</div>

</body>
</html>