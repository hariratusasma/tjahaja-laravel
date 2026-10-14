<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'brand_id',
        'kategori_id',
        'nama_produk',
        'harga',
        'deskripsi',
        'gambar',
        'recommended',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}