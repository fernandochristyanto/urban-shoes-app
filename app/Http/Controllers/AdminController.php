<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home(){
        return view('admin.home');
    }

    public function discover(){
        return view('admin.discover');
    }

    public function news(){
        return view('admin.news');
    }

    public function search(){
        return view('admin.search');
    }

    public function completedItems(){
        return view('admin.admin-panel.completedItems');
    }

    public function pendingItems(){
        return view('admin.admin-panel.pendingItems');
    }

    public function requestNewItem(){
        return view('admin.admin-panel.requestNewItem');
    }
}
