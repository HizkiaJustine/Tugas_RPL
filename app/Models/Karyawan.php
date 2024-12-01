<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'KaryawanID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NamaKaryawan',
        'Jabatan',
        'NomorHP',
        'AlamatKaryawan',
        'JenisKelamin',
        'AccountID',
    ];
    public $timestamps = false;
}
