<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;

class ScrapRequestController extends Controller
{
    //
    public function store(Request $request){
        $newScrapRequest = new ScrapRequest();
        $newScrapRequest->name = $request->item_name;
        $newScrapRequest->description = $request->item_desc;
        $newScrapRequest->min_price_threshold = $request->item_price;
        $newScrapRequest->approval_status = 'A';
        $newScrapRequest->stsrc = 'A';
        $newScrapRequest->finalized = false;

        $newScrapRequest->save();

        return response()->redirectToRoute('admin.home');
    }
}
