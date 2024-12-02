<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answer';
    protected $primaryKey = 'AnswerID';
    protected $fillable = ['QuestionID', 'AccountID', 'answer'];
    public $incrementing = false;

    public function question()
    {
        return $this->belongsTo(Question::class, 'QuestionID');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'AccountID');
    }
}
