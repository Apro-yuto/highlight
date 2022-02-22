<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemImgUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_img_urls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->comment('アイテムID');
            $table->text('url')->comment('画像URL');
            $table->text('content')->comment('画像内容');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_img_urls');
    }
}
