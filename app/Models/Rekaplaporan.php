<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekaplaporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'id',
        'id_barang',
        'id_transaksi',
        'nama_barang',
        'quantity',
        'total',
        'tgl_laporan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}