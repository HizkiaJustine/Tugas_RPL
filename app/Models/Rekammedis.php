<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Rekammedis extends Model
{
    protected $table = 'rekammedis';
    protected $primaryKey = 'RekamMedisID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Tanggal',
        'PasienID',
        'DokterID',
        'HasilDiagnosa',
        'Perawatan',
        'ResepObat',
        'HasilLab',
    ];
    public $timestamps = false;
}
