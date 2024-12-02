<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'SupplierID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'SupplierID',
        'NamaSupplier',
        'NomorHP',
    ];
    public $timestamps = false;
}
