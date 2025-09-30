<?php

namespace Database\Factories;

use App\Models\FavoriteFilm;
use App\Models\FilmRecommendation;
use App\Models\WatchLater;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function withWatchLaters(int $count = 1): static
    {
        return $this->has(WatchLater::factory()->count($count), 'watch_laters');
    }

    // withFavoriteFilms
    public function withFavoriteFilms(int $count = 1): static
    {
        return $this->has(FavoriteFilm::factory()->count($count), 'favorite_films');
    }

    // withSearchHistories
}
