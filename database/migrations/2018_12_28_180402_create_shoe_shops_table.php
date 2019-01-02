<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
    
class CreateShoeShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoe_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("shoe_id")->unsigned();
            $table->integer("shop_id")->unsigned();
            $table->string("seller");
            $table->integer("price");
            $table->string("item_title");
            $table->text("store_url");
            $table->text("image_url");
            $table->char('stsrc', 1)->default('A');
            $table->string("location")->nullable();
            $table->string("rating")->nullable();
            $table->timestamps();

            $table->foreign("shoe_id")->references("id")->on("shoes");
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
        Schema::dropIfExists('shoe_shops');
    }
}
