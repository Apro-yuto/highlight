<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Status;
use App\Models\Supplier;
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
        $colorIds = Color::all()->pluck('id')->toArray();
        $colorKey = array_rand($colorIds, 1);

        $statuses  = Status::all()->pluck('id')->toArray();
        $statusKey = array_rand($statuses, 1);

        return [
            'user_id'        => 1,
            'brand_id'       => Brand::factory(),
            'color_id'       => $colorIds[$colorKey],
            'category_id'    => Category::factory(),
            'shop_id'        => Shop::factory(),
            'status_id'      => $statuses[$statusKey],
            'supplier_id'    => Supplier::factory(),
            'name'           => $this->faker->text(10),
            'gender'         => mt_rand(0, 2),
            'img_url'        => 'http://placehold.it/300',
            'purchase_price' => mt_rand(0, 1000000),
            'selling_price'  => mt_rand(0, 1000000),
            'template'       => $this->faker->text(100),
        ];
    }
}
