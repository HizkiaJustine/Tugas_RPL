<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $primaryKey = 'DokterID';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NamaDokter',
        'Departemen',
        'AlamatDokter',
        'NomorHP',
        'LayananID',
        'AccountID',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'LayananID');
    }
}
