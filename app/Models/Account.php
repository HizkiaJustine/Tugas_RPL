<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Account extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'AccountID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'password',
        'Role',
    ];
    public $timestamps = false;

}
