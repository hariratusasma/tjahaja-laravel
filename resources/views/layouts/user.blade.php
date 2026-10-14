<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tjahaja Company</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-950 text-white">

<nav class="fixed top-0 left-0 w-full z-50 bg-black/80 backdrop-blur border-b border-white/10">
    <div class="max-w-7xl mx-auto px-8 py-5 flex justify-between items-center">
      <div class="flex items-center gap-3">
    <img src="{{ asset('images/logo.png') }}"
         class="w-10 h-10 rounded-full">

    <h1 class="text-2xl font-bold">
        Tjahaja Group
    </h1>
</div>

        <div class="flex gap-6 items-center">
            <a href="{{ route('home') }}" class="hover:text-yellow-400">Home</a>
            <a href="{{ route('produk') }}" class="hover:text-yellow-400">Produk</a>
            <a href="{{ route('promo') }}" class="hover:text-yellow-400">Promo</a>
            <a href="{{ route('chatbot') }}" class="hover:text-yellow-400">AI Chatbot</a>
            <a href="{{ route('kontak') }}" class="hover:text-yellow-400">Kontak</a>

            @auth
    <a href="{{ route('dashboard') }}"
       class="bg-yellow-400 text-black px-4 py-2 rounded-full">
        Dashboard
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            class="bg-red-500 text-white px-4 py-2 rounded-full">
            Logout
        </button>
    </form>

@else
                <a href="{{ route('login') }}"
                   class="bg-yellow-400 text-black px-4 py-2 rounded-full">
                    Login
                </a>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="bg-black border-t border-white/10 py-8 text-center text-gray-400">
    <p>© 2026 Tjahaja Company</p>
</footer>

</body>
</html>