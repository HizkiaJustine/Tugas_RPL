<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Faktur extends Model
{
    protected $table = 'faktur';
    protected $primaryKey = 'FakturID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Tanggal',
        'TotalHarga',
        'PasienID',
        'LayananID',
    ];
    public $timestamps = false;
}
