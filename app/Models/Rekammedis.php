<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Rekammedis extends Model
{
    protected $table = 'rekam_medis';
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
        'HasilKonsultasi',
        'RumahSakitRujukan',
    ];
    public $timestamps = false;

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'DokterID');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'PasienID');
    }
}
