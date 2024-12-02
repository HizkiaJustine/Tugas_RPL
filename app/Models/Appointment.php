<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Arr;

class Appointment extends Model
{
    protected $table = 'appointment';
    
    protected $primaryKey = 'AppointmentID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'TanggalJanjiTemu',
        'JamJanjiTemu',
        'DokterID',
        'PasienID',
        'Tujuan',
        'Status',
    ];
    public $timestamps = false;
}
