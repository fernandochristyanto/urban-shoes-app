<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;
use App\News;
use App\Http\Helper\DataHelper;

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
        return view('admin.news', ['articles' => News::all()]);
    }

    public function search(){
        return view('admin.search');
    }

    public function completedItems(){
        return view('admin.admin-panel.completedItems');
    }

    public function shoeRequests(){
        return view('admin.admin-panel.scrapRequests', [
            'approval_statuses' => DataHelper::getScrapApprovalStatuses()
        ]);
    }

    public function pendingItems(){
        $scrap_requests = ScrapRequest::where([
            ['stsrc', '<>', 'D'],
            ['approval_status', '=', 'A'],
            ['finalized', '=', false]
        ])->get();
        return view('admin.admin-panel.pendingItems', [
            'scrap_requests' => $scrap_requests
        ]);
    }

    public function requestNewItem(){
        return view('admin.admin-panel.requestNewItem');
    }
}
