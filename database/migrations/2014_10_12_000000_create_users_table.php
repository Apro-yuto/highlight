<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->unique()->comment('ユーザーメールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('ユーザーメールアドレス確認日時');
            $table->string('password')->comment('ユーザーパスワード');
            $table->rememberToken()->comment('パスワードリセット用トークン');
            $table->softDeletes()->comment('ユーザー削除日時');
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
        Schema::dropIfExists('users');
    }
}
