<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'ObatID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NamaObat',
        'TipeObat',
        'TanggalKadaluarsa',
        'JumlahObat',
        'HargaObat',
        'ResepObatID',
    ];
    public $timestamps = false;
}