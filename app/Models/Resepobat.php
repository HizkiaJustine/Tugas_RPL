<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resepobat extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
    protected $primaryKey = 'ResepObatID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Tanggal',
        'DokterID',
        'PasienID',
        'ListObat',
        'InstruksiPenggunaanObat',
    ];
    public $timestamps = false;

}
