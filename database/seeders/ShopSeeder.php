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
        Shop::factory(10)->create();
    }
}
