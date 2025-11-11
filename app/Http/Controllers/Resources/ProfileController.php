<?php

namespace App\Http\Controllers\Resources;

use App\Models\WatchLater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\FavoriteFilm;
use App\Models\FilmRecommendation;

class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Grab the account and profile information to place into the template
        $user = Auth::user()->load('profiles');

        return view('profile-dashboard', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: add the ability to check if the user has profiles

        // Get the profile and pass it to the view
        $profile = Profile::findOrFail($id);

        //$recommendations = $profile->recommendations;
        $recommendations = FilmRecommendation::query()
            ->join('films', 'film_recommendations.film_id', '=', 'films.id')
            ->where('film_recommendations.film_id', '=', $profile->id)
            ->select('film_recommendations.*', 'films.title as film_title')
            ->get();

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

        return view('profile', [
            'profile' => $profile,
            'recommendations' => $recommendations,
            'favorites' => $favorites,
            'watchLaters' => $watchLaters,
            'searchHistories' => $searchHistories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
