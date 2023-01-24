<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "article";

    protected $fillable = [
        'id',
        'article_name',
        'article_category',
        'article_description',
        'article_how_to'
    ];
}
