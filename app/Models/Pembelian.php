<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'PembelianID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'TanggalPembelian',
        'SupplierID',
        'ObatID',
        'Kuantitas',
        'Harga',
    ];
    public $timestamps = false;
}
