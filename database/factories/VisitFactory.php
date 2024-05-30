<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Link;
use App\Models\Visit;

class VisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_agent' => $this->faker->text(),
            'link_id' => Link::factory(),
        ];
    }
}
