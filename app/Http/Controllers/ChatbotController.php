<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('user.chatbot');
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:500'],
        ]);

        $message = Str::lower(trim($request->message));
        $reply = $this->generateReply($message);

        return response()->json([
            'reply' => $reply,
        ]);
    }

    private function generateReply(string $message): string
    {
        if ($this->containsAny($message, ['halo', 'hai', 'hi', 'hello', 'selamat pagi', 'selamat siang', 'selamat malam'])) {
            return 'Halo! Saya AI Chatbot Tjahaja. Saya dapat membantu memberikan informasi mengenai produk, harga, promo, dan cara pemesanan.';
        }

        if ($this->containsAny($message, ['produk', 'menu', 'makanan', 'minuman'])) {
            $produks = Produk::with(['brand', 'kategori'])
                ->latest()
                ->take(10)
                ->get();

            if ($produks->isEmpty()) {
                return 'Maaf, data produk belum tersedia.';
            }

            $list = $produks->map(function ($produk, $index) {
                $brand = $produk->brand?->nama_brand ?? 'Tanpa brand';

                return ($index + 1) . '. ' .
                    $produk->nama_produk . ' - Rp' .
                    number_format($produk->harga, 0, ',', '.') .
                    ' (' . $brand . ')';
            })->implode("\n");

            return "Berikut beberapa produk yang tersedia:\n" . $list;
        }

        if ($this->containsAny($message, ['promo', 'diskon', 'potongan', 'paket hemat'])) {
            $promos = Promo::latest()->take(10)->get();

            if ($promos->isEmpty()) {
                return 'Saat ini belum ada promo yang tersedia.';
            }

            $list = $promos->map(function ($promo, $index) {
                $judul = $promo->judul ?? $promo->nama_promo ?? 'Promo Tjahaja';
                $deskripsi = $promo->deskripsi ?? 'Silakan lihat halaman promo untuk informasi lengkap.';

                return ($index + 1) . '. ' . $judul . ' - ' . $deskripsi;
            })->implode("\n");

            return "Promo yang tersedia:\n" . $list;
        }

        if ($this->containsAny($message, ['harga', 'berapa harga'])) {
            $produk = Produk::whereRaw('LOWER(nama_produk) LIKE ?', ['%' . $this->extractProductKeyword($message) . '%'])
                ->first();

            if ($produk) {
                return 'Harga ' . $produk->nama_produk . ' adalah Rp' .
                    number_format($produk->harga, 0, ',', '.') . '.';
            }

            return 'Silakan sebutkan nama produknya, misalnya: "Berapa harga Pizza Hawaiian?"';
        }

        if ($this->containsAny($message, ['pesan', 'pemesanan', 'order', 'beli', 'cara pesan'])) {
            return 'Untuk melakukan pemesanan, buka halaman Produk, pilih produk yang diinginkan, lalu klik tombol Pesan. Pengguna harus login sebelum membuat pesanan.';
        }

        if ($this->containsAny($message, ['pizza'])) {
            return $this->replyByProductKeyword('pizza');
        }

        if ($this->containsAny($message, ['burger'])) {
            return $this->replyByProductKeyword('burger');
        }

        if ($this->containsAny($message, ['pasta', 'spaghetti', 'carbonara'])) {
            return $this->replyByProductKeyword('pasta');
        }

        if ($this->containsAny($message, ['minuman', 'tea', 'teh', 'lemon'])) {
            return $this->replyByProductKeyword('tea');
        }

        if ($this->containsAny($message, ['kontak', 'alamat', 'lokasi'])) {
            return 'Informasi alamat dan kontak Tjahaja Group Company dapat dilihat pada halaman Kontak.';
        }

        if ($this->containsAny($message, ['terima kasih', 'makasih', 'thanks'])) {
            return 'Sama-sama! Senang dapat membantu.';
        }

        return 'Maaf, saya belum memahami pertanyaan tersebut. Silakan tanyakan mengenai produk, harga, promo, cara pemesanan, atau lokasi Tjahaja Group Company.';
    }

    private function replyByProductKeyword(string $keyword): string
    {
        $produks = Produk::whereRaw('LOWER(nama_produk) LIKE ?', ['%' . $keyword . '%'])
            ->take(10)
            ->get();

        if ($produks->isEmpty()) {
            return 'Maaf, produk dengan kategori tersebut belum tersedia.';
        }

        $list = $produks->map(function ($produk, $index) {
            return ($index + 1) . '. ' .
                $produk->nama_produk . ' - Rp' .
                number_format($produk->harga, 0, ',', '.');
        })->implode("\n");

        return "Berikut produk yang saya temukan:\n" . $list;
    }

    private function containsAny(string $message, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (Str::contains($message, $keyword)) {
                return true;
            }
        }

        return false;
    }

    private function extractProductKeyword(string $message): string
    {
        $wordsToRemove = [
            'berapa',
            'harga',
            'produk',
            'menu',
            'tolong',
            'kasih',
            'tahu',
            'dong',
            '?',
        ];

        $keyword = str_replace($wordsToRemove, '', $message);

        return trim($keyword);
    }
}