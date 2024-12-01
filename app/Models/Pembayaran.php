<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'PembayaranID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'TanggalPembayaran',
        'JumlahPembayaran',
        'MetodePembayaran',
        'FakturID',
        'PasienID',
    ];
    public $timestamps = false;
}

