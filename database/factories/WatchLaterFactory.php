<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WatchLater>
 */
class WatchLaterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'profile_id' => Profile::factory(),
            'film_id'  => film::factory(),
        ];
    }
}
