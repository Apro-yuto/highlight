<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brandIds    = Brand::all()->pluck('id')->toArray();
        $categoryIds = Category::all()->pluck('id')->toArray();
        $shopIds     = Shop::all()->pluck('id')->toArray();
        $supplierIds = Supplier::all()->pluck('id')->toArray();

        // array_randで出しているidが全て同じ数にならないように変数を設定
        $itemSeedCounts = 10;

        for ($i = 0; $i < $itemSeedCounts; ++$i) {
            Item::factory()->create([
                'user_id'     => 1,
                'brand_id'    => $brandIds[array_rand($brandIds, 1)],
                'category_id' => $categoryIds[array_rand($categoryIds, 1)],
                'shop_id'     => $shopIds[array_rand($shopIds, 1)],
                'supplier_id' => $supplierIds[array_rand($supplierIds, 1)],
            ]);
        }
    }
}
