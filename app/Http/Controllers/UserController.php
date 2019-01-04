<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ScrapRequest;
use App\News;
use App\Shop;
use App\Http\Helper\DataHelper;


class UserController extends Controller
{
    //
    public function home(){
        return view('user.home');
    }

    public function discover(){
        return view('user.discover');
    }

    public function news(){
        return view('user.news', ['articles' => News::all()]);
    }

    public function search(){
        return view('user.search', ['shops' => Shop::where('stsrc','!=','D')->get()]);
    }
}
