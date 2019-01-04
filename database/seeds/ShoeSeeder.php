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
            'image_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('shoes')->insert([
            'name' => 'Nike Air Max',
            'description' => 'Good nike casual shoes',
            'image_url' => '2.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('shoes')->insert([
            'name' => 'Adidas Runner',
            'description' => 'Good adidas casual shoes',
            'image_url' => '3.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('shoes')->insert([
            'name' => 'Adidas Alphabounce',
            'description' => 'Good adidas casual shoes',
            'image_url' => '4.jpg',
            'stsrc' => 'A'
        ]);
    }
}
