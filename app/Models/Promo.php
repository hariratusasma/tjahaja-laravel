<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
        'judul',
        'kode_promo',
        'jenis_diskon',
        'nilai_diskon',
        'minimal_pembelian',
        'aktif',
        'deskripsi',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'nilai_diskon' => 'decimal:2',
        'minimal_pembelian' => 'decimal:2',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}