<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Kasir extends Model
{
    protected $table = 'kasir';
    protected $primaryKey = 'KasirID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NamaKasir',
        'NomorHP',
        'AlamatKasir',
        'JenisKelamin',
        'AccountID',
    ];
    public $timestamps = false;
}
