<?php

namespace Database\Seeders;

use App\Models\ItemImgUrl;
use Illuminate\Database\Seeder;

class ItemImgUrlSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * itemsテーブルに対していくつでも紐づく前提
     * @return void
     */
    public function run()
    {
        // lableに紐づくitemが　　0,1,2,3のように作成されるように
        $itemCounts = 10;

        for ($i = 0; $i < $itemCounts; ++$i) {
            ItemImgUrl::factory($i)->create([
                'item_id' => $i + 1,
            ]);
        }
    }
}
