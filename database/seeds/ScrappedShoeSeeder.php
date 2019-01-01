<?php

use Illuminate\Database\Seeder;

class ScrappedShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('scrapped_shoes')->insert([
            'request_id' => 1,
            'shop_id' => 1,
            'seller' => 'Lapak Adadis',
            'item_title' => 'Adidas Yeezy',
            'store_url' => 'http://www.google.com',
            'image_url' => 'https://images.finishline.com/is/image/FinishLine/B42199_GBK?$Main_gray$',
            'price' => 2000000,
            'location' => 'Bandung',
            'rating' => '4.6',
            'status' => 'A',
            'stsrc' => 'A'
        ]);

        DB::table('scrapped_shoes')->insert([
            'request_id' => 1,
            'shop_id' => 1,
            'seller' => 'Adidas Murah',
            'item_title' => 'Adidas Yeezy Murah',
            'store_url' => 'http://www.google.com',
            'image_url' => 'https://images.finishline.com/is/image/FinishLine/B42199_GBK?$Main_gray$',
            'price' => 2000000,
            'location' => 'Bandung',
            'rating' => '4.4',
            'status' => 'A',
            'stsrc' => 'A'
        ]);

        DB::table('scrapped_shoes')->insert([
            'request_id' => 1,
            'shop_id' => 2,
            'seller' => 'Toko Adidas',
            'item_title' => 'Yeezy',
            'store_url' => 'http://www.google.com',
            'image_url' => 'https://images.finishline.com/is/image/FinishLine/B42199_GBK?$Main_gray$',
            'price' => 2400000,
            'location' => 'Jakarta',
            'rating' => '4.4',
            'status' => 'A',
            'stsrc' => 'A'
        ]);

        DB::table('scrapped_shoes')->insert([
            'request_id' => 1,
            'shop_id' => 2,
            'seller' => 'Adidas Shop',
            'item_title' => 'Adidas Yeezy',
            'store_url' => 'http://www.google.com',
            'image_url' => 'https://images.finishline.com/is/image/FinishLine/B42199_GBK?$Main_gray$',
            'price' => 2400000,
            'location' => 'Jakarta',
            'rating' => '4.4',
            'status' => 'A',
            'stsrc' => 'A'
        ]);
    }
}
