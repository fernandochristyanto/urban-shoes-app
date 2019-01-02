<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'contents', 'author_id', 'stsrc'];
}
