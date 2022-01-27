<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     * itemsテーブルに対して1つしか紐づかない前提
     * @return void
     */
    public function run()
    {
        $itemIds = Item::all()->pluck('id')->toArray();
        $categoryIds = Category::all()->pluck('item_id')->toArray();

        foreach ($itemIds as $itemId) {
            if(!in_array($itemId, $categoryIds)) {
                Category::factory()->create([
                    'user_id' => 1,
                    'item_id' => $itemId,
                ]);
            } else {
                echo 'item_id'.$itemId.'が重複しています。';
            }
        }
    }
}
