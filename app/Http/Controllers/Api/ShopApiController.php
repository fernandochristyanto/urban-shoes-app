<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;

class ShopApiController extends Controller
{
    //
    public function get(){
        return json_encode([
            'shops' => Shop::where('stsrc', '<>', 'D')->get()
        ]);
    }
}
