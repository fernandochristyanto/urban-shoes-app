<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrappedShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrapped_shoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->string("seller");
            $table->string("item_title");
            $table->text("store_url");
            $table->text("image_url");
            $table->integer("price");
            $table->string("location")->nullable();
            $table->string("rating")->nullable();
            $table->char("status", 1)->default('P');
            $table->char('stsrc', 1)->default('A');
            $table->timestamps();

            $table->foreign("request_id")->references("id")->on("scrap_requests");

            $table->foreign("shop_id")->references("id")->on("shops");       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scrapped_shoes');
    }
}
