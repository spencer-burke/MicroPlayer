<?php

namespace Database\Seeders;

use App\Models\FilmRecommendation;
use App\Models\SearchHistory;
use Database\Factories\FavoriteFilmFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Film;
use App\Models\FavoriteFilm;
use App\Models\WatchLater;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make a user with 3 profiles
        /*
        User::factory()
            ->count(2)
            ->withProfiles(3)
            ->create();
        */
        $films = Film::all();
        $users = User::factory(5)->withProfiles(2)->create();

        foreach ($users as $user) {
            $profiles = $user->profiles;

            foreach ($profiles as $profile) {
                // film recommendations
                foreach(range(1,2) as $ignored) {
                    FilmRecommendation::factory()
                        ->for($profile)
                        ->create(['film_id' => $films->random()->id,]);
                }

                // film favorites
                foreach(range(1,2) as $ignored) {
                    FavoriteFilm::factory()
                        ->for($profile)
                        ->create(['film_id' => $films->random()->id]);
                }

                // film watch laters
                foreach(range(1,2) as $ignored) {
                    WatchLater::factory()
                        ->for($profile)
                        ->create(['film_id' => $films->random()->id,]);
                }

                // search histories
                foreach(range(1,2) as $ignored) {
                    SearchHistory::factory()
                        ->for($profile)
                        ->create();
                }

            }
        }
    }
}
