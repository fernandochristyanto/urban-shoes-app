<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;
use App\ScrappedShoe;
use App\Shop;

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

    public function getRequestsTable(Request $request){
        $is_finalized = $_GET['finalized'];
        $approval_status = $_GET['approval_status'];

        $scrap_requests = ScrapRequest::where([
            ['approval_status', '=', $approval_status],
            ['finalized', '=', $is_finalized],
            ['stsrc', '<>', 'D']
        ])->get();

        return view('admin.admin-panel._scrapRequestTable', [
            'scrap_requests' => $scrap_requests
        ]);
    }

    public function getRequestDetailsTable(Request $request) {
        $id             = $_GET['id'];
        $scrap_request  = ScrapRequest::where([
            ['id', '=', $id],
            ['stsrc', '<>', 'D']
        ])->get();

        $scrapped_shoes_raw = ScrappedShoe::where([
            ['request_id', '=', $id],
            ['stsrc', '<>', 'D']
        ])->get();

        $shops = Shop::where([
            ['stsrc', '<>', 'D']
        ])->get();

        foreach($scrapped_shoes_raw as $scrap) {
            $scrapped_shoes[$scrap->shop_id][] = $scrap;
        }

        return view('admin.admin-panel.scrapData', [
            'scrap_request' => $scrap_request[0],
            'scrapped_shoes' => $scrapped_shoes,
            'shops' => $shops
        ]);
    }

    public function updateScrapStatus(Request $request){
        $id     = $request->id;
        $status = $request->status;

        $scrap = ScrappedShoe::find($id);
        $scrap->status = $status;
        $scrap->stsrc = 'U';
        $scrap->save();
    }

    public function updateRequestStatus(Request $request){
        $id                 = $request->id;
        $approval_status    = $request->approval_status;
        $finalized          = $request->finalized;

        $scrap_request  = ScrapRequest::find($id);
        $scrap_request->approval_status = $approval_status;
        $scrap_request->finalized = $finalized;
        $scrap_request->stsrc = 'U';
        $scrap_request->save();
    }
}
