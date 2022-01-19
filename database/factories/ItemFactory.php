<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'        => User::factory(),
            'brand_id'       => Brand::factory(),
            'color_id'       => 1,
            'shop_id'        => Shop::factory(),
            'status_id'      => 1,
            'supplier_id'    => Supplier::factory(),
            'name'           => $this->faker->name(),
            'gender'         => 1,
            'img_url'        => 'http://placehold.it/300',
            'purchase_price' => mt_rand(0, 1000000),
            'selling_price'  => mt_rand(0, 1000000),
            'template'       => $this->faker->text(100),
        ];
    }
}
