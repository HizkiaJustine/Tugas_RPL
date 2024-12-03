<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $primaryKey = 'LayananID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NamaLayanan',
        'HargaLayanan',
    ];
    public $timestamps = false;

    public function doctors()
    {
        return $this->hasMany(Dokter::class, 'LayananID');
    }
}
