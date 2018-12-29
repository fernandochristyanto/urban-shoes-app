<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeDisplay extends Model
{
    protected $table = 'shoe_display';
    protected $primaryKey = 'id';
    protected $fillable = ['shoe_id', 'article_Id', 'stsrc'];

    protected function shoes() {
        return $this->hasOne('App\Shoe', 'shoe_id', 'id');
    }
}
