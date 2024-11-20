<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'kode_penjualan',
        'nama_transaction', 
        'satuan', 
        'jenis', 
        'harga_jual', 
        'quantity', 
        'sub_total'
    ];
    

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id'); // Adjust the foreign key and local key as necessary
    }
}