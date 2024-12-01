<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'LayananID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NamaLayanan',
        'HargaLayanan',
    ];
    public $timestamps = false;
}
