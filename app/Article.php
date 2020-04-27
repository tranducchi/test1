<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // BelongsTo
    protected $table = 'articles';

    public function category(){
        return $this->belongsTo('App\Category', 'cat_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    // Has Many
    public function comments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
