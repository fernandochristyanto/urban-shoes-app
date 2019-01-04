<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoe;

class HomeController extends Controller
{
    //Home
    public function show(Request $request){
        $shoes = Shoe::where('stsrc', '<>', 'D')->take(3)->get();

        return view('user.home', [
            'shoes' =>$shoes,
            'name' => $shoes
        ]);
    }
}
