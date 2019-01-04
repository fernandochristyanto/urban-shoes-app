<?php

use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shoes')->insert([
            'name' => 'Yeezy',
            'description' => 'Good adidas casual shoes',
            'image_url' => 'https://www.flightclub.com/media/catalog/product/6/3/63611743101-adidas-yeezy-boost-350-infant-turtle-dove-turtle-blugra-cwhite-201399_1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('shoes')->insert([
            'name' => 'Nike Air Max',
            'description' => 'Good nike casual shoes',
            ''
        ]);

        DB::table('shoes')->insert([
            'name' => 'Adidas Runner',
            'description' => 'Good adidas casual shoes',
            ''
        ]);

        DB::table('shoes')->insert([
            'name' => 'Adidas Alphabounce',
            'description' => 'Good adidas casual shoes',
            ''
        ]);
    }
}
