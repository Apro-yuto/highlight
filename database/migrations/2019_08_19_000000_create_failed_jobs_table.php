<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->comment('失敗したジョブのユニークID');
            $table->text('connection')->comment('失敗したジョブの接続先');
            $table->text('queue')->comment('失敗したジョブのキュー');
            $table->longText('payload')->comment('失敗したジョブのデータ本体');
            $table->longText('exception')->comment('失敗したジョブのエラー');
            $table->timestamp('failed_at')->useCurrent()->comment('失敗したジョブの発生日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
