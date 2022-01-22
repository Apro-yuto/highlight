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
            ItemSeeder::class,
            BaseTemplateSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ColorItemSeeder::class,
            LableSeeder::class,
            ShopSeeder::class,
            SupplierSeeder::class,
        ]);
    }
}
