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
    protected $keyType = 'string';

    protected $fillable = [
        'DokterID',
        'NamaDokter',
        'Departemen',
        'AlamatDokter',
        'NomorHP',
        'FotoDokter',
        'LayananID',
        'AccountID',
    ];
}
