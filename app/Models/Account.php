<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'account';
    protected $primaryKey = 'AccountID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // Disable automatic timestamps
}
