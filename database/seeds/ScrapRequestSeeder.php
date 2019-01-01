<?php

use Illuminate\Database\Seeder;

class ScrapRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scrap_requests')->insert([
            'name' => 'Yeezy',
            'description' => 'Good adidas sneaker',
            'min_price_threshold' => 1200000,
            'approval_status' => 'F',
            'stsrc' => 'A',
            'finalized' => false
        ]);

        DB::table('scrap_requests')->insert([
            'name' => 'Alphabounce',
            'description' => 'Good adidas sneaker',
            'min_price_threshold' => 1200000,
            'approval_status' => 'A',
            'stsrc' => 'A',
            'finalized' => false
        ]);

        DB::table('scrap_requests')->insert([
            'name' => 'Nike Runner',
            'description' => 'Good nike shoes for running',
            'min_price_threshold' => 700000,
            'approval_status' => 'A',
            'stsrc' => 'A',
            'finalized' => false
        ]);

        DB::table('scrap_requests')->insert([
            'name' => 'Adidas Runner',
            'description' => 'Good adidas shoes for running',
            'min_price_threshold' => 700000,
            'approval_status' => 'A',
            'stsrc' => 'A',
            'finalized' => false
        ]);

        DB::table('scrap_requests')->insert([
            'name' => 'Adidas Superstar',
            'description' => 'Good casual adidas shoes',
            'min_price_threshold' => 500000,
            'approval_status' => 'A',
            'stsrc' => 'A',
            'finalized' => false
        ]);
    }
}
