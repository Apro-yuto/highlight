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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('supplier_id');
            $table->text('name');
            $table->unsignedTinyInteger('gender');
            $table->text('img_url')->nullable();
            $table->unsignedInteger('purchase_price');
            $table->unsignedInteger('selling_price');
            $table->text('template')->nullable();
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
