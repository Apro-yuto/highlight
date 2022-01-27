<?php

namespace Database\Seeders;

use App\Models\Lable;
use Illuminate\Database\Seeder;

class LableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * itemsテーブルに対していくつでも紐づく前提
     * @return void
     */
    public function run()
    {
        // itemIdの指定
        $itemId = 1;

        // 作成するlabelの数、item　　1:多なのでいくつ作っても良い。
        $labelCounts = 5;

        Lable::factory($labelCounts)->create([
            'item_id' => $itemId,
        ]);
    }
}
