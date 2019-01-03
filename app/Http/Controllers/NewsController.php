<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function moreNews(Request $request){
    	$articles = News::where([
            ['stsrc', '<>', 'D']])->sortBy('created_at')->slice($request->currTotal);
    	return $articles;
    }

    public function createNews(){
    	return view('user.news-panel.createNews');
    }
}
