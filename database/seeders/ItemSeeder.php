<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Traits\GetRandIds;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    use GetRandIds;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 作成するseederの数（factoryの中に数を書くと同じものが10個入るため変数を指定）
        $seederCounts = 10;

        for ($i = 1; $i <= $seederCounts; ++$i) {
            Item::factory()->create([
               'user_id' => $this->getRandUserId(),
           ]);
        }
    }
}
