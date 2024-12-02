<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $primaryKey = 'QuestionID';
    protected $fillable = ['AccountID', 'question'];
    public $incrementing = false;

    public function account()
    {
        return $this->belongsTo(Account::class, 'AccountID');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'QuestionID');
    }
}
