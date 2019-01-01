<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeShop extends Model
{
    //
    protected $table = 'marketplaces';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'stsrc'];
}
