<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MatchresultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teamname1' => $this->faker->name(),
            'teamname2' => $this->faker->name(),
            'goal1' => Str::random(10),
            'goal2' => Str::random(10),
        ];
    }
}
