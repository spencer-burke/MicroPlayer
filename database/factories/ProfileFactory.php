<?php

namespace Database\Factories;

use App\Models\FilmRecommendation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Profile:
     * id: int
     * timestamps: timestamp
     * displayname: string
     * user_id: int
     */

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'displayname' => fake()->name(),
        ];
    }

    // withFilmRecommendations
    public function withFilmRecommendations(int $count = 1): static
    {
        return $this->has(FilmRecommendation::factory()->count($count), 'film_recommendations');
    }

    // withWatchLaters

    // withFavoriteFilms

    // withSearchHistories
}
