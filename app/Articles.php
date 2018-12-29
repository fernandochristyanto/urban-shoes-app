<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'contents', 'author_id', 'stsrc'];

    protected function pinned_shoes() {
        return $this->hasMany('App\ShoeDisplay', 'article_id', 'id');
    }

    protected function author() {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}