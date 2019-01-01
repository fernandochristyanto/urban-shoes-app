<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            'name' => 'Tokopedia',
            'stsrc' => 'A'
        ]);

        DB::table('shops')->insert([
            'name' => 'BukaLapak',
            'stsrc' => 'A'
        ]);
    }
}
