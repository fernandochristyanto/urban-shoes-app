<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            'title' => 'Best Shoes of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('articles')->insert([
            'title' => 'Best Sneakers of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('articles')->insert([
            'title' => 'Best Running Shoes of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('articles')->insert([
            'title' => 'Best Shoes of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('articles')->insert([
            'title' => 'Best Sneakers of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);

        DB::table('articles')->insert([
            'title' => 'Best Running Shoes of the year',
            'contents' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ad nesciunt natus aperiam tenetur assumenda mollitia et. Veniam, aut esse facere nostrum illum alias excepturi, accusamus, ad deleniti eveniet sint?',
            'author_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img_url' => '1.jpg',
            'stsrc' => 'A'
        ]);
    }
}
