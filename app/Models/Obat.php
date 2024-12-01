<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'ObatID';
    public $incrementing = false;
    protected $keyType = 'string';
}
