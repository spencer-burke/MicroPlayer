<?php

namespace App\Http\Controllers\Resources;

use App\Models\FavoriteFilm;
use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class FavoriteFilmController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'film_id' => [
                'required',
                'exists:films,id',
                Rule::unique('favorite_films')->where('profile_id', $profile->id)
            ]
        ]);

        $favorite = FavoriteFilm::create([
            'profile_id' => $profile->id,
            'film_id' => $validated['film_id']
        ]);

        return response('', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteFilm $favoriteFilm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavoriteFilm $favoriteFilm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavoriteFilm $favoriteFilm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteFilm $favoriteFilm)
    {
        //
    }
}
