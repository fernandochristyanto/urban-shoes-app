<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name, stsrc'];

    protected function shoes(){
        return $this->hasMany('App\Shoe', 'shoe_id', 'id');
    }
}
