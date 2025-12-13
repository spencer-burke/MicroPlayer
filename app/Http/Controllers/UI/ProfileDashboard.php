<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\WatchLater;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\FavoriteFilm;
use App\Models\FilmRecommendation;

class ProfileDashboard
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Profile $profile)
    {
        //$favorites = $profile->favorites;
        $favorites = FavoriteFilm::query()
            ->join('films', 'favorite_films.film_id', '=', 'films.id')
            ->where('favorite_films.profile_id', $profile->id)
            ->select('favorite_films.*', 'films.title as film_title')
            ->get();

        //$watchLaters = $profile->watchLaters;
        $watchLaters = WatchLater::query()
            ->join('films', 'watch_laters.film_id', '=', 'films.id')
            ->where('watch_laters.profile_id', $profile->id)
            ->select('watch_laters.*', 'films.title as film_title')
            ->get();

        $searchHistories = $profile->searchHistories;

        return view('profile-dashboard', [
            'profile' => $profile,
            'favorites' => $favorites,
            'watchLaters' => $watchLaters,
            'searchHistories' => $searchHistories,
        ]);
    }
}
