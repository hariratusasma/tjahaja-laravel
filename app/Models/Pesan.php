<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'subjek',
        'isi_pesan',
        'status',
    ];
}