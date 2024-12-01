<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Resepobat extends Model
{
    protected $table = 'resepobat';
    protected $primaryKey = 'ResepObatID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Tanggal',
        'DokterID',
        'PasienID',
        'ListObat',
        'DosisObat',
        'InstruksiPenggunaanObat',
    ];
    public $timestamps = false;
}
