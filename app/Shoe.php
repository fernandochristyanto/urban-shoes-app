<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    //
    protected $table = 'shoes';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'name', 'description', 'image_url', 'stsrc'];
}
