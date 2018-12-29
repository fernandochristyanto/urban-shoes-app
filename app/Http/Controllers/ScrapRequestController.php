<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;

class ScrapRequestController extends Controller
{
    //
    public function store(Request $request){
        $newScrapRequest = new ScrapRequest();
        $newScrapRequest->name = $request->name;
        $newScrapRequest->description = $request->description;
        $newScrapRequest->min_price_threshold = $request->min_price_threshold;
        $newScrapRequest->approval_status = 'A';
        $newScrapRequest->stsrc = 'A';
        $newScrapRequest->finalized = false;

        $newScrapRequest->save();

        return response()->redirectToRoute('admin.home');
    }
}
