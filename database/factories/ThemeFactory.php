<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Theme;
use App\Models\User;

class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theme::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'color' => $this->faker->word(),
            'text_color' => $this->faker->word(),
            'button_rounded' => $this->faker->word(),
            'button_bg' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}
