<?php

namespace Database\Factories;

use App\Models\BaseTemplate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BaseTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BaseTemplate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'      => User::factory(),
            'content_head' => $this->faker->text(100),
            'content_end'  => $this->faker->text(100),
            'comment'      => $this->faker->text(20),
        ];
    }
}
