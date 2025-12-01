<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Profile;

class FilmBrowser
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Profile $profile)
    {
        $films = Film::all();

        return view('film-browser', [
            'films' => $films,
        ]);
    }
}
