<?php

namespace Database\Seeders;

use App\Models\BaseTemplate;
use Illuminate\Database\Seeder;

class BaseTemplateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user_idを都度指定する
        $userId = 1;

        BaseTemplate::factory()->create([
           'user_id' => $userId,
       ]);
    }
}
