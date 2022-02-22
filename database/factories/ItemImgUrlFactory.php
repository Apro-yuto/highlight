<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemImgUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemImgUrlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemImgUrl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'url'     => 'http://placehold.it/300',
            'content' => $this->faker->text(20),
        ];
    }
}
