<?php

namespace Database\Seeders;

use App\Models\ColorItem;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (ColorItem::exists()) {
            ColorItem::truncate();
        }

        $items = Item::all();

        foreach ($items as $item) {
            DB::table('color_item')->insert([
                'color_id' => $item->color_id,
                'item_id'  => $item->id,
            ]);
        }
    }
}
