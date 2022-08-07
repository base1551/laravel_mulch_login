<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_team_id' => Team::factory(),
            'second_team_id' => Team::factory(),
            'first_team_score' => random_int(0, 10),
            'second_team_score' => random_int(0, 10),
            'first_team_hits' => random_int(0, 20),
            'second_team_hits' => random_int(0, 20),
            'first_team_errors' => random_int(0, 7),
            'second_team_errors' => random_int(0, 7),
        ];
    }
}
