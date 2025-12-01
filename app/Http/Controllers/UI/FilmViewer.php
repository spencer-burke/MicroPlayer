<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Film;

class FilmViewer
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Profile $profile, Film $film)
    {
        // add the film to the watch history of the profile
    }
}
