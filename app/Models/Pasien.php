<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'PasienID';
    public $incrementing = false;
    protected $keyType = 'string';
}
