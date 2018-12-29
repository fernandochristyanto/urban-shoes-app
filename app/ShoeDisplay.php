<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeDisplay extends Model
{
    protected $table = 'shoe_display';
    protected $primaryKey = 'id';
    protected $fillable = ['shoe_id', 'article_id', 'stsrc'];

    protected function shoes() {
        return $this->hasOne('App\Shoe', 'shoe_id', 'shoe_id');
    }
    
    protected function article() {
        return $this->belongsTo('App\Article', 'article_id', 'article_id');
    }
}
