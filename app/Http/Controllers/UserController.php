<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
 * What this controller needs:
 * index
 * destory(eventually)
 */
class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Grab the account and profile information to place into the emplate
        $user = Auth::user()->load('profiles');

        return view('user-dashboard', [
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
        //
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
