<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Film;
use App\Models\WatchHistory;

class FilmViewer
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Profile $profile, Film $film)
    {

        WatchHistory::create([
            'profile_id' => $profile->id,
            'film_id' => $film->id
        ]);

        $profile->refresh();

        // add the film to the watch history of the profile
        return view('film-viewer', [
            'profile' => $profile,
            'film' => $film
        ]);
    }
}
