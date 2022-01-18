<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddStatuses extends Migration
{
    // rolebackした場合、次にmigrateする際、
    // idが100から始まってしまうため、idを設定
    protected $statusNames = [
        1 => [
            '発注済' => 0,
        ],
        2 => [
            '入荷済' => 0,
        ],
        3 => [
            '出品済' => 0,
        ],
        4 => [
            '受注済' => 0,
        ],
        5 => [
            '入金済' => 0,
        ],
        6 => [
            '出荷済' => 0,
        ],
        7 => [
            '販売完了' => 0,
        ],
        11 => [
            '未入荷' => 1,
        ],
        21 => [
            '出品準備中' => 1,
        ],
        31 => [
            '未売却' => 1,
        ],
        41 => [
            '未入金' => 1,
        ],
        51 => [
            '出荷トラブル' => 1,
        ],
        61 => [
            '取引未完了' => 1,
        ],
        99 => [
            'クローゼット' => 1,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->statusNames as $id => $statusNames) {
            foreach ($statusNames as $name => $error_flag) {
                DB::table('statuses')->insert([
                'id'         => $id,
                'name'       => $name,
                'error_flag' => $error_flag,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('statuses')->delete();
    }
}
