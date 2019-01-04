<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shoe;
use App\ShoeShop;
use App\Http\Helper\DataHelper;
use DB;


class ShoeController extends Controller
{
    public function query(){
        $name = $_GET['name'];
        $pricemin = $_GET['pricemin'];
        $pricemax = $_GET['pricemax'];
        if($pricemax == -1)
            $pricemax = 99999999999;
        $sort = $_GET['sort'];
        $sortDir = $_GET['sortDir'];
        $rating = $_GET['rating'];
        
        if($sortDir == 1)
            $sortMode = 'ASC';
        else
            $sortMode = 'DESC';

        if($sort == 1) {
            $sortString = 'a.created_at';
        } else if ($sort == 2) {
            $sortString = 'MIN(b.price)';
        } else if ($sort == 3) {
            $sortstring = 'AVG(b.rating)';
        }

        $ratingString = "";

        if($rating == 1)
            $ratingString = "AND AVG(b.rating) > 4.0";

        $results = DB::select(DB::raw("
            SELECT
                a.id,
                a.name,
                a.description,
                a.image_url,
                MIN(b.price) min_price,
                MAX(b.price) max_price,
                AVG(b.rating) rating
            FROM
                shoes a
            JOIN
                shoe_shops b
                ON a.id = b.shoe_id
                AND b.stsrc <> 'D'
            WHERE
                a.stsrc <> 'D'
            GROUP BY
                a.id,
                a.name,
                a.description,
                a.image_url
            HAVING
                MIN(b.price) BETWEEN ".$pricemin." AND ".$pricemax."
                AND MAX(b.price) BETWEEN ".$pricemin." AND ".$pricemax."
                ".$ratingString."
            ORDER BY
                ".$sortString." ".$sortMode."
        "));

        return $results;
    }
}
