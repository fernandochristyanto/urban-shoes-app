<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    //
    protected $table = 'shoes';
    protected $primaryKey = 'id';
    //protected $fillable = ['category_id', 'name', 'description', 'image_url', 'stsrc'];
    protected $fillable = ['name', 'description', 'image_url', 'stsrc'];

    protected function shoe_shops(){
        return $this->hasMany('App\ShoeShop', 'shoe_id', 'id');
    }

    // protected function category(){
    //     return $this->belongsTo('App\Category', 'category_id', 'id');
    // }
}
