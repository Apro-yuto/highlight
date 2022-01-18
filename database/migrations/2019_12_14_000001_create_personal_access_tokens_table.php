<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name')->comment('apiアクセス認証用トークン名');
            $table->string('token', 64)->unique()->comment('apiアクセス認証用トークン');
            $table->text('abilities')->nullable()->comment('権限の設定値');
            $table->timestamp('last_used_at')->nullable()->comment('apiアクセス認証用トークン更新日時');
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
        Schema::dropIfExists('personal_access_tokens');
    }
}
