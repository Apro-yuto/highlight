<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddColors extends Migration
{
    // rolebackした場合、次にmigrateする際、
    // idが17から始まってしまうため、idを設定
    protected $colorCodes = [
        1 => [
            'ホワイト' => '#ffffff',
        ],
        2 => [
            'ブラック' => '#000000',
        ],
        3 => [
            'グレー' => '#aab2be',
        ],
        4 => [
            'ブラウン' => '#81604c',
        ],
        5 => [
            'ベージュ' => '#e0d1ad',
        ],
        6 => [
            'グリーン' => '#9ed563',
        ],
        7 => [
            'ブルー' => '#4dbee9',
        ],
        8 => [
            'パープル' => '#ad8eef',
        ],
        9 => [
            'イエロー' => '#fed14c',
        ],
        10 => [
            'ピンク' => '#f8afd7',
        ],
        11 => [
            'レッド' => '#ef5663',
        ],
        12 => [
            'オレンジ' => '#fed14c',
        ],
        13 => [
            'シルバー' => '#bfbfbf',
        ],
        14 => [
            'ゴールド' => '#e3c64b',
        ],
        15 => [
            '柄' => null,
        ],
        16 => [
            'その他' => null,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->colorCodes as $id => $codes) {
            foreach ($codes as $color => $code) {
                DB::table('colors')->insert([
                'id'   => $id,
                'name' => $color,
                'code' => $code,
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
        DB::table('colors')->delete();
    }
}
