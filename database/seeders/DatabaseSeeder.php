<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BaseTemplateSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ShopSeeder::class,
            SupplierSeeder::class,
            ItemSeeder::class,
            LableSeeder::class,
            ColorItemSeeder::class,
        ]);
    }
}
