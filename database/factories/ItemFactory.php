<?php

namespace Database\Factories;

use App\Models\Item;
use App\Traits\GetRandIds;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    use GetRandIds;
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
            'user_id'        => 1,
            'color_id'       => $this->getRandColorId(),
            'status_id'      => $this->getRandStatusId(),
            'name'           => $this->faker->name(),
            'gender'         => mt_rand(0, 2),
            'img_url'        => 'http://placehold.it/300',
            'purchase_price' => mt_rand(0, 1000000),
            'selling_price'  => mt_rand(0, 1000000),
            'template'       => $this->faker->text(100),
        ];
    }
}
