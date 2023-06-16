<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $table = 'transaksi_detail';
    protected $primaryKey = 'id_transaksi_detail';
    protected $fillable = [
        'id_produk',
        'jumlah',
        'id_transaksi',
    ];
}
