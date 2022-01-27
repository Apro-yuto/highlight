<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * itemsテーブルに対して1つしか紐づかない前提
     * @return void
     */
    public function run()
    {
        // itemIdの指定
        $itemId = 1;

        $Shops = Shop::all()->pluck('item_id')->toArray();

        if (!in_array($itemId, $Shops)) {
            Shop::factory()->create([
                'user_id' => 1,
                'item_id' => $itemId,
            ]);
        } else {
            echo 'item_idが重複しているので、修正してください。';
            exit();
        }
    }
}
