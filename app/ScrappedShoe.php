<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrappedShoe extends Model
{
    //
    protected $table = 'scrapped_shoes';
    protected $primaryKey = 'id';
    protected $fillable = ['request_id', 'store_url', 'image_url', 'price', 'status', 'stsrc'];
}
