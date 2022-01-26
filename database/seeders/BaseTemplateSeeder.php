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
        BaseTemplate::factory()->create([
           'user_id' => 1,
        ]);
    }
}
