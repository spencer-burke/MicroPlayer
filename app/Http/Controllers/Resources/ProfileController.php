<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        $user = Auth::user();

        $request->validate([
            'display_name' => 'required|string|max:255',
        ]);
        $user->profiles()->create([
            'display_name' => $request->display_name,
        ]);

        return view('user-dashboard', [
            'user' => $user->fresh()
        ])->fragment('profile-cards');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
        $user = Auth::user();
        $profile = $user->profiles()->findOrFail($id);

        $validated = $request->validate([
            'new_display_name' => 'required|string|max:255',
        ]);

        $profile->update([
            'display_name' => $validated['new_display_name']
        ]);

        return view('user-dashboard', [
            'user' => $user->fresh()
        ])->fragment('profile-cards');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $profile = $user->profiles()->findOrFail($id);
        $profile->delete();

        return view('user-dashboard', [
            'user' => $user->fresh()
        ])->fragment('profile-cards');
    }
}
