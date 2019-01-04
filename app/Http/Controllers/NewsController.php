<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public function moreNews(Request $request){
    	$articles = News::where([
            ['stsrc', '<>', 'D']])->orderBy('created_at', 'desc')->skip($request->currTotal)->get();
    	return response()->json($articles);
    }

    public function addNews(Request $request){
    	$newArticle = new News();
    	$newArticle->title = $request->title;
    	$newArticle->contents = $request->contents;
    	$newArticle->stsrc = 'A';
    	$newArticle->author_id = "1";
    	$newArticle->created_at = Carbon::now();
    	$newArticle->updated_at = Carbon::now();
    	$newArticle->save();

    	$destinationPath = public_path('/shoes/article-thumbnail');
        $request->file('img_url')->move($destinationPath, $newArticle->id . '.'.$request->file('img_url')->getClientOriginalExtension());

        $newArticle->img_url = $newArticle->id . '.'.$request->file('img_url')->getClientOriginalExtension();
        $newArticle->save();

    	return response()->redirectToRoute('news');
    }

    public function deleteNews(Request $request){
    	News::where('id', '=', $request->id)->update(['stsrc' => 'D']);
    	return response()->json("nice");
    }

    public function editNews(Request $request){
    	$article = News::where('id', '=', $request->id)->first();
    	return view('user.editNews', compact('article'));
    }

    public function updateNews(Request $request){
    	News::where('id', '=', $request->id)->update(
    		['title' => $request->title],
    		['contents' => $request->contents],
    		['updated_at' => Carbon::now()],
    		['stsrc' => 'U'],
    		['img_url' => $request->id . '.'.$request->file('img_url')->getClientOriginalExtension()]
    	);

    	$destinationPath = public_path('/shoes/article-thumbnail');
        $request->file('img_url')->move($destinationPath, $request->id . '.'.$request->file('img_url')->getClientOriginalExtension());

    	return response()->redirectToRoute('news');
    }

    public function createNews(){
    	return view('user.createNews');
    }

    public function viewNews(Request $request){
    	$article = News::where('id', '=', $request->id)->first();
    	$title = $article->title;
    	$contents = $article->contents;
    	$img_url = $article->img_url;
    	return view('user.viewNews', compact('title', 'contents', 'img_url'));
    }
}
