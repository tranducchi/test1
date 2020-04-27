<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    //
    protected $table = 'article__tags';
    protected $fillable = ['id', 'article_id', 'tag_id'];
}
