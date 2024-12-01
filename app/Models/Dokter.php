<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'DokterID';
    public $incrementing = false;
    protected $keyType = 'string';
}
