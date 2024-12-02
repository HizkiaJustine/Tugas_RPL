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
    public $incrementing = false; // Ensure incrementing is disabled for string primary key
    protected $keyType = 'string'; // Ensure the primary key is of type string

    protected $fillable = [
        'AccountID', // Ensure AccountID is fillable
        'email',
        'password',
        'Role',
    ];
    public $timestamps = false; // Ensure timestamps are disabled
}
