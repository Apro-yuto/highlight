<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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

        $Brands = Brand::all()->pluck('item_id')->toArray();

        if (!in_array($itemId, $Brands)) {
            Brand::factory()->create([
                'user_id' => 1,
                'item_id' => $itemId,
            ]);
        } else {
            echo 'item_idが重複しているので、修正してください。';
            exit();
        }
    }
}
