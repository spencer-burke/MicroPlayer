<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\FavoriteFilm;
use App\Models\FilmRecommendation;
use App\Models\WatchLater;


class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $request->validate([
            'display_name' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->profiles()->create([
            'display_name' => $request->display_name,
        ]);

        // return just the fragment
        return view('user-dashboard', [
            'user' => $user->fresh()
        ])->fragment('profile-cards');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        $user = Auth::user();
        $profile = $user->profiles()->findOrFail($id);
        $profile->delete();

        // Return just the fragment
        return view('user-dashboard', [
            'user' => $user->fresh()
        ])->fragment('profile-cards');
    }
}
