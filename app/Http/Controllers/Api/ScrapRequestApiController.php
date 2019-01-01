<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Boolean;
use App\ScrapRequest;

class ScrapRequestApiController extends Controller
{
    //
    public function get(Request $request){
        $is_finalized = $_GET['finalized'];
        $approval_status = $_GET['approval_status'];

        $scrap_requests = ScrapRequest::where([
            ['approval_status', '=', $approval_status],
            ['finalized', '=', $is_finalized],
            ['stsrc', '<>', 'D']
        ])->get();

        return json_encode([
            'scrap_requests' => $scrap_requests,
            'finalized' => $is_finalized,
            "a" => $approval_status
        ]);
    }
}
