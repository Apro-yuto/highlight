<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('brand_id')->comment('ブランドID')->nullable();
            $table->unsignedBigInteger('color_id')->comment('カラーID')->nullable();
            $table->unsignedBigInteger('shop_id')->comment('ショップID')->nullable();
            $table->unsignedBigInteger('status_id')->default(1)->comment('ステータスID');
            $table->unsignedBigInteger('supplier_id')->comment('サプライヤーID')->nullable();
            $table->text('name')->comment('アイテム名');
            $table->unsignedTinyInteger('gender')->comment('性別');
            $table->text('img_url')->nullable()->comment('画像URL');
            $table->unsignedInteger('purchase_price')->comment('仕入れ値');
            $table->unsignedInteger('selling_price')->comment('売値');
            $table->text('template')->nullable()->comment('テンプレート文章');
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
        Schema::dropIfExists('items');
    }
}
