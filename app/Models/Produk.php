<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = ['id','KodeProduk','NamaProduk', 'Harga', 'Stok','GambarProduk'];
}
