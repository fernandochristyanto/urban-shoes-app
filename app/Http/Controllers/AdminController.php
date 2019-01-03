<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;
use App\Http\Helper\DataHelper;

class AdminController extends Controller
{
    //

    public function completedItems(){
        return view('user.admin-panel.completedItems');
    }

    public function shoeRequests(){
        return view('user.admin-panel.scrapRequests', [
            'approval_statuses' => DataHelper::getScrapApprovalStatuses()
        ]);
    }

    public function pendingItems(){
        $scrap_requests = ScrapRequest::where([
            ['stsrc', '<>', 'D'],
            ['approval_status', '=', 'A'],
            ['finalized', '=', false]
        ])->get();
        return view('user.admin-panel.pendingItems', [
            'scrap_requests' => $scrap_requests
        ]);
    }

    public function requestNewItem(){
        return view('user.admin-panel.requestNewItem');
    }
}
