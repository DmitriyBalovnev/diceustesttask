<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\leaguetable>
 */
class LeaguetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_name' => $this->faker->name(),
            'pts' => Str::random(10),
            'p' => Str::random(10),
            'w' => Str::random(10),
            'd' => Str::random(10),
            'l' => Str::random(10),
            'gd' => Str::random(10),
            'gamesid' => Str::random(10),
        ];
    }
}
