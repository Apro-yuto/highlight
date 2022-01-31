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
        // lableに紐づくitemが　　0,1,2,3のように作成されるように
        $itemCounts = 10;

        for ($i = 0; $i < $itemCounts; ++$i) {
            Lable::factory($i)->create([
                'item_id' => $i + 1,
            ]);
        }
    }
}
