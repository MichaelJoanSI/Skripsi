<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $fillable = [
        'user_id',
        'kode_pembelian',
        'nama_barang',
        'tgl_masuk',
        'tgl_keluar',
        'satuan',
        'harga_beli',
        'sub_total',

    ];
}
