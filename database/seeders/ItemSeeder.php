<?php

namespace Database\Seeders;

use App\Models\Item;
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
        $itemCount = 10;

        Item::factory($itemCount)->create([
            'user_id' => 1,
        ]);
    }
}
