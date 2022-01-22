<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Lable;
use Illuminate\Database\Eloquent\Factories\Factory;

class LableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'name'    => $this->faker->text(10),
            'content' => $this->faker->text(20),
        ];
    }
}
