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
        'quantity',
        'sub_total',

    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id'); // Adjust the foreign key and local key as necessary
    }
}
