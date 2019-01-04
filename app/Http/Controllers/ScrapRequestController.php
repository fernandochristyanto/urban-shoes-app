<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapRequest;
use App\ScrappedShoe;
use App\Shop;
use App\Shoe;
use DB;

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

        $destinationPath = public_path('/shoes/requests');
        $request->file('img_url')->move($destinationPath, $newScrapRequest->id . '.'.$request->file('img_url')->getClientOriginalExtension());

        $newScrapRequest->img_url = $newScrapRequest->id . '.'.$request->file('img_url')->getClientOriginalExtension();
        $newScrapRequest->save();

        return response()->redirectToRoute('home');
    }

    public function getRequestsTable(Request $request){
        $is_finalized = $_GET['finalized'];
        $approval_status = $_GET['approval_status'];

        $scrap_requests = ScrapRequest::where([
            ['approval_status', '=', $approval_status],
            ['finalized', '=', $is_finalized],
            ['stsrc', '<>', 'D']
        ])->get();

        return view('user.admin-panel._scrapRequestTable', [
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

        return view('user.admin-panel.scrapData', [
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

        if($finalized == 1) {
            $shoe = DB::table('shoes')->insertGetId([
                'name' => $scrap_request->name,
                'description' => $scrap_request->description,
                'stsrc' => 'A',
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            // Update shoe image
            $shoeRequestImgPath = public_path('/shoes/requests/'.$scrap_request->img_url);
            rename($shoeRequestImgPath, public_path('/shoes'.'/'.$shoe. '.' . explode('.', $scrap_request->img_url)[1]));

            $inserted_shoe = Shoe::where('id', '=', $shoe)->first();
            $inserted_shoe->image_url = $shoe . '.' . explode('.', $scrap_request->img_url)[1];
            $inserted_shoe->save();
            
            $scrapped_shoes = ScrappedShoe::where([
                ['request_id','=',$id],
                ['status','=','A'],
                ['stsrc','<>','D']
            ])->get();

            $insert_val = array();

            foreach($scrapped_shoes as $scrap) {
                $insert_val[] = array(
                    'shoe_id'       => $shoe,
                    'shop_id'       => $scrap->shop_id,
                    'seller'        => $scrap->seller,
                    'item_title'    => $scrap->item_title,
                    'store_url'     => $scrap->store_url,
                    'image_url'     => $scrap->image_url,
                    'price'         => $scrap->price,
                    'location'      => $scrap->location,
                    'rating'        => $scrap->rating,
                    'stsrc'         => 'A',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                );
            }

            DB::table('shoe_shops')->insert($insert_val);
        }
    }
}
