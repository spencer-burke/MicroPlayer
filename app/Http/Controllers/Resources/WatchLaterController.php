<?php

namespace App\Http\Controllers\Resources;

use App\Models\WatchLater;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WatchLaterController
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
                Rule::unique('watch_laters')->where('profile_id', $profile->id)
            ]
        ]);

        $watchLater = WatchLater::create([
            'profile_id' => $profile->id,
            'film_id' => $validated['film_id']
        ]);

        return response('', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchLater $watchLater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchLater $watchLater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WatchLater $watchLater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WatchLater $watchLater)
    {
        //
    }
}
