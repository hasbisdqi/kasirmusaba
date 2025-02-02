<?php

namespace App\Models;

use App\View\Components\table;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id','NamaPelanggan', 'Alamat', 'NomorTelepon'
    ];
}
