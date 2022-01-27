<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Item;
use App\Models\Status;
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
            'color_id'       => $colorIds[$colorKey],
            'status_id'      => $statuses[$statusKey],
            'name'           => $this->faker->name(),
            'gender'         => mt_rand(0, 2),
            'img_url'        => 'http://placehold.it/300',
            'purchase_price' => mt_rand(0, 1000000),
            'selling_price'  => mt_rand(0, 1000000),
            'template'       => $this->faker->text(100),
        ];
    }
}
