<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Boolean;
use App\ScrapRequest;
use App\ScrappedShoe;

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
            'scrap_requests' => $scrap_requests
        ]);
    }

    public function store(Request $request){
        $bodyContent = json_decode($request->getContent());
        /**
         * payload: {
         *    "<requestId>": [{
         *        <item>
         *     }]
         * }
         */
        
        $payload = $bodyContent->payload;
        foreach($payload as $request_id => $scrap_datas){
            foreach($scrap_datas as $scrap_data){
                $scrapshoe = new ScrappedShoe();
                $scrapshoe->request_id = $request_id;
                $scrapshoe->shop_id = $scrap_data->shop_id;
                $scrapshoe->seller = $scrap_data->seller;
                $scrapshoe->item_title = $scrap_data->item_title;
                $scrapshoe->store_url = $scrap_data->store_url;
                $scrapshoe->image_url = $scrap_data->image_url;
                $scrapshoe->price = $scrap_data->price;
                $scrapshoe->rating = $scrap_data->rating;
                $scrapshoe->status = 'A';
                $scrapshoe->stsrc = 'A';

                $scrapshoe->save();
            }
        }

        return json_encode([
            'result' => 200
        ]);
    }
}
