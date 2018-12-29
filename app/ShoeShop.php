<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeShop extends Model
{
    //
    protected $table = 'shoes_shops';
    protected $primaryKey = 'id';
    protected $fillable = ['shoe_id', 'shop_id', 'seller', 'price', 'item_title', 'store_url', 'image_url', 'stsrc', 'location', 'rating'];
}
