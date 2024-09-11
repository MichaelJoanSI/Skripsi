<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_transaction',
        'satuan',
        'status',
        'jenis',
        'harga_jual',
        'quantity',
        'sub_total',

    ];
}
