<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'articleId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'articleId',
        'dokterID',
        'title',
        'content',
        'publishDate',
    ];
}